<?php
// Aviso - Resultado de éxito de algo.
// Error - Error de algo.
// Informacion.

class Mensajes {
    public static function establecerMensajeExito($mensaje) {
        self::establecerMensaje($mensaje, "exito");
    }

    public static function obtenerMensajeExito() {
        return self::obtenerMensaje("exito");
    }

    public static function establecerMensajeError($mensaje) {
        self::establecerMensaje($mensaje, "error");
    }

    public static function obtenerMensajeError() {
        return self::obtenerMensaje("error");
    }

    public static function establecerMensajeAviso($mensaje) {
        self::establecerMensaje($mensaje, "aviso");
    }

    public static function obtenerMensajeAviso() {
        return self::obtenerMensaje("aviso");
    }

    private static function establecerMensaje($mensaje, $tipo) {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION["mensaje$tipo"] = $mensaje;
    }

    private static function obtenerMensaje($tipo) {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (isset($_SESSION["mensaje$tipo"])) {
            $mensaje = $_SESSION["mensaje$tipo"];
            unset($_SESSION["mensaje$tipo"]);
            return $mensaje;
        }
        return NULL;
    }

    public static function obtenerIdUsuarioSesion() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (isset($_SESSION["id"])) {
            return $_SESSION["id"];
        }
        return NULL;
    }
}