<?php 

// vista que muestra la página de inicio

require_once '../config.php';
require_once '../controllers/AlojamientoController.php';

// Crear una instancia del controlador
$alojamientoController = new AlojamientoController();
$alojamientos = $alojamientoController->mostrarAlojamientos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            position: relative;
            background-image: url('../assets/images/hero.jpg');
            background-size: cover;
            height: 80vh; /* Ajusta la altura según lo necesites */
        }
        .logo {
            position: center;
            top: 20px; /* Ajusta la posición vertical */
            left: 20px; /* Ajusta la posición horizontal */
            max-height: 200px; /* Ajusta el tamaño máximo del logo */
            width: auto; /* Mantiene la relación de aspecto */
        }
    </style>
</head>
<body>

<?php include '../includes/header.php'; ?>

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
    Iniciar Sesión
</button>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Imagen Hero -->
<header class="hero text-white text-center py-5">
    <img src="../assets/images/El Cuche.svg" alt="Logo" class="logo img-fluid">
    <h1>Alojamientos Disponibles</h1>
    <h3>Encuentra el lugar perfecto para tu estancia</h3>
    
    <!-- Formulario de Búsqueda -->
    <form class="d-flex justify-content-center my-4">
        <input type="text" class="form-control me-2" placeholder="Hotel, ciudad..." aria-label="Buscar">
        <input type="date" class="form-control me-2" aria-label="Fechas">
        <input type="number" class="form-control me-2" placeholder="Personas" aria-label="Personas">
        <button class="btn btn-light" type="submit">Buscar</button>
    </form>
</header>

<!-- Sección de Imágenes -->
<section class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <img src="../assets/images/tienda.jpg" class="img-fluid" alt="Imagen 1">
            <h5>Tiendas de Souveniers</h5>
        </div>
        <div class="col-md-4">
            <img src="../assets/images/clase.jpg" class="img-fluid" alt="Imagen 2">
            <h5>Clases de Surf</h5>
        </div>
        <div class="col-md-4">
            <img src="../assets/images/lancha.jpg" class="img-fluid" alt="Imagen 3">
            <h5>Viaje en lancha</h5>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>