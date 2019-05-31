<?php

class Preguntas {
    public $id;
    public $id_usuario;
    public $titulo;
    public $contenido;
    public $categoria;
    public $fecha_creacion;

    const PREGUNTA_NO_ENCONTRADA = 1;
    const ERROR = -1;
    const EXITO = 1;

    
    public function __construct($id_usuario,$titulo,$contenido,$categoria)
    {
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->categoria = $categoria;
    } 

    // Kevin
    public static function borrarPregunta($id)
    {
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("DELETE FROM pregunta WHERE id = ?");
        $stmt->bind_param('i',$id); 
        $realizo = $stmt->execute();
        $stmt->close();
        if(!$realizo){
            return self::ERROR;
        }else{
            return self::Exito;
        }
    }

    public static function obtenerPregunta($id){
        $pregunta = new Preguntas("", "", "", "","");
        $sql = "SELECT id, id_usuario, titulo, contenido, categoria, fecha_hora_creacion FROM pregunta WHERE id='$id'";
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($pregunta->id, $pregunta->id_usuario, $pregunta->titulo, $pregunta->contenido, 
        $pregunta->categoria, $pregunta->fecha_hora_creacion);
        $huboPregunta = $stmt->fetch();
        $stmt->close();
        if(!$huboPregunta){
            return self::PREGUNTA_NO_ENCONTRADA;
        }else{
            return $pregunta;
        }
    }
    public function crearPregunta() {
        $resultado = self::EXITO;
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("INSERT INTO pregunta(id_usuario,titulo,contenido,categoria) values (?, ?, ?, ?)");
        $stmt->bind_param('isss', $this->id_usuario,$this->titulo,$this->contenido, $this->categoria); 
        if (!$stmt->execute()) {
            $resultado = self::ERROR;
            if ($conexion->errno == 1062) {
                $resultado = self::ERROR;
            }
        }
        $stmt->close();
        return $resultado;
    }
    public function obtenerAllPreguntas() {
        $preguntas = array();
        $conexion = Bd::obtenerConexion();
        $query = "SELECT id FROM pregunta";
        $result = $conexion -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $preguntas[] = Preguntas::obtenerPregunta($row['id']);
        }
        return $preguntas;
    }

    public function obtenerPreguntasUsuario($id_usuario) {
        $preguntas = array();
        $conexion = Bd::obtenerConexion();
        $query = "SELECT id FROM pregunta where id_usuario = $id_usuario";
        $result = $conexion -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $preguntas[] = Preguntas::obtenerPregunta($row['id']);
        }
        return $preguntas;
    }
}