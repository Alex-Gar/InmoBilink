<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Empresas;
use Model\Propietarios;
use Model\Paquetes;
use Model\Roles;
use Intervention\Image\ImageManagerStatic as Image;


class AdminController
{
    public static function admin(Router $router)
    {
        session_start();
        $router->renderDashboard('admin/admin', [
            'rol' => $_SESSION['rol_user'],
            'nombre' => $_SESSION['nombre']
        ]);
    }
    public static function adminVendedor(Router $router)
    {
        session_start();
        $router->renderDashboard('admin/adminVendedor', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
        ]);
    }
    public static function adminInmobiliaria(Router $router)
    {
        session_start();
        $router->renderDashboard('admin/adminInmobiliaria', [
            'rol' => $_SESSION['rol_user'],
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function propietarios(Router $router)
    {
        $propietarios = Propietarios::all();

        $router->renderDashboard('propietarios/propietarios', [
            'propietarios' => $propietarios,
        ]);
    }

    public static function propiedades(Router $router)
    {
        session_start();
        $router->renderDashboard('admin/propiedades', []);
    }

    public static function finalidades(Router $router)
    {
        $router->renderDashboard('admin/finalidades', [
            'rol' => $_SESSION['rol_user'],
        ]);
    }
    public static function tipoPropiedad(Router $router)
    {
        $router->renderDashboard('admin/tipoPropiedad', [
            'rol' => $_SESSION['rol_user'],

        ]);
    }

    public static function acercaDe(Router $router)
    {
        session_start();
        $idPropierario = $_SESSION['id'];

        if (!$idPropierario) {
            $_SESSION = [];
            header('Location: /');
        }
        $alertas = [];
        $propietario = Propietarios::find($idPropierario);
        $paquetes = Paquetes::all();
        $roles = Roles::all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propietario'];

            $propietario->sincronizar($args);
            $alertas = $propietario->validar();
            if (empty($alertas)) {
                $propietario->hashPassword();
                //Generar un token unico
                $propietario->crearToken();
                $propietario->confirmado = 0;
                //Enviar e-mail
                $email = new Email($propietario->nombre, $propietario->p_apellido, $propietario->s_apellido, $propietario->email, $propietario->token);
                $email->enviarConfirmacion();
                $resultado = $propietario->guardar();
                if ($resultado) {
                    Propietarios::setAlerta('exito', 'Su información se ha guardado correctamente');
                    session_start();
                    $_SESSION = [];
                    header('Location: /');
                }
            } else {
                Propietarios::setAlerta('error', 'Ocurrió un error al actualizar su información');
            }
        }
        $alertas = Propietarios::getAlertas();
        $router->renderDashboard('admin/acercaDe', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'propietario' => $propietario,
            'paquetes' => $paquetes,
            'alertas' => $alertas,
            'roles' => $roles,
        ]);
    }

    public static function infoDe(Router $router)
    {
        session_start();
        $idPropierario = $_SESSION['id'];
        $empresa = Empresas::find($idPropierario);
        $propietarios = Propietarios::all();

        $errores = Empresas::getAlertas();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['empresa'];
            $empresa->sincronizar($args);
            $errores = $empresa->validar();

            // Realiza un resize a la imagen con la intervention y guarda si se subió
            if ($_FILES['empresa']['tmp_name']['img1']) {
                $image = Image::make($_FILES['empresa']['tmp_name']['img1'])->fit(800, 600);
                $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
                $empresa->setImagen($nombreImagen1, '1'); // Asigna el nombre de la imagen a la propiedad img1
                $image->save(CARPETA_IMAGENES . $nombreImagen1);
            }

            if ($_FILES['empresa']['tmp_name']['img2']) {
                $image = Image::make($_FILES['empresa']['tmp_name']['img2'])->fit(800, 600);
                $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
                $empresa->setImagen($nombreImagen2, '2');  // Asigna el nombre de la imagen a la propiedad img2
                $image->save(CARPETA_IMAGENES . $nombreImagen2);
            }

            if (empty($errores)) {
                $resultado = $empresa->guardar();
                if ($resultado) {
                    echo '<script> window.location.href = "/bienes-r"; alert("Se actualizo la propiedad"); </script>';
                }
            } else {
                echo '<script> window.location.href = "/bienes-r"; alert("Error intente de nuevo"); </script>';
            }
        }

        $router->renderDashboard('admin/acercaDeE', [
            'nombre' => $_SESSION['nombre'],
            'empresa' => $empresa,
            'propietarios' => $propietarios,
        ]);
    }
}
