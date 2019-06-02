<?php 
include_once"privado/cargartodo.php";
if(isset($_POST["pregunta"])) {
    $comentarios = Comentarios::obtenerComentarios($_POST["pregunta"]);
    if($comentarios==false){
        echo "<li><div class='commentText'><p>No extisten respuestas. Sé el primero en comentar.</p></div></li>";
    }else{
        foreach ($comentarios as $comentario){
<<<<<<< HEAD
        $idUsuario = $comentario->id_usuario;
        $usuario = Usuario::obtenerUsuario(null,$idUsuario);
=======
        $usuario = Usuario::obtenerUsuario(null,$comentario->id_usuario);
>>>>>>> 468c5f996c73990ceb00c7924c93fa7cc15500a2
        $img = $usuario->foto;
        $contenido = $comentario->descripcion;
        $fecha = $comentario->fecha_creacion;
        $nombre = $usuario->nombre;
<<<<<<< HEAD
        
        echo "
        <li>
            <div class='commenterImage'>
                <img id='imgUsuario' class='imgUsuario' src='$img'>
                <input id='idUsuarioComentario' class='idUsuarioComentario' type='text' value='$usuario->id' hidden>
=======
        echo "
        <li>
            <div class='commenterImage'>
                <img src='$img'>
>>>>>>> 468c5f996c73990ceb00c7924c93fa7cc15500a2
            </div>
            <div class='commentText'>
                <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
            </div>
        </li>";
        
        }
    }
}