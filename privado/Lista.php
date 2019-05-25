<?php

class Lista {
    public $id;
    public $titulo;
    
    public function __construct($id, $titulo)
    {
        $this->id = $id;
        $this->titulo = $titulo;
    } 

    // Kevin
    public static function borrarLista($id)
    {
        $conexion = Bd::obtenerConexion();
        $stmt = $conexion->prepare("DELETE FROM listas WHERE id = ?");
        $stmt->bind_param('i',$id); 
        $stmt->execute();
    }
}