<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];

    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

    $sql = "INSERT INTO productos (producto, descripcion, marca, precio, imagen) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdb", $producto, $descripcion, $marca, $precio, $imagen);
    $stmt->send_long_data(4, $imagen);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error al agregar el producto";
    }

    $stmt->close();
    $conn->close();
}
?>
