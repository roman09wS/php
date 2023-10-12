<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'path/to/PHPMailer/Exception.php';
require 'path/to/PHPMailer/PHPMailer.php';
require 'path/to/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_lib {
    public function __construct() {
        $this->ci = &get_instance();
        $this->mail = new PHPMailer(true);
    }

    public function initialize() {
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls'; // O 'ssl' si tu servidor SMTP lo requiere
        $this->mail->Port = 587; // Puerto SMTP
        $this->mail->Host = 'smtp.tudominio.com'; // Cambia esto al servidor SMTP de tu proveedor de correo
        $this->mail->Username = 'tu@email.com'; // Tu dirección de correo electrónico
        $this->mail->Password = 'tucontraseña'; // Tu contraseña
    }

    public function send_email($to, $subject, $message, $from) {
        try {
            $this->mail->setFrom($from);
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;

            return $this->mail->send();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
