<?php
require_once "privado/Mensajes.php";		    
?>
<!DOCTYPE html>
<html lang="es">
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
    <title>Registro</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img id="miniLogo" src="img/mini-logo.png"></a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Establecer contraseña</h5>
                        nombre correo imagen
                        <?php
                        $nombre = $_GET['nombre'];
                        $correo = $_GET['correo'];
                        echo" <form class='form-signin' action='procesarregistrosocial.php?nombre=$nombre&&correo=$correo' method='POST'>";
                        ?>
                            <div class="form-label-group">
                                <input name="edad" type="number" id="inputEdad" class="form-control" placeholder="Edad"
                                    required min="15">
                                <label for="inputEdad">Edad</label>
                            </div>
                            
                            <div class="form-label-group">
                                <input name="contrasenia" type="password" id="inputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>