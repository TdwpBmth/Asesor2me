<?php
include_once '../privado/cargartodo.php';
$actualizar = Usuario::actualizarDatos($_POST['nombre'],$_POST['edad'],null,null,$_POST['correo'],$_POST['verificado'],$_POST['id']);
if($actualizar){
    Mensajes::establecerMensajeExito('Se han actualizado los datos');
    header("Location:index.php");
}else{
    Mensajes::establecerMensajeError('Ocurrio un Error al actualizar');
    header("Location:index.php");
}