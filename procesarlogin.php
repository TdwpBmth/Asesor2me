<?php
require_once "privado/cargartodo.php";

if (isset($_POST["correo"]) && isset($_POST["contrasenia"])) {
    $respuesta = Usuario::iniciarSesion($_POST["correo"], $_POST["contrasenia"]);

    switch ($respuesta) {
        case Usuario::EXITO:
            header("Location: index.php");
            break;
        case Usuario::DATOS_INCORRECTOS:
            Aplicacion::establecerMensajeError("Ups, parece que tus datos están incorrectos.");
            header("Location: login.php");
            break;
        case Usuario::USUARIO_NO_VERIFICADO:
            Aplicacion::establecerMensajeAviso("Tu cuenta no se encuentra verificada, favor de revisar tu correo electrónico o registrarte de nuevo.");
            header("Location: login.php");
            break;
    }    
} else {
    Aplicacion::establecerMensajeError("Ups, datos incompletos.");
    header("Location: login.php");
}