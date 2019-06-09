<?php
require_once 'privado/cargartodo.php';
    $usuario = new Usuario($_GET['correo'], $_GET['nombre'], $_POST['contrasenia'], $_POST['edad'] );
    do {
        $respuesta = $usuario->preregistrar();
        if ($respuesta == Usuario::ERROR_CORREO_DUPLICADO) {
            $usuario = Usuario::obtenerUsuarioCorreo($_GET['correo']);
            if($usuario->verificado){
                Mensajes::establecerMensajeAviso("El usuario con correo ".$_GET['correo']." ya se encuentra registrado.");
                header("Location: login.php");
            }else{
                Usuario::borrarUsuario($_GET['correo']);   
            }
        } else {
            break;
        }
    } while(true);

    switch($respuesta){
        case Usuario::ERROR:
            Mensajer::establecerMensajeError("Sucedió un error.</br>Inténtalo más tarde.");
            header("Location: registro.php");
            break;
        case Usuario::EXITO:
            $server = $_SERVER["HTTP_HOST"];
            $asunto = "Por favor completa el registro";
            $cuerpo = "Tu correo ha sido registrado en la pagina de Asesor2me. Por favor completa tu registro verificando tu cuenta</br></br>"
            . "Por favor ingresa al siguiente enlace:</br>"
            . "<a href='https://$server/verificar.php?cadena_verificacion=$usuario->codigoVerificacion'>";
            if (enviarCorreo($usuario->correo, 'Nuevo usuario preregistrado', $asunto, $cuerpo)) {
                Mensajes::establecerMensajeExito("Estás a un paso de completar el registro.Se un correo electrónico para confirmar la cuenta.");
                header("Location: login.php");
            } else {
                Mensajes::establecerMensajeError("Sucedió un error al enviar el correo de verificación.</br>Intenta el registro de nuevo.");
                header("Location: registro.php");
            }
            break;
    }
