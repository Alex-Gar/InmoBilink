<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Propietarios;

class LoginController
{

    public static function login(Router $router)
    {
        $ocultarFooter = true;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Propietarios($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                //Verificar que el usuario exista
                $cred = Propietarios::where('email', $auth->email);
                $cred = array_shift($cred);

                if ($cred) {
                    //verifica password
                    if ($cred->comprobarPasswordAndVerificado($auth->password)) {
                        session_start();

                        $_SESSION['id'] = $cred->id;
                        $_SESSION['nombre'] = $cred->nombre . ' ' . $cred->p_apellido . ' ' . $cred->s_apellido;
                        $_SESSION['rol_user'] = $cred->rol_user;
                        $_SESSION['paquete'] = $cred->paquete;
                        $_SESSION['fecha_cierre'] = $cred->fecha_cierre;
                        $_SESSION['email'] = $cred->email;
                        $_SESSION['login'] = true;

                        if ($cred->rol_user === "1") {
                            header('Location: /admin');
                        } else if ($cred->rol_user === "2" || $cred->rol_user === "3") {
                            header('Location: /admin-vendedor');
                        } else  if ($cred->rol_user === "4") {
                            header('Location:  /admin-inmobiliaria');
                        }
                        exit;
                    }
                } else {
                    Propietarios::setAlerta('error', 'correo no encontrado');
                }
            }
        }
        $alertas = Propietarios::getAlertas();

        $router->render('auth/login', [
            'ocultarFooter' => $ocultarFooter,
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }
    public static function confirmar(Router $router)
    {
        // $errores = [];
        // $token = s($_GET['token']);
        // $propietario = Propietarios::where('token', $token);
        // if (empty($propietario)) {
        //     Propietarios::setAlerta('error', 'Token no válido');
        // } else {
        //     $propietario->confirmado = "1";
        //     $propietario->token = null;

        //     $propietario->guardar();
        //     Propietarios::setAlerta('exito', 'Cuenta confirmada correctamente, puedes iniciar sesión ');
        // }

        // $errores = Propietarios::getAlertas();
        // $router->render('auth/confirmar-cuenta', [
        //     'errores' => $errores,
        // ]);
    }
    public static function olvide(Router $router)
    {
        $alertas = [];
        $ocultarFooter = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Propietarios($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $propietario = Propietarios::where('email', $auth->email);
                $propietario = array_shift($propietario);

                if ($propietario && $propietario->confirmado === "1") {
                    $propietario->crearToken();
                    $propietario->guardar();
                    // Enviar email
                    $email = new Email($propietario->nombre, $propietario->p_apellido, $propietario->s_apellido, $propietario->email, $propietario->token);
                    $email->enviarRecuperarPassword();
                    Propietarios::setAlerta('exito', 'Se ha enviado un correo con las instrucciones para recuperar tu contraseña');
                } else {
                    Propietarios::setAlerta('error', 'El correo no existe o no esta confirmado');
                }
            }
        }
        $alertas = Propietarios::getAlertas();
        $router->render('auth/recuperarPassword', [
            'alertas' => $alertas,
            'ocultarFooter' => $ocultarFooter,
        ]);
    }
    public static function nuevoPassword(Router $router)
    {
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);
        $propietario = Propietarios::where('token', $token);
        $propietario = array_shift($propietario);

        if (empty($propietario)) {
            Propietarios::setAlerta('error', 'Token no válido');
            $error = true;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Propietarios($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                $propietario->password = null;
                $propietario->password = $password->password;
                $propietario->hashPassword();

                $propietario->token = null;
                $resultado = $propietario->guardar();
                if ($resultado) {
                    header('Location: /login');
                }
            }
        }
        $alertas = Propietarios::getAlertas();

        $router->render('auth/nuevoPassword', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }
}
