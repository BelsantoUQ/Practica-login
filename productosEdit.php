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
                    <h1 class="tittle user">'.' '.$name.'</h1>
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
        <h1>Editar producto del inventario</h1>
        <form id="productForm"  action="agregarProducto.php" method="post">

            <label for="searchProductName">Editar Producto por Nombre:</label>
            <input type="text" id="searchProductName" name="searchProductName" required/>

            <input type="button" class="edit" value="Editar Producto" onclick="editarProducto()">

        </form>
    </div>
    <script>
        function editarProducto() {
            // Obtener el valor del campo de búsqueda
            var searchProductName = document.getElementById("searchProductName").value;

            // Verificar si el campo está vacío
            if (searchProductName == "") {
                // Hacer un alert u otra lógica para manejar el caso de campo vacío
                alert("Por favor, ingresa un nombre de producto.");
            } else {
                // Redirigir a una página de edición con el nombre del producto como parámetro
                window.location.href = "editarProducto.php?nombre=" + searchProductName;
            }
        }
    </script>

</body>
</html>
