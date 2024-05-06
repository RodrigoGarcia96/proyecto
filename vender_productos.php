<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Productos</title>
    <style>
        /* Estilos para el modal */
        .modal {
            display: none; /* Ocultar el modal por defecto */
            position: fixed; /* Posición fija */
            z-index: 1; /* Por encima de todo */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Catálogo de Productos</h1>
    <div style="display: flex; flex-wrap: wrap;">
        <?php
        include 'config.php';
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div style="border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px;">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen']); ?>" width="100" /><br>
                    <strong><?php echo $row['producto']; ?></strong><br>
                    <?php echo $row['descripcion']; ?><br>
                    Precio: $<?php echo number_format($row['precio'], 2); ?><br>
                    <button onclick="mostrarModal()">Comprar</button>
                </div>
                <?php
            }
        } else {
            echo "No hay productos disponibles";
        }
        ?>
    </div>

    <!-- Modal de confirmación de compra -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <h2>Confirmar Compra</h2>
            <p>¿Estás seguro de que deseas comprar este producto?</p>
            <button onclick="comprarProducto()">Sí, Comprar</button>
            <button onclick="cerrarModal()">Cancelar</button>
        </div>
    </div>

    <script>
        // Función para mostrar el modal
        function mostrarModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        // Función para confirmar la compra (puedes personalizarla según tus necesidades)
        function comprarProducto() {
            alert('Compra realizada');
            cerrarModal();
        }
    </script>
</body>
</html>
