<?php
require_once "../privado/cargartodo.php";
$mensajeError = Mensajes::obtenerMensajeError();
$mensajeExito = Mensajes::obtenerMensajeExito();
$mensajeAviso = Mensajes::obtenerMensajeAviso();
if(isset($_SESSION['nombre'])){
    $id=$_SESSION['id'];
    $usuario=Usuario::obtenerUsuario($id);
    
    if($usuario->tipo != 'administrador'){
        header('Location: ../index.php');
    }
}else{
    header('Location: ../login.php');
}    		    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="../js/index.js"></script>
    <title>Registrar</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php"><img id="miniLogo" src="../img/mini-logo.png"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class='nav-item dropdown '>
                        <a class='nav-link dropdown-toggle' href='../perfil.php' id='navbarDropdown' role='button'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Perfil
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='../perfil.php'>Perfil</a>
                            <a class='dropdown-item' href='../cambiarcontrasenia.php'>Cambiar contraseña</a>
                            <div class='dropdown-divider'></div>
                        </div>
                    </li>
                
                    <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='../mispreguntas.php' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Preguntas
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='../crear.php'>Crear pregunta</a>
                        <a class='dropdown-item' href='../mispreguntas.php'>Mis pregutas</a>
                        <div class='dropdown-divider'></div>
                    </div>
                </li>"
                <li class='nav-item dropdown '>
                    <a class='nav-link dropdown-toggle' href='../perfil.php' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Categorías
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href="../index.php?">Todas las categorías</a>
                        <a class='dropdown-item' href="../index.php?categoria='artes'">Artes</a>
                        <a class='dropdown-item' href="../index.php?categoria='matematicas'">Matemáticas</a>
                        <a class='dropdown-item' href="../index.php?categoria='programacion'">Programación</a>
                        <a class='dropdown-item' href="../index.php?categoria='ciencias'">Ciencias</a>
                        <a class='dropdown-item' href="../index.php?categoria='cotidiano'">Cotidiano</a>
                        <a class='dropdown-item' href="../index.php?categoria='libre'">Libre</a>
                        <div class='dropdown-divider'></div>
                    </div>

                </li>


            </ul>
            <div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <button id="btnCerrarSesion" type='button' class='btn btn-outline-danger'>Cerrar sesión</button>
                                       
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrar usuario</h5>
                      
                                <form class='form-signin' action='procesarregistrar.php' method='POST'>
                                <div class='form-label-group'>
                                    <input name='nombre' type='text' id='inputNombre' class='form-control'
                                        placeholder='Nombre' required  autofocus>
                                    <label for='inputNombre'>Nombre</label>
                                </div>
                                <div class='form-label-group'>
                                    <input name='correo' type='email' id='inputEmail' class='form-control'
                                        placeholder='Correo electrónico' required >
                                    <label for='inputEmail'>Correo electrónico</label>
                                </div>
                                <div class="form-label-group">
                                <input name="contrasenia" type="password" id="inputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>                                
                                <button class='btn btn-lg btn-primary btn-block text-uppercase'
                                    type='submit'>Guardar</button>
                                    <a style='color:red; text-align:center;'class='nav-link danger' href='index.php'>Cancelar</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>