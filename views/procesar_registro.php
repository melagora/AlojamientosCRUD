<?php
// Incluir archivo de configuración para la conexión
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $contrasena_plana = trim($_POST['contrasena']);

    // Generar el hash de la contraseña
    $contrasena = password_hash($contrasena_plana, PASSWORD_BCRYPT);
    
    // Otros campos
    $tipo = 'usuario';
    $fecha_registro = date('Y-m-d H:i:s');
    $estado = 'activo';

    try {
        $sql = "INSERT INTO usuario (nombre, correo, contrasena, tipo, telefono, fecha_registro, estado)
                VALUES (:nombre, :correo, :contrasena, :tipo, :telefono, :fecha_registro, :estado)";
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena); // Guardar el hash
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        $stmt->bindParam(':estado', $estado);

        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.<br>";
        } else {
            echo "Error al registrar el usuario.<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
