<?php

namespace Controllers;

use MVC\Router;
use Model\Imagenes;
use Model\Propietarios;
use Model\Propiedades;
use Model\Ubicaciones;
use stdClass;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Empresas;

class EmpresaController
{
    public static function index(Router $router)
    {
        session_start();

        $empresas = Empresas::all();
        $array_objetos = [];
        foreach ($empresas as $empresa) {
            $objeto = new stdclass;

            $objeto->id = $empresa->id;
            // Obtener el propietario de la propiedad
            $propietario = Propietarios::buscarDatos($empresa->id_propietario);
            // Si el propietario existe, agregar su información al objeto
            if ($propietario) {
                $objeto->nombre_propietario = $propietario->nombre . ' ' .  $propietario->p_apellido . ' ' .  $propietario->s_apellido;
                $objeto->email = $propietario->email;
                $objeto->tel = $propietario->telefono;
            }
            // Otros atributos de la propiedad
            $objeto->nombre_empresa = $empresa->nombre_empresa;
            // Usar el ID como índice en el nuevo array de objetos
            $array_objetos[$empresa->id] = $objeto;
        }

        $router->renderDashboard('empresa/empresas', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'array_objetos' => $array_objetos
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();
        $errores = Empresas::getErrores();
        $empresa = new Empresas;

        $propietarios = Propietarios::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresa = new Empresas($_POST['empresa']);

            $errores = $empresa->validar();

            //Crear la carpeta de imagenes
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
            // Realiza un resize a la imagen con la intervention y guarda si se subió
            if ($_FILES['empresa']['tmp_name']['img1']) {
                $image = Image::make($_FILES['empresa']['tmp_name']['img1'])->fit(800, 600);
                $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
                $empresa->setImagen($nombreImagen1, 1); // Asigna el nombre de la imagen a la propiedad img1
                $image->save(CARPETA_IMAGENES . $nombreImagen1);
            }

            if ($_FILES['empresa']['tmp_name']['img2']) {
                $image = Image::make($_FILES['empresa']['tmp_name']['img2'])->fit(800, 600);
                $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
                $empresa->setImagen($nombreImagen2, 2);  // Asigna el nombre de la imagen a la propiedad img2
                $image->save(CARPETA_IMAGENES . $nombreImagen2);
            }
            if (empty($errores)) {


                // Guardar las imagenes
                $respuesta_propiedad = $empresa->crear();

                // Verificar si la ubicación se guardó correctamente
                if ($respuesta_propiedad['resultado']) {
                    // Redirigir a la página de propiedades
                    echo '<script> window.location.href = "/bienes-r"; alert("Se agrego la empresa"); </script>';
                } else {
                    // Manejar el caso de error en la guardado de ubicación
                    echo '<script> window.location.href = "/bienes-r"; alert("Error intente de nuevo"); </script>';
                }
            }
        }
        $router->renderDashboard('empresa/crear', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'errores' => $errores,
            'propietarios' => $propietarios,
            'empresa' => $empresa,
        ]);
    }

    public static function actualizar(Router $router)
    {
        session_start();
        $id = validarORedireccionar('/admin');
        $empresa = Empresas::find($id);
        $propietarios = Propietarios::all();

        $errores = Empresas::getErrores();

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

        $router->renderDashboard('empresa/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'empresa' => $empresa,
            'propietarios' => $propietarios,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    //buscar las realciones de propiedades con sus imagenes y ubicacion
                    $empresa = Empresas::find($id);
                    $resultado = $empresa->eliminar();
                    if ($resultado) {
                        echo '<script> window.location.href = "/bienes-r"; alert("Se elimino la empresa correctamente."); </script>';
                    } else {
                        echo '<script> window.location.href = "/bienes-r"; alert("Hubo un error al eliminar el elemento."); </script>';
                    }
                }
            }
        }
    }
}
