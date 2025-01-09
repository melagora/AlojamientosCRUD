<?php
$host = 'localhost'; // Cambiar por tu host
$dbname = 'alojamientosDB'; // Cambiar por tu base de datos
$username = 'root'; // Cambiar por tu usuario de base de datos
$password = '1234'; // Cambiar por tu contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
