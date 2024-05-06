<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1, h2 {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
textarea,
input[type="number"],
button,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f1f1f1;
}

    </style>
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
