<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Empresas;
use Model\Imagenes;
use Model\Propietarios;
use Model\Paquetes;
use Model\Propiedades;
use Model\Roles;
use Model\Ubicaciones;

class PropietariosController
{

    public static function index(Router $router)
    {
        session_start();
        $propietarios = Propietarios::all();

        $router->renderDashboard('propietarios/propietarios', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'propietarios' => $propietarios,
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();
        $errores = Propietarios::getAlertas();
        $propietario = new Propietarios;
        $paquetes = Paquetes::all();
        $roles = Roles::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propietario = new Propietarios($_POST['propietario']);
            $errores = $propietario->validar();
            if (empty($errores)) {
                $resultado = $propietario->existeUsuario();

                if (!$resultado->num_rows) {
                    //No esta registrado
                    $propietario->hashPassword();
                    //Generar un token unico
                    $propietario->crearToken();
                    //Enviar e-mail
                    $email = new Email($propietario->nombre, $propietario->p_apellido, $propietario->s_apellido, $propietario->email, $propietario->token);
                    $email->enviarConfirmacion();
                    //Crear el propietario
                    $respuesta_propiedad = $propietario->guardar();
                    if ($respuesta_propiedad['resultado']) {
                        $nuevoId = $respuesta_propiedad['id_insertado'];

                        $datosMembresia = Propietarios::findByDateCreate($nuevoId);
                        $fechaRegistro = $datosMembresia->fecha_registro;
                        $idPaquete = $datosMembresia->paquete;

                        $paquete = Paquetes::buscarDatos($idPaquete);
                        $mesesPaquete = $paquete->meses;

                        $fecha_cierre = Propietarios::calcularFin($fechaRegistro, $mesesPaquete);
                        $resultado = Propietarios::insertarFechaFinal($nuevoId, $fecha_cierre);
                        if ($resultado) {
                            header('Location: /mensaje');
                        } else {
                            echo '<script> window.location.href = "/propietarios"; alert("Algo salio mal intenta de nuevo"); </script>';
                        }
                    }
                } else {
                    $errores = $propietario->validar();
                }
            }
        }
        $router->renderDashboard('propietarios/crear', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'propietario' => $propietario,
            'paquetes' => $paquetes,
            'errores' => $errores,
            'roles' => $roles,
        ]);
    }
    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }
    public static function actualizar(Router $router)
    {
        session_start();
        $alertas = [];
        $id = validarORedireccionar('/admin');
        $propietario = Propietarios::find($id);
        $paquetes = Paquetes::all();
        $roles = Roles::all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propietario'];

            $propietario->sincronizar($args);
            $alertas = $propietario->validar();

            if (empty($alertas)) {
                $resultado = $propietario->guardar();
                if ($resultado) {
                    Propietarios::setAlerta('error', 'Información guarda correctamente.');
                }
            } else {
                Propietarios::setAlerta('error', 'Error al actualizar intente de nuevo.');
            }
        }

        $alertas = Propietarios::getAlertas();
        $router->renderDashboard('propietarios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'propietario' => $propietario,
            'paquetes' => $paquetes,
            'alertas' => $alertas,
            'roles' => $roles,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $empresa = Empresas::findByForeingKey('id_propietario', $id);
            $idEmpresa = $empresa->id;
            $propiedad = Propiedades::findByForeingKey('id_propietario', $id);
            $idPropiedad = $propiedad->id;

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {

                    if (!empty($idEmpresa)) {
                        $empresa = Empresas::find($idEmpresa);
                        $empresa->eliminar();
                    }
                    if (!empty($idPropiedad)) {
                        //buscar las realciones de propiedades con sus imagenes y ubicacion
                        $ubicacion = Ubicaciones::findByForeingKey('id_propiedad', $idPropiedad);
                        $idUbicacion = $ubicacion->id;
                        $ubicacion = Ubicaciones::find($idUbicacion);
                        $ubicacion->eliminar();

                        $imagen = Imagenes::findByForeingKey('id_propiedad', $idPropiedad);
                        $idImagen = $imagen->id;
                        $imagenes = Imagenes::find($idImagen);
                        $imagenes->eliminar();
                    }
                    if (!empty($idPropiedad)) {
                        $propiedades = Propiedades::find($idPropiedad);
                        $propiedades->eliminar();
                    }
                    //Compara lo que se va a eliminar
                    $propietario = Propietarios::find($id);
                    $propietario->eliminar();
                    // $this->borrarImagen();
                    header('location: /propietarios');
                }
            }
        }
    }
}
