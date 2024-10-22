<?php

class Model{

    // Inicializa una instancia de la base de datos
    function __construct(){
        $this->db = new Database();
    }

    // Metodo para la consulta
    function query($query){
        return $this->db->connect()->query($query);
    }
    // Prepara la consulta
    function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}

?>