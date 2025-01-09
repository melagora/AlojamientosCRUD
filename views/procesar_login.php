<?php
// Incluir el archivo de configuración para la conexión a la base de datos
require_once '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    try {
        // Consulta SQL para obtener los datos del usuario
        $sql = "SELECT id, nombre, contrasena FROM usuario WHERE correo = :correo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comparar las contraseñas directamente
            if ($contrasena === $usuario['contrasena']) {
                // Inicio de sesión exitoso
                echo "<script>
                    alert('Inicio de sesión exitoso. ¡Bienvenido, " . htmlspecialchars($usuario['nombre']) . "!');
                    window.location.href = '../index.php'; // Cambia a la página deseada tras el login
                </script>";
            } else {
                // Contraseña incorrecta
                echo "<script>
                    alert('La contraseña es incorrecta.');
                    window.location.href = 'login.php';
                </script>";
            }
        } else {
            // Usuario no encontrado
            echo "<script>
                alert('Usuario no encontrado.');
                window.location.href = 'login.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
