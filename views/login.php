<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body class="login-body">
    <div class="login-container">
        <div class="login-form">
            <h1>Iniciar Sesión</h1>
            <form action="procesar_login.php" method="POST">
                <div class="mb-2">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="text" class="form-control" id="email" name="correo" required>
                </div>
                <div class="mb-2 position-relative">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="contrasena" required>
                    <span
                        class="position-absolute top-50 end-0 translate-middle-y me-3 d-flex align-items-center pt-4 mt-1"
                        onclick="togglePasswordVisibility()">
                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                    </span>
                </div>
                <button type="submit" class="btn fw-bold">Verifica mis datos</button>
                <p class="mt-3 text-center">
                    ¿Aún no tienes cuenta? <a href="registro.php" class="text-primary">Regístrate</a>
                </p>
            </form>

        </div>
        <div class="login-image">
            <p class="welcome-login negrita"><mark>¡Bienvenido de nuevo!</mark>
            <p>
            <p class="negrita"><mark>Hola explorador de playas.</mark></p>
            <p class="negrita"><mark>¡Inicia sesión y revisa favoritos para tus próximas vacaciones!</mark></p>
            <div class="social-buttons">
                <a href="registro.php" class="btn fw-bold">¿Aún no te has registrado?</a>
                <!-- <button class="btn btn-info w-100">Twitter</button> -->
            </div>
        </div>
    </div>
    <div class="floating-home-button" onclick="window.location.href='index.php'">
        <i class="bi bi-house-door-fill"></i>
        <span class="tooltip">Volver al inicio</span>
    </div>
</body>

</html>