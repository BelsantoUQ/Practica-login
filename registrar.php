<?php

$nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
$apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$clave = isset($_POST['Clave']) ? $_POST['Clave'] : '';
$confirmar = isset($_POST['Confirmar']) ? $_POST['Confirmar'] : '';

try{
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=prueba_db', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $sql = "SELECT * FROM usuarios WHERE Email LIKE '%".$email. "%'";
    $result = $conexion->query($sql);
    if ($result->rowCount() > 0) {
            echo json_encode('false');
    } else {
        $pdo = $conexion->prepare('INSERT INTO USUARIOS(Nombre, Apellido, Email, Contraseña, ConfContraseña) VALUES(?,?,?,?,?)');
            $pdo->bindParam(1, $nombre);
            $pdo->bindParam(2, $apellido);
            $pdo->bindParam(3, $email);
            $pdo->bindParam(4, $clave);
            $pdo->bindParam(5, $confirmar);
            $pdo->execute() or die(print($pdo->errorInfo()));

            echo json_encode('true');
    }
}catch(PDOErrorException $error){
    echo $error->getMessage();
    die();
}