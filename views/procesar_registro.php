<?php
// Incluir archivo de configuración para la conexión
require_once '../config.php';

// Iniciar la sesión
session_start();

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos enviados desde el formulario
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $contrasena = trim($_POST['password']); // Cambiar "contrasena" a "password" para coincidir con el formulario

    // Otros datos a insertar en la base de datos
    $tipo = 'usuario';
    $fecha_registro = date('Y-m-d H:i:s');
    $estado = 'activo';

    try {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuario (nombre, correo, contrasena, tipo, telefono, fecha_registro, estado)
                VALUES (:nombre, :correo, :contrasena, :tipo, :telefono, :fecha_registro, :estado)";
        
        $stmt = $pdo->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena); // Contraseña sin hash
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        $stmt->bindParam(':estado', $estado);

        // Ejecutar y comprobar si se insertó correctamente
        if ($stmt->execute()) {
            // Establecer variables de sesión
            $_SESSION['usuario_id'] = $pdo->lastInsertId();
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['estado'] = $estado;

            // Mostrar mensaje y redirigir automáticamente
            echo "<script>
                    alert('Registro exitoso. Bienvenido, " . htmlspecialchars($nombre) . "!');
                    window.location.href = '../index.php';
                  </script>";
            exit;
        } else {
            echo "Error al registrar el usuario.<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
