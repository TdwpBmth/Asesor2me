<?php
include_once '../privado/cargartodo.php';
$actualizar = Usuario::actualizarDatosAdmin($_POST['nombre'],null,null,$_POST['correo'],$_POST['verificado'],$_POST['id'],$_POST['tipo']);
if($actualizar){
    Mensajes::establecerMensajeExito('Se han actualizado los datos');
    header("Location:index.php");
}else{
    Mensajes::establecerMensajeError('Ocurrio un Error al actualizar');
    header("Location:index.php");
}