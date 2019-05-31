<?php
    require_once "privado/cargartodo.php";
    $pregunta = Preguntas::obtenerPregunta($_GET['id']);
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
    <link rel="stylesheet" href="css/visualizar.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
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
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="perfil.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Cambiar contraseña</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
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
            <div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <button type="button" class="btn btn-outline-info">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Cerrar sesión</button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <section class="listas">
        <div class="contenedor-contenido">
                <?php
                    echo "
                    <div class='form-group'>
                        <label for='inputTitulo'>$pregunta->titulo</label>
                    </div>
                    <div class='form-group'>
                        <p for='comment'>$pregunta->contenido</p>
                    </div>
                    "
                ?>
        </div>
            
            <form>
            <div class="detailBox">
                <div class="titleBox">
                    <label>Comentarios</label>
                   
                </div>

                <div class="actionBox">
                    <ul class="commentList">
                        <li>
                            <div class="commenterImage">
                                <img src="http://placekitten.com/50/50" />
                            </div>
                            <div class="commentText">
                                <p class="">Este es un comentario.</p> <span class="date sub-text">25/05/19</span>
                            </div>
                        </li>
                        <li>
                            <div class="commenterImage">
                                <img src="http://placekitten.com/45/45" />
                            </div>
                            <div class="commentText">
                                <p class="">Hello this is a test comment and this comment is particularly very long and
                                    it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                            </div>
                        </li>
                        <li>
                            <div class="commenterImage">
                                <img src="http://placekitten.com/40/40" />
                            </div>
                            <div class="commentText">
                                <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th,
                                    2014</span>

                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="contenedor">
                    <form  >
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Tu comentario" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Comentar</button>
                        </div>
                    </form>
                </div>
                
            </div>

        </form>

    </section>

</body>

</html>