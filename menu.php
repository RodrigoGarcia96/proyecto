<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    text-align: center;
    margin-top: 50px;
    color: #333;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    text-decoration: none;
    color: #333;
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #007bff;
    color: #fff;
}

    </style>
</head>
<body>
    <h1>Menú Principal</h1>
    <ul>
        <li><a href="agregar_producto.php">Agregar Producto</a></li>
        <li><a href="consultar_productos.php">Consultar Productos</a></li>
        <li><a href="vender_productos.php">Vender Productos</a></li>
    </ul>
</body>
</html>
