<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $nombre;
    public $p_apellido;
    public $s_apellido;
    public $email;
    public $token;

    public function __construct($nombre, $p_apellido, $s_apellido, $email, $token)
    {
        $this->nombre = $nombre;
        $this->p_apellido = $p_apellido;
        $this->s_apellido = $s_apellido;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        //Configurando SMPT
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->Port = $_ENV['EMAIL_PORT'];

        //Configurar el contenido del mail
        $mail->setFrom('admin@bienesraices.com');
        $mail->addAddress('dmin@bienesraices.com', 'bienesraices.com');
        $mail->Subject = 'Confirma tu cuenta de InmoBilink';

        //Habilitar el HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //Definir el contenido
        $contenido = '<html>';
        $contenido .= '<p>Hola <strong>' . $this->nombre . ' ' . $this->p_apellido . ' ' . $this->s_apellido . '</strong> Se ha registrado tu cuenta en <strong>InmoBilink</strong>,</p>';
        $contenido .= '<p>solo debes confirma tu cuenta <strong>' . $this->email . '</strong></p>';
        $contenido .= "<p>Presiona aquí : <a href='".$_ENV['APP_URL']."/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a></p>";
        $contenido .= '<p>Si tu no solicitaste tu cuenta, puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        //Enviar el mail
        $mail->send();
    }

    public function enviarRecuperarPassword()
    {
        $mail = new PHPMailer();
        //Configurando SMPT
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->Port = $_ENV['EMAIL_PORT'];

        //Configurar el contenido del mail
        $mail->setFrom('admin@bienesraices.com');
        $mail->addAddress('dmin@bienesraices.com', 'bienesraices.com');
        $mail->Subject = 'Restablece tu contraseña de InmoBilink';

        //Habilitar el HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //Definir el contenido
        $contenido = '<html>';
        $contenido .= '<p>Hola <strong>' . $this->nombre . ' ' . $this->p_apellido . ' ' . $this->s_apellido . '</strong> has solicitado restablecer tu contraseña de <strong>InmoBilink</strong>,</p>';
        $contenido .= '<p>Da click en el siguiente enlace para crear una nueva contraseña de tu cuente <strong>' . $this->email . '</strong> presionando el siguiente enlace</p>';
        $contenido .= "<p>Presiona aquí : <a href='".$_ENV['APP_URL']."/nuevo-password?token=" . $this->token . "'>Crear nueva contraseña</a></p>";
        $contenido .= '<p>Si tu no solicitaste este mensaje, puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        //Enviar el mail
        $mail->send();
    }
}
