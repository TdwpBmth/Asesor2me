<?php
require_once "cargartodo.php";
class Comentarios {
    public $id;
    public $id_pregunta;
    public $id_usuario;
    public $descripcion;
    public $fecha_creacion;

    const PREGUNTA_NO_ENCONTRADA = 1;
    const ERROR = -1;
    const EXITO = 1;
    public function __construct($id_pregunta,$id_usuario,$contenido)
    {
        $this->id_usuario = $id_usuario;
        $this->id_pregunta = $id_pregunta;
        $this->descripcion = $contenido;
    } 
    public static function obtenerComentarios($id_pregunta) {
        $comentarios = array();
        $conexion = Bd::obtenerConexion();
        $query = "SELECT id,id_usuario FROM comentarios where id_pregunta = $id_pregunta";
        $result = $conexion -> query($query);
        if($result === false) {
            Mensajes::establecerMensajeAviso("No se encuentran preguntas");
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $comentarios[] = Comentarios::obtenerComentario($id_pregunta,$row['id_usuario'],$row['id']);
        }
        return $comentarios;
    }
    public static function obtenerComentario($id_pregunta,$id_usuario,$id){
        $comentario = new Comentarios("", "", "");
        $sql = "SELECT id, id_pregunta, id_usuario, descripcion, fecha_hora_creacion FROM comentarios WHERE id=$id and id_pregunta=$id_pregunta and id_usuario=$id_usuario";
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($comentario->id, $comentario->id_pregunta, $comentario->id_usuario, $comentario->descripcion, 
        $comentario->fecha_creacion);
        $hubocomentario = $stmt->fetch();
        $stmt->close();
        if(!$hubocomentario){
            return self::ERROR;
        }else{
            return $comentario;
        }
    }
    public static function borrarComentario($id)
    {
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("DELETE FROM comentarios WHERE id = ?");
        $stmt->bind_param('i',$id); 
        $realizo = $stmt->execute();
        $stmt->close();
        if(!$realizo){
            return self::ERROR;
        }else{
            return self::Exito;
        }
    }
    public function crearComentario() {
        $resultado = self::EXITO;
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("INSERT INTO comentarios(id_usuario,id_pregunta,descripcion) values (?, ?, ?)");
        $stmt->bind_param('iis', $this->id_usuario,$this->id_pregunta,$this->descripcion); 
        if (!$stmt->execute()) {
            $resultado = $this->id_usuario.$this->id_pregunta.$this->descripcion;
            if ($conexion->errno == 1062) {
                $resultado = self::ERROR;
            }
        }
        $stmt->close();
        return $resultado;
    }
   
}