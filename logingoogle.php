<?php
require_once "privado/cargartodo.php";

if (isset($_GET["correo"])) {
    $respuesta = Usuario::iniciarSesionGoogle($_GET["correo"]);
    $usuario = Usuario::obtenerUsuarioCorreo($_GET["correo"]);
    $tipo = $usuario->tipo;
    switch ($respuesta) {
        case Usuario::EXITO:
            if($tipo=='administrador'){
                header("Location: admin/index.php");
                break;
            }else{
                header("Location: index.php");
                break;
            }  
        case Usuario::DATOS_INCORRECTOS:
            Mensajes::establecerMensajeError("Ups, parece que tus datos están incorrectos.");
            header("Location: login.php");
            break;
        case Usuario::USUARIO_NO_VERIFICADO:
            Mensajes::establecerMensajeAviso("Tu cuenta no se encuentra verificada, favor de revisar tu correo electrónico o registrarte de nuevo.");
            header("Location: login.php");
            break;
    }    
} else {
    Mensajes::establecerMensajeError("Ups, datos incompletos.");
    header("Location: login.php");
}