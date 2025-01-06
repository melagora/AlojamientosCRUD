<?php
// Incluir la configuración de conexión a la base de datos
// require_once 'config.php';

// Verificar si el formulario ha sido enviado
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Obtener los datos del formulario
//     $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
//     $contrasena = isset($_POST['password']) ? trim($_POST['password']) : '';

//     // Validar que los campos no estén vacíos
//     if (!empty($correo) && !empty($contrasena)) {
//         // Validar formato del correo
//         if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
//             echo "El correo no tiene un formato válido.";
//             exit();
//         }

//         // Preparar la consulta para obtener el usuario por correo
//         $sql = "SELECT id, nombre, correo, contrasena FROM usuarios WHERE correo = ?";

//         if ($stmt = $conn->prepare($sql)) {
//             // Vincular parámetros
//             $stmt->bind_param("s", $correo);

//             // Ejecutar la consulta
//             $stmt->execute();

//             // Obtener el resultado
//             $resultado = $stmt->get_result();

//             // Verificar si se encontró el usuario
//             if ($resultado->num_rows === 1) {
//                 // Obtener los datos del usuario
//                 $usuario = $resultado->fetch_assoc();

//                 // Verificar la contraseña
//                 if (password_verify($contrasena, $usuario['contrasena'])) {
//                     // Iniciar sesión y redirigir al usuario
//                     session_start();
//                     $_SESSION['id'] = $usuario['id'];
//                     $_SESSION['nombre'] = $usuario['nombre'];
//                     $_SESSION['correo'] = $usuario['correo'];

//                     // Redirigir a una página de inicio (dashboard)
//                     header("Location: dashboard.php");
//                     exit();
//                 } else {
//                     echo "Contraseña incorrecta.";
//                 }
//             } else {
//                 echo "No se encontró una cuenta asociada a este correo.";
//             }

//             // Cerrar el statement
//             $stmt->close();
//         } else {
//             echo "Error al preparar la consulta: " . $conn->error;
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
            <form action="login.php" method="POST">
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

                <button type="submit" class="btn fw-bold">Verifica mis datos</button>
                <p class="mt-3 text-center ">
                    ¿Aún no tienes cuenta? <a href="registro.php" class="text-primary">Regístrate</a>
                </p>
            </form>
        </div>
        <div class="login-image">
            <p class="welcome-login negrita"><mark>¡Bienvenido de nuevo!</mark><p>
            <p class="negrita"><mark>Hola explorador de playas.</mark></p>
            <p class="negrita"><mark>¡Inicia sesión y revisa favoritos para tus próximas vacaciones!</mark></p>
            <div class="social-buttons">
            <a href="registro.php" class="btn fw-bold">¿Aún no te has registrado?</a>
                <!-- <button class="btn btn-info w-100">Twitter</button> -->
            </div>
        </div>
    </div>
    <div class="floating-home-button" onclick="window.location.href='#Enlcace a la página de inicio'">
        <i class="bi bi-house-door-fill"></i>
        <span class="tooltip">Volver al inicio</span>
    </div>
</body>

</html>