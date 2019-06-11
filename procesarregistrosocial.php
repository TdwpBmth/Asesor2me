<?php
require_once 'privado/cargartodo.php';
    
    $usuario = new Usuario($_GET['correo'], $_GET['nombre'],null);
     if(Usuario::obtenerUsuarioCorreo($usuario->correo)==false){
    do {
        $respuesta = $usuario->registrarGoogle();
        if ($respuesta == Usuario::ERROR_CORREO_DUPLICADO) {
            $usuario = Usuario::obtenerUsuarioCorreo($_GET['correo']);
            if($usuario->verificado){
                header("Location: logingoogle.php?correo=$usuario->correo");
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
                $corrreo = $_GET['correo'];
               header("Location: logingoogle.php?correo=$usuario->correo");
            break;
    }
}else{
    if($usuario->contrasenia==null){
        Mensajes::establecerMensajeError("Tu cuenta se encuentra registrada manualmente");
        header("Location: login.php");
    }else{
        header("Location: logingoogle.php?correo=$usuario->correo");
    }
    
}
