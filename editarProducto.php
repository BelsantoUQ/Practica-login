<?php
    include 'conexion.php';
    $conn = OpenCon();
    $searchProductName = filter_input(INPUT_GET, 'nombre');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Editar <?php echo $searchProductName; ?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.html">INICIO</a>
                </li>
                <li>
                    <a href="productos.php">PRODUCTOS</a>
                </li>
                <li class="close">
                    <a href="cerrar.php">SALIR</a>
                </li>
            </ul>
        </nav>
        <?php session_start(); ?>
    </header>
<?php

// Realizar la consulta SQL para obtener los datos del producto por nombre
$query = "SELECT * FROM `producto` WHERE `pnombre` = '$searchProductName'";
$result = mysqli_query($conn, $query);

// Verificar si se encontraron resultados
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Obtener los datos del producto
        $producto = mysqli_fetch_assoc($result);

        // Mostrar el formulario de edición con los datos del producto
        echo "<h2>Editar Producto:</h2>";
        echo "<form action='actualizarProducto.php' method='post'>
                <label for='productName'>Nombre:</label>
                <input type='text' id='productName' name='productName' value='{$producto['pnombre']}' required /><br><br>

                <label for='productSummary'>Descripcion:</label>
                <textarea id='productSummary' name='productSummary' required>{$producto['pdescripcion']}</textarea><br><br>

                <label for='unitValue'>Valor Unitario:</label>
                <input type='number' id='unitValue' name='unitValue' value='{$producto['pprecio']}' required /><br><br>

                <label for='productType'>Tipo de Producto:</label>
                <select id='productType' name='productType' required>
                    <option value='1' " . ($producto['ptipo'] == 1 ? 'selected' : '') . ">Lácteo</option>
                    <option value='2' " . ($producto['ptipo'] == 2 ? 'selected' : '') . ">Cárnico</option>
                    <option value='3' " . ($producto['ptipo'] == 3 ? 'selected' : '') . ">Bebida</option>
                    <option value='4' " . ($producto['ptipo'] == 4 ? 'selected' : '') . ">Aseo</option>
                    <option value='5' " . ($producto['ptipo'] == 5 ? 'selected' : '') . ">Otro</option>
                </select><br><br>

                <label for='quantity'>Cantidad a Ingresar:</label>
                <input type='number' id='quantity' name='quantity' min='1' max='100' value='{$producto['pcantidad']}' required /><br><br>

                <input type='hidden' name='originalProductName' value='$searchProductName'>
                <input type='submit' class='edit' value='Actualizar'>
            </form>";
    } else {
        echo "<p>No se encontró el producto con el nombre: $searchProductName</p>";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

CloseCon($conn);
?>
    </body>
</html>