<?php
require_once "Bd.php";
require_once "Genericas.php";
require_once "Aplicacion.php";

/**
 * Gestiona lo relacionado con los usuarios.
 */
class Usuario

{
    public $id;
    public $correo;
    public $nombre;
    public $contrasenia;
    public $tipo;
    public $genero;
    public $fechaNacimiento;
    public $foto;
    public $activo;
    public $verificado;
    public $codigoVerificacion;
    public $contraseniaRecibida;
    public $fechaHoraRegistro;
    public $codigoRecuperacion;
    public $fechaHoraRecuperacion;  
    //public $listas;  
    
    const ERROR = -1;
    const EXITO = 1;

    // De preregistrar:
    const ERROR_CORREO_DUPLICADO = -2;
    
    // De verificar correo:
    const USUARIO_YA_VERIFICADO = 2;
    const CODIGO_NO_ENCONTRADO = -2;
    const CODIGO_NO_VIGENTE = -3;
    const VIGENCIA_COD_VERIFICACION = 5;
    const FORMATO_VIGENCIA_COD_VERIFICACION = "MINUTE";
    
    //De Iniciar Sesion
    const DATOS_INCORRECTOS=-6;
    const DATOS_VACIOS=-7;
    const USUARIO_NO_VERIFICADO=-8;

    //De consultar correo
    const USUARIO_NO_ENCONTRADO = -1;

    /**
     * Constructor.
     *
     * @param string $correo
     * @param string $nombre
     * @param string $contrasenia
     * @param string $genero
     * @param string $fechaNacimiento
     */
    public function __construct($correo, $nombre, $contrasenia, $genero, $fechaNacimiento)
    {
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->contrasenia = $contrasenia;
        $this->genero = $genero;
        $this->fechaNacimiento = $fechaNacimiento;
    }    

    /**
     * Retorna un código único, validando la no-repetición en la base de datos.
     *
     * @param string $tipo "verificacion" o "recuperacion"
     * @return string|int código|ERROR si el tipo no corresponde 
     */
    private static function obtenerCodigoUnico($tipo) {
        if ($tipo != "verificacion" && $tipo != "recuperacion") {
            return self::ERROR;
        }

        $conexion = Bd::obtenerConexion();
        
        do {
            $codigo = md5(uniqid(rand(),true));
            $resultado = $conexion->query("SELECT correo FROM usuarios WHERE codigo_$tipo = '$codigo'");

            if ($resultado->num_rows == 0) {
                return $codigo;
            }
        } while (true);
    }

    /**
     * Verifica al usuario acorde al código recibido.
     *
     * Los códigos de verificación tienen una vigencia configurable a través de las constantes VIGENCIA_COD_VERIFICACION y FORMATO_VIGENCIA_COD_VERIFICACION (MICROSECOND, SECOND, MINUTE, HOUR, DAY, WEEK, MONTH, QUARTER o YEAR).
     * @link https: //dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_timestampdiff
     *
     * @param string $codigoVerificacion
     * @return int EXITO, CODIGO_NO_ENCONTRADO, USUARIO_YA_VERIFICADO, CODIGO_NO_VIGENTE
     */
    public static function verificarCorreo($codigoVerificacion) {
        $resultado = self::EXITO;

        $conexion = Bd::obtenerConexion();
        
        $stmt = $conexion->prepare("SELECT id, verificado, TIMESTAMPDIFF(".self::FORMATO_VIGENCIA_COD_VERIFICACION.", fecha_hora_registro, NOW()) AS tiempo_transcurrido FROM usuarios WHERE codigo_verificacion = ?");

        $stmt->bind_param('s', $codigoVerificacion);
        $stmt->execute();
        $stmt->bind_result($id, $verificado, $tiempoTranscurrido);
        
        $huboRegistros = $stmt->fetch();
        $stmt->close();

        if (!$huboRegistros) {
            $resultado = self::CODIGO_NO_ENCONTRADO;
        } else if ($verificado) {
            $resultado = self::USUARIO_YA_VERIFICADO;
        } else if ($tiempoTranscurrido > self::VIGENCIA_COD_VERIFICACION) {
            $resultado = self::CODIGO_NO_VIGENTE;
        } else {
            $conexion->query("UPDATE usuarios SET verificado = 1 WHERE id = $id");
        }

        return $resultado;
    }

    /**
     * Inserta al usuario en la base de datos, se le denomina preregistro porque se genera y se le asigna al usuario el código de verificación que tendrá que utilizar para confirmar su correo electrónico.
     *
     * @return int EXITO
     */
    public function preregistrar() {
        $resultado = self::EXITO;

        $this->codigoVerificacion = self::obtenerCodigoUnico("verificacion");
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, correo, contrasenia, genero, fecha_nacimiento, codigo_verificacion) values (?, ?, ?, ?, ?, ?)");
        $contrasenia = hash("sha512", $this->contrasenia);
        $stmt->bind_param('ssssss', $this->nombre, $this->correo, $contrasenia, $this->genero, $this->fechaNacimiento, $this->codigoVerificacion); 
        
        if (!$stmt->execute()) {
            $resultado = self::ERROR;

            // Si falla la ejecución de la consulta se podría verificar el número de error (errno) o el mensaje de error (error) si se desea retornar un código de error más específico:
            if ($conexion->errno == 1062) {
                $resultado = self::ERROR_CORREO_DUPLICADO;
            }
        }

        $stmt->close();
        return $resultado;
    }

    public static function iniciarSesion($correo, $contrasenia){
        $resultado=self::EXITO;
        $conexion = Bd::obtenerConexion();
        $correo=$_POST['txtCorreo'];
        $contrasenia = $_POST['txtPassword'];
        Aplicacion::establecerMensajeAviso($contrasenia);
        $stmt = $conexion->prepare("SELECT verificado, nombre, id, contrasenia FROM usuarios WHERE correo = ?");
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $stmt->bind_result($verificado, $nombre, $id, $contraseniaBD);
        $huboRegistros = $stmt->fetch();
        $stmt->close();
        if (!$huboRegistros && password_verify($contrasenia, $contraseniaBD )) {
            $resultado=self::DATOS_INCORRECTOS;
        } else if(!$verificado){
            $resultado=self::USUARIO_NO_VERIFICADO;
        } else{
            $resultado=self::EXITO;
            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }
            $_SESSION["nombre"] = $nombre;
            $_SESSION["id"] = $id;
            $_SESSION["corrreo"] = $correo;
        }
    
        return $resultado;
    }
    /**
     * Obtiene todos los datos del usuario a partir de su correo
     * @param string correo Correo a partir del cual se obtendrá el usuario
     * @return Usuario int retorna un objeto de tipo usuario si se encontró, en caso contrario retorna USUARIO_NO_ENCONTRADO
     */
    public static function obtenerUsuario($correo){
         $usuario = new Usuario("", "", "", "", "");

        $sql = "SELECT id, correo, nombre, tipo, genero, fecha_nacimiento, foto, activo,
        verificado, codigo_verificacion, fecha_hora_registro, codigo_recuperacion, fecha_hora_recuperacion FROM USUARIOS WHERE CORREO='$correo'";

        $conexion = Bd::obtenerConexion();

        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($usuario->id, $usuario->correo, $usuario->nombre, $usuario->tipo, 
            $usuario->genero, $usuario->fechaNacimiento, $usuario->foto, $usuario->activo, 
            $usuario->verificado, $usuario->codigoVerificacion, $usuario->fechaHoraRegistro, 
            $usuario->codigoRecuperacion, $usuario->fechaHoraRecuperacion);
        
        $huboUsuario = $stmt->fetch();
        $stmt->close();
        if(!$huboUsuario){
            return self::USUARIO_NO_ENCONTRADO;
        }else{
            return $usuario;
        }
    }
    public static function borrarUsuario($correo){
         $conexion = Bd::obtenerConexion();
         $stmt = $conexion->prepare("DELETE FROM usuarios WHERE correo = ?");
         $stmt->bind_param('s', $correo);
         $stmt->execute();
         $stmt->close();
    }

    // Kevin
    public function obtenerListas() {
        //$listas = Colección de objetos de tipo lista
        $listas = array();
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("SELECT id,titulo FROM listas WHERE id_usuario = ?");
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        $huboListas = $stmt->fetch();
        if($huboListas === null) {
            Aplicacion::establecerMensajeAviso("No se han creado listas");
            return null;
        }
        while ($row = $stmt ->fetch_assoc()) {
            $listas[] = Lista::obtenerListas($row['id'],$row['titulo']);
        }
        $stmt->close();
        return $listas;
    }
}
