<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include 'config.php';
session_start();

// Obtener el correo del usuario autenticado
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    // Actualizar el estado del usuario a 'inactivo'
    $sql = "UPDATE usuario SET estado = 'inactivo' WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
}

// Cerrar sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: login.php");
exit();
?>
