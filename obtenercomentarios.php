<?php 
include_once"privado/cargartodo.php";
if(isset($_POST["pregunta"])) {
    $comentarios = Comentarios::obtenerComentarios($_POST["pregunta"]);
    if($comentarios==false){
        echo "<li><div class='commentText'><p>No extisten respuestas. Sé el primero en comentar.</p></div></li>";
    }else{
        foreach ($comentarios as $comentario){
        $usuario = Usuario::obtenerUsuario(null,$comentario->id_usuario);
        $img = $usuario->foto;
        $contenido = $comentario->descripcion;
        $fecha = $comentario->fecha_creacion;
        $nombre = $usuario->nombre;
        echo "
        <li>
            <div class='commenterImage'>
                <img src='$img'>
            </div>
            <div class='commentText'>
                <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
            </div>
        </li>";
        
        }
    }
}