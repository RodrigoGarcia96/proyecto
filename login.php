<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // Inicio de sesión exitoso
        // Redirigir al usuario a la página deseada
        header("Location: menu.php");
        exit;
    } else {
        // Inicio de sesión fallido
        echo "Inicio de sesión fallido";
    }
}
?>
