<?php

// Iniciar sesión
session_start();
require_once '../config.php'; // conectando a BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Conexión a la base de datos
    $database = new Database();
    $conn = $database->getConnection();

    // Consulta para verificar el usuario
    $query = "SELECT * FROM Usuario WHERE correo = :correo";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: landing_page.php"); // Redirigir a la página de inicio o dashboard
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

INSERT INTO Usuario (nombre, correo, contrasena, tipo)
VALUES ('Luis Tobar', 'usuario@example.com', '12345','Luis Tobar');