<?php
require_once "privado/cargartodo.php";

if (isset($_GET["cadena_verificacion"])) {
    $respuesta = Usuario::verificarCorreo($_GET["cadena_verificacion"]);
    switch ($respuesta) {
        case Usuario::EXITO:
            Mensajes::establecerMensajeExito("Tu cuenta ha sido verificada, ya puedes iniciar sesión.");
            header("Location: login.php");
            break;
        case Usuario::CODIGO_NO_ENCONTRADO:
            Mensajes::establecerMensajeError("Ups, no se encuentra la cadena de verificación. Registrate de nuevo.");
            header("Location: registro.php");
            break;
        case Usuario::USUARIO_YA_VERIFICADO:
            Mensajes::establecerMensajeAviso("Tu cuenta ya se encuentra verificada, puedes iniciar sesión.");
            header("Location: login.php");
            break;
        case Usuario::CODIGO_NO_VIGENTE:
            Mensajes::establecerMensajeError("El código ya caducó, intenta de nuevo el registro.");
            header("Location: registro.php");
            break;
    }    
} else {
    Mensajes::establecerMensajeError("Ups, no se encuentra la cadena de verificación.");
    header("Location: login.php");
}