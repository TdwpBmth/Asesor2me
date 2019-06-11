<?php
include_once 'privado/cargartodo.php';
$correo = $_POST['correo'];
$usuario=Usuario::obtenerUsuarioCorreo($correo);


if($usuario==false){
    Mensajes::establecerMensajeError("No se encuentra ningun usuario con ese correo");
    header("Location: login.php");
}else{
    $lohizo=Usuario::guardarRecuperacion($correo);
    $usuario=Usuario::obtenerUsuarioCorreo($correo);
    $codigo = $usuario->codigoRecuperacion;
    $server = $_SERVER["HTTP_HOST"];
    $correo = $usuario->correo;
    $asunto = "Recuperación de contraseña";
    $cuerpo = "Si solicitaste recuperar tu contraseña accede al siguiente enlace</br></br>"
    . "<a href='http://$server/Asesor2me/recuperar.php?cadena_recuperacion=$codigo&&correo=$correo'>"
    . "http://$server/recuperar.php?cadena_recuperacion=$codigo</a>";
    
    if (enviarCorreo($usuario->correo, 'Recuperacion de contraseña', $asunto, $cuerpo)) {
        Mensajes::establecerMensajeExito("Por favor revisa tu correo para cambiar la contraseña.");
        header("Location: login.php");
    } else {
        Mensajes::establecerMensajeError("Sucedió un error al enviar el correo de recuperacion.</br>Intentalo de nuevo.");
        header("Location: login.php");
    }
}
