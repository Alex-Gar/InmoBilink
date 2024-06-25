<?php

namespace Controllers;

use MVC\Router;
use Model\Finalidades;
use Model\Imagenes;
use Model\Propietarios;
use Model\Paquetes;
use Model\Propiedades;
use Model\Roles;
use Model\TipoPropiedades;
use Model\Ubicaciones;
use stdClass;
use Intervention\Image\ImageManagerStatic as Image;
use Model\VPropiedad;

class PropiedadController
{

    public static function index(Router $router)
    {
        session_start();
        $idPropietario = $_SESSION['id'];
        $pPropietarios = VPropiedad::where('id_propietario', $idPropietario);
        // $propiedades = Propiedades::all();
        // $tiposPropiedades = TipoPropiedades::all();
        // $finalidades = Finalidades::all();
        // $array_objetos = [];

        // foreach ($propiedades as $propiedad) {
        //     $objeto = new stdclass;

        //     $objeto->id = $propiedad->id;
        //     // Obtener el propietario de la propiedad
        //     $propietario = Propietarios::buscarDatos($propiedad->id_propietario);
        //     // Si el propietario existe, agregar su información al objeto
        //     if ($propietario) {
        //         $objeto->nombre_propietario = $propietario->nombre . ' ' .  $propietario->p_apellido . ' ' .  $propietario->s_apellido;
        //         $objeto->email = $propietario->email;
        //         $objeto->tel = $propietario->telefono;
        //     }
        //     // Otros atributos de la propiedad
        //     $objeto->tipo_propiedad = $propiedad->tipo_propiedad;
        //     $objeto->disponible = $propiedad->disponible;
        //     $objeto->fecha_registro = $propiedad->fecha_registro;
        //     $objeto->finalidad = $propiedad->finalidad;

        //     // Usar el ID como índice en el nuevo array de objetos
        //     $array_objetos[$propiedad->id] = $objeto;
        // }

        $router->renderDashboard('propiedad/propiedades', [
            'rol' => $_SESSION['rol_user'],
            'nombre' => $_SESSION['nombre'],
            'pPropietarios' => $pPropietarios,
            // 'array_objetos' => $array_objetos,
            // 'tiposPropiedades' => $tiposPropiedades,
            // 'finalidades' => $finalidades,
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();
        $alertas = Propiedades::getAlertas();
        $alertas = Ubicaciones::getAlertas();
        $alertas = Imagenes::getAlertas();
        $propiedad = new Propiedades;
        $ubicacion = new Ubicaciones;
        $imagenes = new Imagenes;

        $tiposPropiedades = TipoPropiedades::all();
        $propietarios = Propietarios::all();
        $finalidades = Finalidades::all();
        $roles = Roles::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedades($_POST['propiedad']);
            $ubicacion = new Ubicaciones($_POST['ubicacion']);
            $imagenes = new Imagenes($_POST['imagenes']);

            //Crear la carpeta de imagenes
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            $alertas = $propiedad->validar();
            if (empty($alertas)) {
                // Guardar la propiedad y obtener la respuesta
                $respuesta_propiedad = $propiedad->guardar();
                // Si la operación de guardar la propiedad fue exitosa
                if ($respuesta_propiedad['resultado']) {
                    // Obtener el ID de la propiedad recién creada
                    $id_propiedad = $respuesta_propiedad['id_insertado'];
                    // Asociar ese ID con la ubicación
                    $ubicacion->id_propiedad = $id_propiedad;
                    // Guardar la ubicación
                    $respuesta_propiedad = $ubicacion->crear();
                    //Guardar las imagenes
                    $imagenes->id_propiedad = $id_propiedad;

                    // Realiza un resize a la imagen con la intervention y guarda si se subió
                    if ($_FILES['imagenes']['tmp_name']['img1']) {
                        $image = Image::make($_FILES['imagenes']['tmp_name']['img1'])->fit(800, 600);
                        $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
                        $imagenes->setImagen($nombreImagen1, 1); // Asigna el nombre de la imagen a la propiedad img1
                        $image->save(CARPETA_IMAGENES . $nombreImagen1);
                    }

                    if ($_FILES['imagenes']['tmp_name']['img2']) {
                        $image = Image::make($_FILES['imagenes']['tmp_name']['img2'])->fit(800, 600);
                        $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
                        $imagenes->setImagen($nombreImagen2, 2);  // Asigna el nombre de la imagen a la propiedad img2
                        $image->save(CARPETA_IMAGENES . $nombreImagen2);
                    }

                    if ($_FILES['imagenes']['tmp_name']['img3']) {
                        $image = Image::make($_FILES['imagenes']['tmp_name']['img3'])->fit(800, 600);
                        $nombreImagen3 = md5(uniqid(rand(), true)) . ".jpg";
                        $imagenes->setImagen($nombreImagen3, 3);
                        $image->save(CARPETA_IMAGENES . $nombreImagen3);
                    }

                    if ($_FILES['imagenes']['tmp_name']['img4']) {
                        $image = Image::make($_FILES['imagenes']['tmp_name']['img4'])->fit(800, 600);
                        $nombreImagen4 = md5(uniqid(rand(), true)) . ".jpg";
                        $imagenes->setImagen($nombreImagen4, 4);
                        $image->save(CARPETA_IMAGENES . $nombreImagen4);
                    }

                    if ($_FILES['imagenes']['tmp_name']['img5']) {
                        $image = Image::make($_FILES['imagenes']['tmp_name']['img5'])->fit(800, 600);
                        $nombreImagen5 = md5(uniqid(rand(), true)) . ".jpg";
                        $imagenes->setImagen($nombreImagen5, 5);
                        $image->save(CARPETA_IMAGENES . $nombreImagen5);
                    }
                    // Guardar las imagenes
                    $respuesta_propiedad = $imagenes->crear();

                    // Verificar si la ubicación se guardó correctamente
                    if ($respuesta_propiedad['resultado']) {
                        // Redirigir a la página de propiedades
                        echo '<script> window.location.href = "/propiedades"; alert("Se agrego la nueva propiedad"); </script>';
                    } else {
                        // Manejar el caso de error en la guardado de ubicación
                        echo '<script> window.location.href = "/propiedades"; alert("Error intente de nuevo"); </script>';
                    }
                } else {
                    // Manejar el caso de error en la guardado de propiedad
                    echo '<script> window.location.href = "/propiedades"; alert("Error intente de nuevo"); </script>';
                }
            }
        }

        $router->renderDashboard('propiedad/crear', [
            'nombre' => $_SESSION['nombre'],
            'rol' => $_SESSION['rol_user'],
            'propiedad' => $propiedad,
            'alertas' => $alertas,
            'propietarios' => $propietarios,
            'tiposPropiedades' => $tiposPropiedades,
            'roles' => $roles,
            'finalidades' => $finalidades,
        ]);
    }

    public static function actualizar(Router $router)
    {
        session_start();
        $alertas = Propietarios::getAlertas();
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedades::find($id);
        $ubicacion = Ubicaciones::findByForeingKey('id_propiedad', $id);
        $imagenes = Imagenes::findByForeingKey('id_propiedad', $id);
        $tiposPropiedades = TipoPropiedades::all();
        $propietarios = Propietarios::all();
        $finalidades = Finalidades::all();
        $paquetes = Paquetes::all();
        $roles = Roles::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];

            $argsUbi = $_POST['ubicacion'];
            $argsIma = $_POST['imagenes'];

            $propiedad->sincronizar($args);
            $ubicacion->sincronizar($argsUbi);
            $imagenes->sincronizar($argsIma);
            $alertas = $propiedad->validar();
            $alertas = $ubicacion->validar();
            $alertas = $imagenes->validar();

            if (empty($alertas)) {
                $resultado = $propiedad->guardar();

                // Realiza un resize a la imagen con la intervention y guarda si se subió
                if ($_FILES['imagenes']['tmp_name']['img1']) {
                    $image = Image::make($_FILES['imagenes']['tmp_name']['img1'])->fit(800, 600);
                    $nombreImagen1 = md5(uniqid(rand(), true)) . ".jpg";
                    $imagenes->setImagen($nombreImagen1, 1); // Asigna el nombre de la imagen a la propiedad img1
                    $image->save(CARPETA_IMAGENES . $nombreImagen1);
                }

                if ($_FILES['imagenes']['tmp_name']['img2']) {
                    $image = Image::make($_FILES['imagenes']['tmp_name']['img2'])->fit(800, 600);
                    $nombreImagen2 = md5(uniqid(rand(), true)) . ".jpg";
                    $imagenes->setImagen($nombreImagen2, 2);  // Asigna el nombre de la imagen a la propiedad img2
                    $image->save(CARPETA_IMAGENES . $nombreImagen2);
                }

                if ($_FILES['imagenes']['tmp_name']['img3']) {
                    $image = Image::make($_FILES['imagenes']['tmp_name']['img3'])->fit(800, 600);
                    $nombreImagen3 = md5(uniqid(rand(), true)) . ".jpg";
                    $imagenes->setImagen($nombreImagen3, 3);
                    $image->save(CARPETA_IMAGENES . $nombreImagen3);
                }

                if ($_FILES['imagenes']['tmp_name']['img4']) {
                    $image = Image::make($_FILES['imagenes']['tmp_name']['img4'])->fit(800, 600);
                    $nombreImagen4 = md5(uniqid(rand(), true)) . ".jpg";
                    $imagenes->setImagen($nombreImagen4, 4);
                    $image->save(CARPETA_IMAGENES . $nombreImagen4);
                }

                if ($_FILES['imagenes']['tmp_name']['img5']) {
                    $image = Image::make($_FILES['imagenes']['tmp_name']['img5'])->fit(800, 600);
                    $nombreImagen5 = md5(uniqid(rand(), true)) . ".jpg";
                    $imagenes->setImagen($nombreImagen5, 5);
                    $image->save(CARPETA_IMAGENES . $nombreImagen5);
                }

                $resultado = $imagenes->guardar();
                if ($resultado) {
                    echo '<script> window.location.href = "/propiedades"; alert("Se actualizo la propiedad"); </script>';
                }
            } else {
                echo '<script> window.location.href = "/propiedades"; alert("Error intente de nuevo"); </script>';
            }
        }
        $router->renderDashboard('propiedad/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'tiposPropiedades' => $tiposPropiedades,
            'propietarios' => $propietarios,
            'finalidades' => $finalidades,
            'propiedad' => $propiedad,
            'ubicacion' => $ubicacion,
            'imagenes' => $imagenes,
            'paquetes' => $paquetes,
            'alertas' => $alertas,
            'roles' => $roles,
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idPropiedad = $_POST['id'];
            $idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);

            if ($idPropiedad) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    //buscar las realciones de propiedades con sus imagenes y ubicacion
                    $ubicacion = Ubicaciones::findByForeingKey('id_propiedad', $idPropiedad);
                    $idUbicacion = $ubicacion->id;
                    $ubicacion = Ubicaciones::find($idUbicacion);
                    $ubicacion->eliminar();

                    $imagen = Imagenes::findByForeingKey('id_propiedad', $idPropiedad);
                    $idImagen = $imagen->id;
                    $imagenes = Imagenes::find($idImagen);
                    $imagenes->eliminar();

                    //Compara lo que se va a eliminar
                    $propiedades = Propiedades::find($idPropiedad);
                    $resultado = $propiedades->eliminar();
                    if ($resultado) {
                        echo '<script> window.location.href = "/propiedades"; alert("Se elimino correctamente"); </script>';
                    }
                }
            }
        }
    }
}
