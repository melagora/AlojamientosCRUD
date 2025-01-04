<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background-image: url('../assets/images/hero.jpg');
            background-size: cover;
            height: 50vh; /* Ajusta la altura según lo necesites */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .logo {
            position: center;
            top: 20px; /* Ajusta la posición vertical */
            left: 20px; /* Ajusta la posición horizontal */
            max-height: 200px; /* Ajusta el tamaño máximo del logo */
            width: auto; /* Mantiene la relación de aspecto */
        }
        .contact-info {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<?php include '../includes/header.php'; ?>


<!-- Imagen Hero -->
<header class="hero text-white text-center py-5">
    <img src="../assets/images/El Cuche.svg" alt="Logo" class="logo img-fluid">


    <div>
        <h1>Contacto</h1>
        <p>Estamos aquí para ayudarte</p>
    </div>
</header>

<!-- Sección de Información de Contacto -->
<section class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Información de Contacto</h2>
            <div class="contact-info">
                <p><strong>Teléfono:</strong> +503 3220 3015</p>
                <p><strong>Email:</strong> contacto@ElCucheBeachClub.com</p>
                <p><strong>Dirección:</strong> Calle Principal, cantón El Tunco, Bo. El Centro, Tamanique, La Libertad. El Salvador</p>
                <p><strong>Síguenos en Redes Sociales:</strong></p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">Facebook</a></li>
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">Twitter</a></li>
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Envíanos un Mensaje</h2>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
