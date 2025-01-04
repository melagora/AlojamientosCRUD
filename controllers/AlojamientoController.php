<?php

// Controlador para manejar la lógica de los alojamientos
/*
require_once '../config.php';
require_once '../models/Alojamiento.php';

class AlojamientoController {
    private $db;
    private $alojamiento;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->alojamiento = new Alojamiento($this->db);
    }

    public function mostrarAlojamientos() {
        return $this->alojamiento->listar();
    }
}
    */
    require_once '../config.php'; // 
    require_once '../models/Alojamiento.php'; // 
    
    class AlojamientoController {
        private $conn;
    
        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection(); // Obtiene la conexión PDO
        }
    
        public function mostrarAlojamientos() {
            $query = "SELECT * FROM Alojamiento"; // Cambia esto según tu tabla
            $stmt = $this->conn->prepare($query); // Aquí se usa la conexión PDO
            $stmt->execute();
            return $stmt;
        }
    }
