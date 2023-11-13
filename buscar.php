<?php


$conexion = new mysqli('localhost', 'root', '', 'prueba_db');

if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

// Obtener el término de búsqueda desde la solicitud POST
$Usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$Clave = isset($_POST['clave']) ? $_POST['clave'] : '';

// Realizar una consulta SQL (ajusta la consulta según tu base de datos)
$sql = "SELECT * FROM usuarios WHERE Nombre LIKE '%".$Usuario. "%' AND Contraseña LIKE '%".$Clave."%'";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo true;
    }
} else {
    echo false;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>