<?php 


// Modelo para manejar la lógica de los usuarios
class Usuario {
    private $conn;
    private $table_name = "Usuario";

    public $id;
    public $nombre;
    public $correo;
    public $contrasena;
    public $tipo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo usuario
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, correo, contrasena, tipo) VALUES (:nombre, :correo, :contrasena, :tipo)";
        $stmt = $this->conn->prepare($query);

        // Sanitización de datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->contrasena = password_hash($this->contrasena, PASSWORD_BCRYPT);
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));

        // Asignar valores
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':contrasena', $this->contrasena);
        $stmt->bindParam(':tipo', $this->tipo);

        // Ejecutar consulta
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para iniciar sesión
    public function iniciarSesion() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE correo = :correo LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->contrasena, $row['contrasena'])) {
                // Almacenar información del usuario en la sesión
                $this->id = $row['id'];
                $this->nombre = $row['nombre'];
                $this->tipo = $row['tipo'];
                return true;
            }
        }
        return false;
    }

    // Método para obtener todos los usuarios (opcional)
    public function listar() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}