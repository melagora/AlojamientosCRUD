<?php
// Incluir la configuración de la base de datos
include '../config.php';
session_start(); // Inicia la sesión

// Verificar si el usuario es administrador
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

// Crear una instancia de la clase Database
$database = new Database();
$conn = $database->getConnection();

// Inicializar la variable de alojamientos
$alojamientos = [];

try {
    // Realizar la consulta a la base de datos
    $query = $conn->query("SELECT * FROM alojamiento");
    $alojamientos = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Manejar la adición de un nuevo alojamiento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAdmin) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen']; // Asegúrate de manejar la carga de imágenes correctamente

    // Insertar el nuevo alojamiento en la base de datos
    $stmt = $conn->prepare("INSERT INTO alojamiento (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $descripcion, $precio, $imagen])) {
        echo "<div class='alert alert-success'>Alojamiento agregado exitosamente.</div>";
        // Redirigir o actualizar la lista de alojamientos
        header("Location: alojamientos.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error al agregar el alojamiento.</div>";
    }
}
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
            background-image: url('../assets/images/hero.jpg');
            background-size: cover;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .card-img-top {
            height: 200px; /* Ajusta la altura */
            object-fit: cover;
        }
    </style>
</head>
<body>

<?php include '../includes/header.php'; ?>

<!-- Imagen Hero -->
<header class="hero">
    <div>
        <h1>Alojamientos</h1>
        <p>Encuentra el lugar perfecto para tu estancia</p>
    </div>
</header>

<!-- Sección de Alojamientos -->
<section class="container my-5">
    <div class="row">
        <?php foreach ($alojamientos as $alojamiento): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $alojamiento['imagen']; ?>" class="card-img-top" alt="<?php echo $alojamiento['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $alojamiento['nombre']; ?></h5>
                        <p class="card-text"><?php echo $alojamiento['descripcion']; ?></p>
                        <p class="card-text"><strong>Precio por noche:</strong> $<?php echo $alojamiento['precio']; ?></p>
                        <a href="#" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Formulario para agregar alojamientos (solo visible para administradores) -->
<?php if ($isAdmin): ?>
<section class="container my-5">
    <h2>Agregar Nuevo Alojamiento</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio por noche</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Alojamiento</button>
    </form>
</section>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>