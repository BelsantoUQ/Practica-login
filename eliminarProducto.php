<?php
include 'conexion.php';
$conn = OpenCon();

$idProductoEliminar = filter_input(INPUT_GET, 'id');

// Verificar que el ID del producto a eliminar está presente
if ($idProductoEliminar !== null) {

    // Realizar la consulta SQL para obtener la información del producto antes de eliminarlo
    $selectQuery = "SELECT * FROM `producto` WHERE `pcodigo` = $idProductoEliminar";
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult) {
        // Verificar si se encontró el producto
        if (mysqli_num_rows($selectResult) > 0) {
            // Eliminar el producto
            $deleteQuery = "DELETE FROM `producto` WHERE `pcodigo` = $idProductoEliminar";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if ($deleteResult) {
                echo "<script type=\"text/javascript\">alert('Producto eliminado correctamente'); window.location='productos.php';</script>";
            } else {
                $errorMessage = "Error en la consulta de eliminación: " . mysqli_error($conn);
                echo "<script type=\"text/javascript\">alert('Error al eliminar el producto - $errorMessage');</script>";
            }
        } else {
            echo "<script type=\"text/javascript\">alert('No se encontró el producto con el ID: $idProductoEliminar'); window.location='productos.php';</script>";
        }
    } else {
        $errorMessage = "Error en la consulta de búsqueda: " . mysqli_error($conn);
        echo "<script type=\"text/javascript\">alert('Error al buscar el producto - $errorMessage');</script>";
    }

} else {
    echo "<script type=\"text/javascript\">alert('ID del producto a eliminar no proporcionado'); window.location='productos.php';</script>";
}

CloseCon($conn);
?>
