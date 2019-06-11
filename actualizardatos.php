<?php
require_once 'privado/cargartodo.php';
if (session_start() && isset($_SESSION['nombre'])){     
    if(isset($_POST['nombre'])){
        $respuesta = Usuario::actualizarDatos($_POST['nombre'],null,null,null,$_SESSION['correo'],null,null);
        if($respuesta == false){
            Mensajes::establecerMensajeError('No se pudieron actualizar los datos. Intentalo de nuevo');
            header("Location: perfil.php");
        }else{
            Mensajes::establecerMensajeExito('Se actualizaron los datos correctamente');
            header("Location: perfil.php");
        }
    }elseif (isset($_POST['edad'])) {
        $seActualizo = Usuario::actualizarDatos(null,$_POST['edad'],null,null,$_SESSION['correo'],null,null);
        if ($seActualizo) {
            Mensajes::establecerMensajeExito('Se actualizaron los datos correctamente');
            header("Location: perfil.php");
        }else{
            Mensajes::establecerMensajeError('No se pudieron actualizar los datos. Intentalo de nuevo');
            header("Location: perfil.php");
        }
    }else {
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        // Ruta donde se guardarán las imágenes que subamos
        //$directorio = $_SERVER['DOCUMENT_ROOT'].'/Asesor2me/privado/imgperfil/';
        $directorio = 'img/imgPerfil/';
        list($base,$extension) = explode('.',$nombre_img);
        $newname = implode('.', [$base, time(), $extension]);
        //Si existe imagen y tiene un tamaño correcto
        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 2000000)) {
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") ||
                ($_FILES["imagen"]["type"] == "image/jpeg") ||
                ($_FILES["imagen"]["type"] == "image/jpg") ||
                ($_FILES["imagen"]["type"] == "image/png")) {
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$newname)){
                    $seActualizo = Usuario::actualizarDatos(null,null,$directorio.$newname,null,$_SESSION['correo'],null,null);
                    if ($seActualizo) {
                        Mensajes::establecerMensajeExito('Se actualizaron los datos correctamente');
                        header("Location: perfil.php");
                    }else{
                        Mensajes::establecerMensajeError('Se produjo un error al subir la imagen. Intentalo de nuevo');
                        header("Location: perfil.php");
                    }
                }else{
                    Mensajes::establecerMensajeError("Se ha producido un error al subir la imagen");
                    header("Location: perfil.php");
                }
            } else {
                Mensajes::establecerMensajeError("No se puede subir una imagen con ese formato");
                header("Location: perfil.php");
            }
        } else {
            if ($nombre_img == !NULL){
                Mensajes::establecerMensajeError("La imagen es demasiado grande");
                header("Location: perfil.php");
            } 
        }
    }
    
}else{
    $usuario = Usuario::obtenerUsuario($_POST['correo']);
    }
?>