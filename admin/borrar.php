<?php
include_once '../privado/cargartodo.php';
$borrar = Usuario::borrarUsuarioId($_GET['id']);
if($borrar){
    Mensajes::establecerMensajeExito('El usuario ha sido eliminado correctamente');
    header("Location:index.php");
}else{
    Mensajes::establecerMensajeError('Ocurrio un error ');
    header("Location:index.php");
}