<?php
include_once 'privado/cargartodo.php';
$borrar = Comentarios::borrarComentario($_POST['id']);
if($borrar){
    echo "exito";
 }
 else{
  echo "error"; 
 }
