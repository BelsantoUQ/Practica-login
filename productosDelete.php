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
                <div>
                    <h1  class="tittle user">'.' '.$name.'</h1>
                </div>
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
        <h1>Borrar productos del inventario</h1>
        <form id="productForm" method="post">

            <label for="idProductoEliminar">ID del Producto a Eliminar:</label>
            <input type="number" id="idProductoEliminar" name="idProductoEliminar" min="1" required/><br><br>

            <input type="button" class="delete" value="Eliminar Producto" onclick="eliminarProducto()">

        </form>
    </div>
    <script>
        function eliminarProducto() {
            // Obtener el valor del campo de eliminación
            var idProductoEliminar = document.getElementById("idProductoEliminar").value;

            // Verificar si el campo está vacío
            if (idProductoEliminar == "") {
                // Hacer un alert de llenar los datos (puedes agregar tu lógica aquí)
                alert("Por favor, completa el campo de ID del producto.");
            } else {
                // Redirigir a una página de eliminación con el ID del producto como parámetro
                window.location.href = "eliminarProducto.php?id=" + idProductoEliminar;
            }
        }
    </script>

</body>
</html>
