<?php
require_once "privado/Mensajes.php";
$mensajeError = Mensajes::obtenerMensajeError();
$mensajeExito = Mensajes::obtenerMensajeExito();
$mensajeAviso = Mensajes::obtenerMensajeAviso();
if (isset($_SESSION['nombre'])){ 
    
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear pregunta</title>
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
    <script src="js/index.js"></script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img id="miniLogo"src="img/mini-logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
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
                        <a class="dropdown-item disable" href="#" disable>Temas</a>
                        <a class="dropdown-item" href="#">Artes</a>
                        <a class="dropdown-item" href="#">Matemáticas</a>
                        <a class="dropdown-item" href="#">Programación</a>
                        <a class="dropdown-item" href="#">Ciencias</a>
                        <a class="dropdown-item" href="#">Cotidiano</a>
                        <a class="dropdown-item" href="#">Otro</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown active">
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

    <section class="listas">
        <div class="contenedor-crear">
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

                ?>
            <form class="contenedor-crear" method="POST" action="guardarpregunta.php">
                <div class="form-group">
                    <label for="inputTitulo">Titulo</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <label for="comment">Descripción:</label>
                    <textarea class="form-control" rows="10" id="contenido" name="contenido" placeholder="Descripción"></textarea>
                </div>
                <div>
                    <div class=" my-1">
                        <label class="mr-sm-2" for="categoria">Categoría</label>
                        <select class="custom-select mr-sm-2" name="categoria" id="categoria">
                            <option value="artes" selected>Artes</option>
                            <option value="matematicas">Matemáticas</option>
                            <option value="ciencias">Ciencias</option>
                            <option value="programacion">Programación</option>
                            <option value="cotidiano">Cotidiano</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <button class="btn btn-success btn-lg btn-block text-uppercase" type="submit">Publicar</button>
            </form>

        </div>

    </section>
</body>

</html>