<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor2me</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <?php
                    session_start();
                    if (isset($_SESSION['nombre'])){ 
                        echo "  <li class='nav-item dropdown '>
                        <a class='nav-link dropdown-toggle' href='perfil.php' id='navbarDropdown' role='button'
                            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Perfil
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='perfil.php'>Perfil</a>
                            <a class='dropdown-item' href='cambiarcontrasenia.php'>Cambiar contraseña</a>
                            <div class='dropdown-divider'></div>
                        </div>
                    </li>
                
                    <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='mispreguntas.php' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Preguntas
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='crear.php'>Crear pregunta</a>
                        <a class='dropdown-item' href='mispreguntas.php'>Mis pregutas</a>
                        <div class='dropdown-divider'></div>
                    </div>
                </li>"; 
                        
                    
                    }
                ?>
                <li class='nav-item dropdown '>
                    <a class='nav-link dropdown-toggle' href='perfil.php' id='navbarDropdown' role='button'
                        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        Categorías
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='#' disable>Temas</a>
                        <a class='dropdown-item' href='#'>Artes</a>
                        <a class='dropdown-item' href='#'>Matemáticas</a>
                        <a class='dropdown-item' href='#'>Programación</a>
                        <a class='dropdown-item' href='#'>Ciencias</a>
                        <a class='dropdown-item' href='#'>Cotidiano</a>
                        <a class='dropdown-item' href='#'>Libre</a>
                        <div class='dropdown-divider'></div>
                    </div>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" style="margin-right:1%;">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <?php
                                    if (isset($_SESSION['nombre'])){ 
                                        echo "<button id='btnCerrarSesion' type='button' class='btn btn-outline-danger'>Cerrar sesión</button>"; 
                                        }else{
                                            echo "<button id='btnRegistrarse' type='button' class='btn btn-outline-light'>Registrarse</button>
                                            <button id='btnIniciarSesion' type='button' class='btn btn-outline-primary'>Iniciar sesión</button>";
                                        }
                                        ?>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <section class="listas">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Titulo</h5>
                    <small>Hace 3 dias</small>
                </div>
                <p class="mb-1">Descripcion de la pregunta</p>
            </a>
        </div>
    </section>
</body>

</html>