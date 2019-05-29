<?php
require_once 'privado/cargartodo.php';

if (session_start() && isset($_SESSION['nombre'])){ 
    $usuario = Usuario::obtenerUsuario($_SESSION['correo']);
    
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/perfil.css">
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
    <script src="js/index.js">
    </script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="img/mini-logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="perfil.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil.php">Perfil</a>
                        <a class="dropdown-item" href="cambiarcontrasenia.php">Cambiar contraseña</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="perfil.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" disable>Temas</a>
                        <a class="dropdown-item" href="#">Artes</a>
                        <a class="dropdown-item" href="#">Matemáticas</a>
                        <a class="dropdown-item" href="#">Programación</a>
                        <a class="dropdown-item" href="#">Ciencias</a>
                        <a class="dropdown-item" href="#">Cotidiano</a>
                        <a class="dropdown-item" href="#">Libre</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="mispreguntas.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Preguntas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="crear.php">Crear pregunta</a>
                        <a class="dropdown-item" href="mispreguntas.php">Mis pregutas</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
            <button id="btnCerrarSesion" type="button" class="btn btn-outline-danger">Cerrar sesión</button>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div id="contenedor-foto-perfil">
                            <div ><img id="edit-icon" src="img/edit.png"></div>
                            <img id="fotoperfil" src="img/defaultperfil.png">
                            
                        </div>
                        <div>
                                <div class="contenedor-edit-icon">  <h5>Nombre: </h4></div>                          
                                    <div ><img id="edit-icon" src="img/edit.png"></div>
                                    <?php echo "<div class='contenedor-dato'> <p> $usuario->nombre</p></div>" ?>
                        </div>
                        <hr class="my-1">
                       
                        
                        <div>
                            <div class="contenedor-edit-icon">  <h5>Edad: </h4></div>                          
                                <div ><img id="edit-icon" src="img/edit.png"></div>
                                <?php echo "<div class='contenedor-dato'> <p> $usuario->edad</p></div>" ?>
                        </div>
                        <hr class="my-1">
                        <div>
                                <div class="contenedor-edit-icon">  <h5>Correo: </h4></div>                          
                                <?php echo "<div class='contenedor-dato'> <p> $usuario->correo</p></div>" ?>
                        </div>
                        <hr class="my-lg-1">
                    </div>
                    <div style="text-align:center; margin-bottom: 2%">
                            <button type="button" class="btn btn-success" disabled>Guardar</button>
                            <button type="button" class="btn btn-danger" disabled>Cancelar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>