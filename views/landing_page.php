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
</head>
<body>
    <header class="bg-primary text-white text-center py-5">
        <h1>Alojamientos Disponibles</h1>
        <p>Encuentra el lugar perfecto para tu estancia</p>
    </header>

    <div class="container my-5">
        <div class="row">
            <?php while ($row = $alojamientos->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['nombre']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['descripcion']); ?></p>
                            <p class="card-text"><strong>Precio: </strong>$<?= htmlspecialchars(number_format($row['precio'], 2)); ?></p>
                            <a href="#" class="btn btn-primary">Reservar</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="bg-light text-center py-3">
        <p>&copy; <?= date("Y"); ?> Alojamientos. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>