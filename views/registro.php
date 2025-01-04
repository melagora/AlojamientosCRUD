<?php
session_start();
include '../config.php';

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['user_id'])) {
    header("Location: ../views/cuenta_usuario.php"); // Redirigir si ya está autenticado
    exit();
}

// Manejar el registro de nuevos usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Hash de la contraseña
    $tipo = 'usuario'; // Tipo de usuario por defecto

    // Crear una instancia de la clase Database
    $database = new Database();
    $conn = $database->getConnection();

    // Insertar el nuevo usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO users (nombre, correo, contrasena, tipo) VALUES (?, ?, ?, ?)");
    
    if ($stmt->execute([$nombre, $correo, $contrasena, $tipo])) {
        $_SESSION['user_id'] = $conn->lastInsertId(); // Guardar el ID del nuevo usuario en la sesión
        $_SESSION['user_role'] = $tipo; // Guardar el tipo de usuario en la sesión
        header("Location: ../views/cuenta_usuario.php"); // Redirigir a la cuenta de usuario
        exit();
    } else {
        $error = "Error al registrar el usuario. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <h1>Registro de Usuario</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="registro.php">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
