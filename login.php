<?php
require_once "privado/Mensajes.php";
$mensajeError = Mensajes::obtenerMensajeError();
$mensajeExito = Mensajes::obtenerMensajeExito();
$mensajeAviso = Mensajes::obtenerMensajeAviso();
if (isset($_SESSION['nombre'])){ 
    header("Location: index.php");
    }else{    
    }		    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="google-signin-client_id" content="418889213372-ajv7o8h2q8tk42qhk9ilq6348flekm22.apps.googleusercontent.com">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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
    <script src="js/login.js"> </script>
    <title>Iniciar sesión</title>
</head>

<body>
<div id="fb-root"></div>

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
                        <h5 class="card-title text-center">Iniciar sesión</h5>
                        <?php                        
                           if(isset($_GET['cerrar'])){
                            echo"
                            <p id='cerrar'hidden>Sign out</p>
                            ";
                            }                    
                            if (isset($mensajeError)) {
                                echo "<div class='alert alert-danger' role='alert'>$mensajeError</div>";
                            }
                            if (isset($mensajeExito)) {
                                echo "<div class='alert alert-success' role='alert'>$mensajeExito</div>";
                            }
                            if (isset($mensajeAviso)) {
                                echo "<div class='alert alert-info' role='alert'>$mensajeAviso</div>";
                            }
                            ?>
                        <form class="form-signin" action="procesarlogin.php" method="POST">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo electrónico"
                                    required autofocus>
                                <label for="inputEmail">Correo electrónico</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="contrasenia"id="inputPassword" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar sesión</button>
                            <div style="text-align:center;" class="my-4">
                                    <p>O</p>
                                </div>
                            <hr class="my-4">
                            <div style=" display: flex;justify-content: center;align-items: center;" class="g-signin2" data-onsuccess="onSignIn"></div>

                                    <div style="text-align:center;" class="my-3">
                                                <a  href="recuperarcontrasenia.php">¿Has olvidado la contraseña?</a>
                                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>