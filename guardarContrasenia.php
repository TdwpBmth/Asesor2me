<?php
include_once 'privado/cargartodo.php';
if(!isset($_POST['contrasenia'])){
    header("Location: login.php");
}
$correo = $_GET['correo'];
$contra = $_POST['contrasenia'];

$sehizo=Usuario::almacenarContrasenia($correo,$contra);
if($sehizo!=false){
    $x=Usuario::restablecer($correo);
    Mensajes::establecerMensajeExito("Tu contraseña ha sido actualizada");
        header("Location: login.php");
}else{
    Mensajes::establecerMensajeError("Sucedio un error al cambiar la contraseña. Intentalo de nuevo");
        header("Location: login.php");
}
