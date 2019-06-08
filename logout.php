<?php
include_once "privado/cargartodo.php";
session_start();

/*unset($_SESSION["nombre"]);
unset($_SESSION["id"]);
unset($_SESSION["corrreo"]);*/

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
Mensajes::establecerMensajeAviso('Se ha cerrado la sesión');
header("location: login.php");