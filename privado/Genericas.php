<?php
require_once "class.phpmailer.php";
require_once "class.smtp.php";

/**
 * Manejador de errores fatales, redirecciona a la página error.php.
 */
/* function revisarErrorFatal() {
    $error = error_get_last();
    if ($error['type'] === E_ERROR) {
        header('Location: ./error.php');
    }
} */

// Registrar el manejador de errores fatales:
//register_shutdown_function("revisarErrorFatal");

// Registrar el manejador de excepciones, redireccionar a error.php:
/* set_exception_handler(function($exception) {
    header('Location: ./error.php');
}); */

// Registrar el manejador de errores:
/* set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }

    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}); */

/**
 * Envía un correo electrónico acorde a los parámetros recibidos.
 *
 * @param string $correoDestinatario
 * @param string $nombreDestinatario
 * @param string $asunto
 * @param string $cuerpo
 * @return boolean True, si el correo se envío exitosamente; False, si el correo no se envío
 */
function enviarCorreo($correoDestinatario, $nombreDestinatario, $asunto, $cuerpo)
{
    $config = parse_ini_file('config.ini');

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = $config["servidorcorreo"];
    $mail->Port = $config["puertocorreo"];
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = $config["seguridadcorreo"];
    $mail->Username = $config["usuariocorreo"];
    $mail->Password = $config["contraseniacorreo"];
    $mail->setFrom($config["usuariocorreo"], 'No responder');
    $mail->addAddress($correoDestinatario, $nombreDestinatario);
    $mail->Subject = $asunto;
    $mail->IsHTML(true);
    $mail->Body = $cuerpo;

    if (!$mail->send()) {
        return false;
    }
    return true;
}