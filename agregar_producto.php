<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="procesar_agregar_producto.php" method="POST" enctype="multipart/form-data">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca"><br><br>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen"><br><br>
        
        <button type="submit">Agregar</button>
    </form>

    <h2>Productos</h2>
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
