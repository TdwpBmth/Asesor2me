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
    <title>Iniciar sesión</title>
</head>

<body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><img src="img/mini-logo.png"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                  
                    <form class="form-inline my-2 my-lg-0" style="margin-right:1%;">
                            <button type="button" class="btn btn-outline-light">Iniciar sesión</button>
                        </form>
                </div>
            </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registro</h5>
                        <form class="form-signin">
                                <div class="form-label-group">
                                        <input type="text" id="inputNombre" class="form-control" placeholder="Nombre"
                                            required autofocus>
                                        <label for="inputEmail">Nombre</label>
                                    </div>
                                    <div class="form-label-group">
                                            <input type="text" id="inputUsuario" class="form-control" placeholder="Usuario"
                                                required >
                                            <label for="inputEmail">Usuario</label>
                                        </div>
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico"
                                    required >
                                <label for="inputEmail">Correo electrónico</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                    class="fab fa-google mr-2"></i> Registrase con Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                    class="fab fa-facebook-f mr-2"></i> Registrarse con Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>