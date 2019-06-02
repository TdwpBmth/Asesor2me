<?php
include_once"privado/cargartodo.php";
session_start();
$comentario = new Comentarios($_GET['id_pregunta'],$_SESSION['id'],$_POST['comentario']);
echo
$id =$_GET['id_pregunta'];
if($comentario->crearComentario()==1){
   echo "exito";
}
else{
 echo "error"; 
}
