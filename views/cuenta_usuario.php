<?php
session_start();
include '../config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php"); // Redirigir al login si no está autenticado
    exit();
}

// Crear una instancia de la clase Database
$database = new Database();
$conn = $database->getConnection();

// Obtener información del usuario
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener alojamientos seleccionados por el usuario
$stmt = $conn->prepare("SELECT * FROM reservas WHERE user_id = ?");
$stmt->execute([$user_id]);
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="container my-5">
    <h1>Bienvenido, <?php echo htmlspecialchars($user['nombre']); ?></h1>
    
    <h2>Alojamientos Seleccionados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reserva['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($reserva['descripcion']); ?></td>
                    <td>$<?php echo htmlspecialchars($reserva['precio']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
