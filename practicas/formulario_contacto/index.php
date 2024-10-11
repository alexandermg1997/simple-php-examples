<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$errores = '';
$enviado = false;

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Sanitizar el nombre
    if (!empty($nombre)) {
        $nombre = htmlspecialchars(strip_tags(trim($nombre)), ENT_QUOTES);
    } else {
        $errores .= "Por favor escribe un nombre." . "<br>";
    }

    // Validar y sanitizar el correo
    if (!empty($correo)) {
        // Sanitizar el correo
        $correo = filter_var(htmlspecialchars(strip_tags(trim($correo)), ENT_QUOTES), FILTER_SANITIZE_EMAIL);

        // Validar el formato del correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= "El correo electrónico no es válido." . "<br>";
        }
    } else {
        $errores .= "Por favor ingrese el correo." . "<br>";
    }

    // Sanitizar el mensaje
    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars(strip_tags(trim($mensaje)), ENT_QUOTES);
    } else {
        $errores .= "Por favor escribe un mensaje." . "<br>";
    }

    if (empty($errores)) {
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'shadowhunterszony@gmail.com'; // Tu correo electrónico
            $mail->Password = 'vzlx yvuo chyn ngtd'; // Tu contraseña o contraseña de aplicación
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinatarios
            $mail->setFrom('shadowhunterszony@gmail.com', 'Erasmo'); // Tu dirección y nombre
            $mail->addAddress('shadowhunterszony@gmail.com'); // Correo que recibirá los mensajes

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje de contacto';
            $mail->Body = "Nombre: {$nombre}<br>Correo: {$correo}<br>Mensaje: {$mensaje}";

            // Enviar el correo
            if ($mail->send()) {
                $enviado = true;
                // Limpiar variables después del envío
                $nombre = '';
                $correo = '';
                $mensaje = '';
            } else {
                $errores .= "Error al enviar el correo: " . $mail->ErrorInfo . "<br>";
            }
        } catch (Exception $e) {
            $errores .= "Error al enviar el correo: {$e->getMessage()}<br>";
        }
    }
}

require 'index.view.php';

?>