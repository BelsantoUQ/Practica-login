<?php
include 'conexion.php';
$conn = OpenCon();
session_start();
//obtengo los datos de la sesion actual
$usua = filter_input(INPUT_POST, 'loginCedula');
$password = filter_input(INPUT_POST, 'loginPass');


$usuaR = mysqli_query($conn,"SELECT `user` FROM  `usuarios` WHERE `user` = '$usua' AND `password` = '$password'"); //
if (mysqli_num_rows($usuaR)>0){ // valido las ultima  consultas no sean vacias
  //inicializo en la sesion datos necesarios
  $row = mysqli_fetch_array($usuaR);
      $_SESSION ["user"] = $usua;
      $_SESSION ["openSesion"] = '1';
      header ('location: productos.php');
  }
  else{
    //si hay algun error retorna a inicio
    echo"<script type=\"text/javascript\">alert('ERROR AL LOGUEARSE'); window.location='login.php';</script>";
  }
  CloseCon($conn);
?>