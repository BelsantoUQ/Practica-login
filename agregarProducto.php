<?php
include 'conexion.php';
$conn = OpenCon();
session_start();

// Obtengo los datos de la sesión actual
$productName = filter_input(INPUT_POST, 'productName');
$productSummary = filter_input(INPUT_POST, 'productSummary');
$unitValue = filter_input(INPUT_POST, 'unitValue');
$productType = filter_input(INPUT_POST, 'productType');
$quantity = filter_input(INPUT_POST, 'quantity');
if ($productName !="" && $productSummary != "" && $unitValue && $productType !="" && $quantity !=""){


// Agregar comillas simples a los valores de cadena en las consultas SQL
$add = mysqli_query($conn, "INSERT INTO `producto` (`pnombre`, `ptipo`, `pcantidad`, `pprecio`, `pdescripcion`) VALUES ('$productName', '$productType', '$quantity', '$unitValue', '$productSummary')");

if (!$add) {
    $errorMessage = "Error en la consulta add: " . mysqli_error($conn);
    echo "<script type=\"text/javascript\">alert('ERROR AL Registrar producto - $errorMessage - Valores: productName=$productName, productSummary=$productSummary, unitValue=$unitValue, productType=$productType, quantity=$quantity');</script>";
    die($errorMessage);
}

echo "<script type=\"text/javascript\">alert('Se ha Registrado el producto'); window.location='productos.php';</script>";

CloseCon($conn);
}else{
    echo "<script type=\"text/javascript\">alert('Debe llenar todos los datos'); window.location='productos.php';</script>";
}
?>
