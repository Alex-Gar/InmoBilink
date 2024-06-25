<?php

namespace Controllers;

use Model\Empresas;
use Model\Finalidades;
use Model\Imagenes;
use Model\Paginas;
use Model\Propiedad;
use Model\Propiedades;
use Model\TipoPropiedades;
use Model\Ubicaciones;
use Model\VPropiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $listadoFinalidad = Finalidades::all();
        $listadoTiposPropiedades = TipoPropiedades::all();

        $router->render('paginas/index', [
            'listadoFinalidad' => $listadoFinalidad,
            'listadoTiposPropiedades' => $listadoTiposPropiedades,
        ]);
    }

    public static function avanzado(Router $router)
    {
        $alertas = [];
        $listadoFinalidades = Finalidades::all();
        $tipoPropiedades = TipoPropiedades::all();

        if ($_POST['finalidad'] != '' && $_POST['finalidad'] != null || $_POST['tipoPropiedad'] != '' && $_POST['tipoPropiedad'] != null ||  $_POST['ciudad'] != '' && $_POST['ciudad'] != null) {
            $tipoPropiedad = $_POST['tipoPropiedad'] ?? '';
            $finalidadPro = $_POST['finalidad'] ?? '';
            $ciudad = $_POST['ciudad'] ?? '';
            $resultadosFiltro = Propiedad::filtroSecundario($tipoPropiedad, $finalidadPro, $ciudad);
        }
        if ($_GET['id'] != null && $_GET['id'] != '') {
            $id = validarORedireccionar('/avanzado');
            $propiedad = VPropiedad::find($id);
        }
        $alertas = Paginas::getAlertas();
        $router->render('paginas/avanzado', [
            'alertas' => $alertas,
            'listadoFinalidades' => $listadoFinalidades,
            'tipoPropiedades' => $tipoPropiedades,
            'resultadosFiltro' => $resultadosFiltro,
            'propiedad' => $propiedad,
        ]);
    }

    public static function sobreNosotros(Router $router)
    {
        $router->render('paginas/sobreNosotros', []);
    }

    public static function contactanos(Router $router)
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $respuesta = $_POST['contacto'];
        //     //Crear una instancia de PHPMAILER
        //     $formaContacto = '';
        //     $mensaje = null;

        //     $mail = new PHPMailer();
        //     //Configurando SMPT
        //     $mail->isSMTP();
        //     $mail->Host = 'smtp.mailtrap.io';
        //     $mail->SMTPAuth = true;
        //     $mail->Username = '615a6b1fb74a12';
        //     $mail->Password = '728ace1ac5280a';
        //     $mail->SMTPSecure = 'tls';
        //     $mail->Port = 2525;

        //     //Configurar el contenido del mail
        //     $mail->setFrom('admin@bienesraices.com');
        //     $mail->addAddress('dmin@bienesraices.com', 'bienesraices.com');
        //     $mail->Subject = 'Tienes un nuevo  mensaje';

        //     //Habilitar el HTML
        //     $mail->isHTML(true);
        //     $mail->CharSet = 'UTF-8';

        //     //Definir el contenido
        //     $contenido = '<html>';
        //     $contenido .= '<p>Tienes un nuevo mensaje</p>';
        //     $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . ' ' . $respuesta['pApellido'] . ' ' . $respuesta['sApellido'] . '</p>';
        //     $contenido .= '<p>Numero celular: ' . $respuesta['celular'] . '</p>';
        //     $contenido .= '<p>E-mail: ' . $respuesta['email'] . '</p>';
        //     if ($respuesta['forma'] == 1) {
        //         $formaContacto = 'Llamada';
        //     } else if ($respuesta['forma'] == 2) {
        //         $formaContacto = 'WhatsApp';
        //     } else {
        //         $formaContacto = 'Correo';
        //     }
        //     $contenido .= '<p>Forma de contacto: ' . $formaContacto . '</p>';
        //     $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
        //     $contenido .= '</html>';

        //     $mail->Body = $contenido;
        //     $mail->AltBody = 'Esto es texto alternativo sin HTML';
        //     //Enviar el mail
        //     if ($mail->send()) {
        //         $mensaje = "Mensaje enviado correctamente.";
        //     } else {
        //         $mensaje = "Error al enviar el mensaje...";
        //     }
        // }

        $router->render('paginas/contactanos', [
            // 'mensaje' => $mensaje
        ]);
    }

    public static function verPropiedad(Router $router)
    {
        $id = validarORedireccionar('/');

        $propiedad = VPropiedad::find($id);
        $empresa = Empresas::find($propiedad->id_propietario);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad,
            'empresa' => $empresa,
        ]);
    }

    public static function verEmpresa(Router $router)
    {
        $id = validarORedireccionar('/');
        $empresa = Empresas::find($id);
        $propiedades = VPropiedad::where('id_propietario', $empresa->id_propietario);
        $router->render('paginas/empresa', [
            'empresa' => $empresa,
            'propiedades' => $propiedades,
        ]);
    }

    public static function error404(Router $router)
    {
        $ocultarFooter = true;

        $router->render('paginas/error404', [
            'ocultarFooter' => $ocultarFooter
        ]);
    }
}
