<?php
// Incluir la configuración de conexión a la base de datos
// require_once 'config.php';

// Verificar si la conexión es válida
// if (!$conn) {
//     die("Error de conexión a la base de datos.");
// }

// Verificar si el formulario ha sido enviado
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Obtener los datos del formulario
//     $nombre = isset($_POST['username']) ? trim($_POST['username']) : '';
//     $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
//     $contrasena = isset($_POST['password']) ? trim($_POST['password']) : '';

//     // Validar que los campos no estén vacíos
//     if (!empty($nombre) && !empty($correo) && !empty($contrasena)) {
//         // Validar formato del correo
//         if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
//             echo "El correo no tiene un formato válido.";
//             exit();
//         }

//         // Hash de la contraseña para mayor seguridad
//         $contrasenaHash = password_hash($contrasena, PASSWORD_BCRYPT);

//         // Tipo predeterminado de usuario
//         $tipo = 'usuario';

//         // Preparar la consulta SQL para insertar los datos
//         $sql = "INSERT INTO usuarios (nombre, correo, contrasena, tipo) VALUES (?, ?, ?, ?)";

//         // Preparar la consulta utilizando prepared statements para prevenir inyecciones SQL
//         if ($stmt = $conn->prepare($sql)) {
//             // Vincular los parámetros
//             $stmt->bind_param("ssss", $nombre, $correo, $contrasenaHash, $tipo);

//             // Ejecutar la consulta
//             if ($stmt->execute()) {
//                 // Redirigir al usuario con un mensaje de éxito
//                 header("Location: registro_exitoso.php");
//                 exit();
//             } else {
//                 error_log("Error al ejecutar la consulta: " . $stmt->error);
//                 echo "Error al guardar los datos.";
//             }

//             // Cerrar el statement
//             $stmt->close();
//         } else {
//             error_log("Error al preparar la consulta: " . $conn->error);
//             echo "No se pudo procesar tu solicitud.";
//         }
//     } else {
//         echo "Por favor, complete todos los campos.";
//     }

//     // Cerrar la conexión
//     $conn->close();
// }
?>

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
                <!-- <button class="btn btn-info w-100">Twitter</button> -->
            </div>
        </div>
        <div class="register-form">
            <h1>Registro de datos</h1>
            <form action="resgistro.php" method="POST">
                <div class="mb-2">
                    <label for="username" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Correo Electronico:</label>
                    <input type="text" class="form-control" id="mail" name="email" required>
                </div>

                <div class="mb-2 position-relative">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span
                        class="position-absolute top-50 end-0 translate-middle-y me-3 d-flex align-items-center pt-4 mt-1"
                        onclick="togglePasswordVisibility()">
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
                <p class="mt-3 text-center ">
                    ¿Ya tienes cuenta? <a href="login.php" class="text-primary">Inicia Sesión</a>
                </p>
            </form>
        </div>
    </div>
    <div class="floating-home-button" onclick="window.location.href='#Enlcace a la página de inicio'">
        <i class="bi bi-house-door-fill"></i>
        <span class="tooltip">Volver al inicio</span>
    </div>
</body>

</html>