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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor2me</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/panelcontrol.css">
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php"><img id="miniLogo" src="../img/mini-logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                </li>
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
            <form class="form-inline my-2 my-lg-0" style="margin-right:1%;">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <button id="btnCerrarSesion" type='button' class='btn btn-outline-danger'>Cerrar sesión</button>
                                       
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
<div class="contenedor-principal">
    <div class="row opciones ">
        <div class="col-4 opciones-d">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                    href="#list-usuarios" role="tab" aria-controls="home">Usuarios</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                    href="#list-reportes" role="tab" aria-controls="profile">Reportes <span
                        class="badge badge-primary badge-pill">0</span></a>

            </div>

        </div>
        <div  class="col-8 contenedor-derecha">
            <div class="tab-content" id="nav-tabContent">
                <!--Se muestran todos los usuarios del sitio -->
                <div class="tab-pane fade show active" id="list-usuarios" role="tabpanel"
                    aria-labelledby="list-home-list">
                    <div id="ContenedorUsuarios" class="contenedor-menu">
                        <nav class="nav">
                            <button id="btnRegistrar"style="margin: 3px;" class='btn btn-info'>Registrar</button>
                            <button id="btnEditar" style="margin: 3px;" class='btn btn-primary'>Editar</button>
                            <button id="btnEliminar" style="margin: 3px;"class='btn btn-danger'>Eliminar</button>
                        </nav>
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
                    </div>
                    <div class="contenedor-usuarios">
                        <div id="accordion">
                            <?php
                            $usuarios = Usuario::obtenerAllUsuarios();
                            $id =0;
                            foreach ($usuarios as $usu) {
                                $id = $id +1;
                                
                                if($usu->verificado == 0){$verificado ='No';}else{$verificado = 'Si';}
                                echo"
                                <div class='card'>
                                <div class='card-header' id='heading$id'>
                                    <h5 class='mb-0'>
                                        <button class='btn btn-link' data-toggle='collapse' data-target='#collapse$id'
                                            aria-expanded='true' aria-controls='collapse$id'>
                                           $usu->correo
                                        </button>
                                    </h5>
                                </div>
                                <div id='collapse$id' class='collapse usu' aria-labelledby='heading$id'
                                    data-parent='#accordion'>
                                    <div id='$usu->id' class='card-body'>
                                        <p>Nombre: $usu->nombre</p>
                                        <p>Correo: $usu->correo</p>
                                        <p>ID: $usu->id</p>
                                        <p>Tipo: $usu->tipo</p>
                                        <p>Verificado: $verificado </p>
                                        <p>Fecha de registro: $usu->fechaHoraRegistro</p>
                                    </div>
                                </div>
                            </div>
                                ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-reportes" role="tabpanel" aria-labelledby="list-profile-list">
                    reportes</div>
            </div>
                
            </div>
        </div>
    </div>
</div>
   
<script src="../js/admin.js"></script>
</body>

</html>