<?php
require_once "privado/cargartodo.php";
$mensajeError = Mensajes::obtenerMensajeError();
$mensajeExito = Mensajes::obtenerMensajeExito();
$mensajeAviso = Mensajes::obtenerMensajeAviso();
if (isset($_SESSION['nombre'])){ 
    header("Location: index.php");
    }	  
    
if (isset($_GET["cadena_recuperacion"])) {
        $correo = $_GET['correo'];
        $codigo =$_GET["cadena_recuperacion"];
        $usuario = Usuario::obtenerUsuarioCorreo($correo);
        if($usuario->codigoRecuperacion==$codigo){

        }
     else {
        Mensajes::establecerMensajeError("El codigo de recuperacion no es valido");
        header("Location: login.php");
    }
} else{
    Mensajes::establecerMensajeError("Ups, no se encuentra la cadena de recuperacion.");
        header("Location: login.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/index.js"></script>
    <title>Recuperación de contraseña</title>
</head>

<body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><img id="miniLogo" src="img/mini-logo.png"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                            <button id="btnRegistrarse" type="button" class="btn btn-outline-light">Registrarse</button>                        
                </div>
            </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Recuperación de contraseña</h5>
                        <?php
                            if (isset($mensajeError)) {
                                echo "<div class='alert alert-danger' role='alert'>$mensajeError</div>";
                            }
                            if (isset($mensajeExito)) {
                                echo "<div class='alert alert-success' role='alert'>$mensajeExito</div>";
                            }
                            if (isset($mensajeAviso)) {
                                echo "<div class='alert alert-info' role='alert'>$mensajeAviso</div>";
                            }

                            echo"<form class='form-signin' action='guardarContrasenia.php?correo=$correo' method='POST'>";
                            ?>
                            
                        
                            <div class="form-label-group">
                                <input type="password" id="inputContrasenia" name="contrasenia" class="form-control" placeholder="Nueva contraseña"
                                    required autofocus>
                                <label for="inputContrasenia">Nueva contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Guardar</button>
                            <div style="text-align:center;" class="my-4">
                                </div>
                            <hr class="my-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>