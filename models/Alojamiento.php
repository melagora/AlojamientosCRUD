<?php 

// Modelo para manejar la lógica de los alojamientos

class Alojamiento {
    private $conn;
    private $table_name = "Alojamiento";

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $disponibilidad;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE disponibilidad = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}