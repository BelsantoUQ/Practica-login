<!DOCTYPE html>
<html>
    <head>
        <meta charset= "UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Formulario de Producto</title>
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
    <section>
    <?php
        $name = "USUARIO";
        $cedula = "";

        if (isset($_SESSION['openSesion'])) {

            if(($_SESSION['openSesion'])>=1){

            $name = $_SESSION ["user"];
            $isClose = $_SESSION ["openSesion"];

            echo'
                    <h1  class="tittle user">'.' '.$name.'</h1>
            ';
            }else{
                echo"<script type=\"text/javascript\">alert('La sesion se ha cerrado'); window.location='index.html';</script>";
            }
        }else{
            echo"<script type=\"text/javascript\">alert('No tiene permisos para acceder, logueese o contacte con el administrados'); window.location='login.php';</script>";
        }

    ?>

    <h1 class="tittle"> Universidad del Quindío</h1></section>
    <div class="container">
        <h1>Buscar producto en inventario</h1>
        <form id="productForm" method="post">

            <label for="searchProductName">Buscar Producto por Nombre:</label>
            <input type="text" id="searchProductName" name="searchProductName" />

            <input type="button" class="search" value="Buscar Producto" onclick="buscarProducto()">
        </form>
    </div>
    <script>
        function buscarProducto() {
            // Obtener el valor del campo de búsqueda
            var searchProductName = document.getElementById("searchProductName").value;

            // Redirigir a una página de búsqueda con el nombre del producto como parámetro
            window.location.href = "buscarProducto.php?nombre=" + searchProductName;
        }
    </script>

</body>
</html>
