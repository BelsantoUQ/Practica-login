
<?php

   function OpenCon()
   {
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "12345";
      $db = "redes_productos";
      //creo la conexion con la base de datos
      $conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);
      return $conexion;
   }

   function CloseCon($conexion)
   {
      $conexion -> close();
   }

?>