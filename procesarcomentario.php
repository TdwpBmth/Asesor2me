<?php
include_once"privado/cargartodo.php";
session_start();
$comentario = new Comentarios($_GET['id_pregunta'],$_SESSION['id'],$_POST['comentario']);
<<<<<<< HEAD
=======
echo
$id =$_GET['id_pregunta'];
>>>>>>> 468c5f996c73990ceb00c7924c93fa7cc15500a2
if($comentario->crearComentario()==1){
   echo "exito";
}
else{
 echo "error"; 
}
