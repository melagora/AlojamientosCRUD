<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body class="register-body">
    <div class="register-container">
        <div class="register-image">
            <p class="welcome-register negrita"><mark>¡Bienvenido!</mark></p>
            <p class="negrita"><mark>Hola, futuro explorador de playas.</mark></p>
            <p class="negrita"><mark>¡Crea tu cuenta y empieza a planear tus próximas vacaciones!</mark></p>
            <div class="social-buttons">
                <a href="login.php" class="btn fw-bold">¿Ya estás registrado?</a>
            </div>
        </div>
        <div class="register-form">
            <h1>Registro de datos</h1>
            <form id="registerForm" action="procesar_registro.php" method="POST">
                <div class="mb-2">
                    <label for="nombre" class="form-label">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-2">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-2">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="mb-2 position-relative">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3 d-flex align-items-center pt-4 mt-1" onclick="togglePasswordVisibility()">
                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                    </span>
                </div>
                <script>
                    function togglePasswordVisibility() {
                        const passwordInput = document.getElementById('password');
                        const togglePasswordIcon = document.getElementById('togglePasswordIcon');
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            togglePasswordIcon.classList.remove('bi-eye');
                            togglePasswordIcon.classList.add('bi-eye-slash');
                        } else {
                            passwordInput.type = 'password';
                            togglePasswordIcon.classList.remove('bi-eye-slash');
                            togglePasswordIcon.classList.add('bi-eye');
                        }
                    }
                </script>
                <button type="submit" class="btn fw-bold">Guardar mis datos</button>
                <p class="mt-3 text-center">¿Ya tienes cuenta? <a href="login.php" class="text-primary">Inicia Sesión</a></p>
            </form>
        </div>
    </div>
    <div class="floating-home-button" onclick="window.location.href='../index.php'">
        <i class="bi bi-house-door-fill"></i>
        <span class="tooltip">Volver al inicio</span>
    </div>
</body>
</html>
