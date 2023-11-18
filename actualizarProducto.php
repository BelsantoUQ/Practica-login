<?php
include 'conexion.php';
$conn = OpenCon();

// Obtener los datos del formulario de edición
$productName = filter_input(INPUT_POST, 'productName');
$productSummary = filter_input(INPUT_POST, 'productSummary');
$unitValue = filter_input(INPUT_POST, 'unitValue');
$productType = filter_input(INPUT_POST, 'productType');
$quantity = filter_input(INPUT_POST, 'quantity');
$originalProductName = filter_input(INPUT_POST, 'originalProductName');

// Verificar que todos los datos están presentes
if ($productName !== null && $productSummary !== null && $unitValue !== null && $productType !== null && $quantity !== null && $originalProductName !== null) {

    // Actualizar el producto en la base de datos
    $updateQuery = "UPDATE `producto` SET 
                    `pnombre` = '$productName', 
                    `pdescripcion` = '$productSummary', 
                    `pprecio` = '$unitValue', 
                    `ptipo` = '$productType', 
                    `pcantidad` = '$quantity' 
                    WHERE `pnombre` = '$originalProductName'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "<script type=\"text/javascript\">alert('Producto actualizado correctamente'); window.location='productos.php';</script>";
    } else {
        $errorMessage = "Error en la consulta de actualización: " . mysqli_error($conn);
        echo "<script type=\"text/javascript\">alert('Error al actualizar el producto - $errorMessage');</script>";
    }

} else {
    echo "<script type=\"text/javascript\">alert('Todos los campos son obligatorios'); window.location='productos.php';</script>";
}

CloseCon($conn);
?>
