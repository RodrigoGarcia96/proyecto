<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["producto"]."</td>";
                echo "<td>".$row["descripcion"]."</td>";
                echo "<td>".$row["marca"]."</td>";
                echo "<td>".$row["precio"]."</td>";
                echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['imagen'])."' width='100' /></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay productos</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>