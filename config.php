<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "punto_venta";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
