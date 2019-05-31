<?php
 require_once "privado/cargartodo.php";
 session_start();
 $usuario = new Preguntas($_SESSION['id'],$_POST['titulo'],$_POST['contenido'],$_POST['categoria']);
 echo $usuario -> id_usuario;
 if($usuario->crearPregunta()==1){
     Mensajes::establecerMensajeExito("La pregunta se ha publicado exitosamente");
    header("Location: mispreguntas.php");
 }
 else{
    Mensajes::establecerMensajeError("Ocurrio un error al guardar la pregunta. Intentalo de nuevo");
    header("Location: crear.php");
 }