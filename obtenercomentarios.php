<?php 
session_start();
include_once"privado/cargartodo.php";
if(isset($_POST["pregunta"])) {
    $comentarios = Comentarios::obtenerComentarios($_POST["pregunta"]);
    if($comentarios==false){
        echo "<li><div class='commentText'><p>No extisten respuestas. Sé el primero en comentar.</p></div></li>";
    }else{
        foreach ($comentarios as $comentario){
        $idUsuario = $comentario->id_usuario;
        $usuario = Usuario::obtenerUsuario($idUsuario);
        $img = $usuario->foto;
        $contenido = $comentario->descripcion;
        $fecha = $comentario->fecha_creacion;
        $nombre = $usuario->nombre;
        if(isset($_SESSION['id'])){
            $usuarioLog = Usuario::obtenerUsuario($_SESSION['id']);
            if($usuarioLog->tipo=='administrador'){
                echo"
                <li>
                    <div class='commenterImage'>
                        <img id='imgUsuario' class='imgUsuario' src='$img'>
                        <input id='idUsuarioComentario' class='idUsuarioComentario' type='text' value='$usuario->id' hidden>
                    </div>
                    <div class='commentText '>
                        <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
                       
                        <span style='color:red; cursor:pointer;' class='date sub-text ' onclick='eliminar($comentario->id)'>Eliminar</span>
                        
                    </div>
                ";
            }elseif($idUsuario==$usuarioLog->id){
                echo "
                <li>
                    <div class='commenterImage'>
                        <img id='imgUsuario' class='imgUsuario' src='$img'>
                        <input id='idUsuarioComentario' class='idUsuarioComentario' type='text' value='$usuario->id' hidden>
                    </div>
                    <div class='commentText '>
                        <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
                       
                        <span style='color:red; cursor:pointer;' class='date sub-text ' onclick='eliminar($comentario->id)'>Eliminar</span>
                        
                    </div>
                </li>";
            }else{
                        echo "
                <li>
                    <div class='commenterImage'>
                        <img id='imgUsuario' class='imgUsuario' src='$img'>
                        <input id='idUsuarioComentario' class='idUsuarioComentario' type='text' value='$usuario->id' hidden>
                    </div>
                    <div class='commentText'>
                        <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
                        <span style='color:blue; cursor:pointer;' class='date sub-text ' onclick='reportar($comentario->id)'>Reportar</span>
                    </div>
                </li>";
            }
        }else{
            echo "
            <li>
                <div class='commenterImage'>
                    <img id='imgUsuario' class='imgUsuario' src='$img'>
                    <input id='idUsuarioComentario' class='idUsuarioComentario' type='text' value='$usuario->id' hidden>
                </div>
                <div class='commentText'>
                    <p>$contenido.</p><span class='date sub-text'>$nombre</span> <span class='date sub-text'>$fecha</span>
                    
                </div>
            </li>";
        }
        
       
        
        }
    }
}