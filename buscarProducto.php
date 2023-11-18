<?php
include 'conexion.php';
$conn = OpenCon();

$searchProductName = filter_input(INPUT_GET, 'nombre');

// Realizar la consulta SQL para buscar el producto por nombre
$query = "SELECT * FROM `producto` WHERE `pnombre` LIKE '%$searchProductName%'";
$result = mysqli_query($conn, $query);

// Verificar si se encontraron resultados
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los resultados en una tabla, por ejemplo
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Valor Unitario</th>
                    <th>Tipo de Producto</th>
                    <th>Cantidad</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['pcodigo']}</td>
                    <td>{$row['pnombre']}</td>
                    <td>{$row['pdescripcion']}</td>
                    <td>{$row['pprecio']}</td>
                    <td>{$row['ptipo']}</td>
                    <td>{$row['pcantidad']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados para el nombre: $searchProductName</p>";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

CloseCon($conn);
?>
