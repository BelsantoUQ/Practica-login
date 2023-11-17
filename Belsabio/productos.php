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
    <?php
        session_start();
        $name = "USUARIO";
        $cedula = "";

        if (isset($_SESSION['openSesion'])) {

            if(($_SESSION['openSesion'])>=1){

            $name = $_SESSION ["user"];
            $isClose = $_SESSION ["openSesion"];

            echo'
                <div>
                    <h1  href="">'.' '.$name.'</h1>
                </div>
            ';
            }else{
                echo"<script type=\"text/javascript\">alert('La sesion se ha cerrado'); window.location='index.html';</script>";
            }
        }else{
            echo"<script type=\"text/javascript\">alert('No tiene permisos para acceder, logueese o contacte con el administrados'); window.location='login.php';</script>";
        }

    ?>

    <div><h1 class="tittle"> Universidad del Quindío</h1></div>
    <div class="container">
        <h1>Agregar productos al inventario</h1>
        <form id="productForm"  action="agregarProducto.php" method="post">

            <label for="productName">Nombre:</label>
            <input type="text" id="productName" name="productName" required /><br><br>

            <label for="productSummary">Descripcion:</label>
            <textarea type="text" id="productSummary" name="productSummary" required ></textarea><br><br>

            <label for="unitValue">Valor Unitario:</label>
            <input type="number" id="unitValue" name="unitValue" required /><br><br>

            <label for="productType">Tipo de Producto:</label>
            <select id="productType" name="productType" required>
                <option value="">Seleccionar</option>
                <option value="1">Lácteo</option>
                <option value="2">Cárnico</option>
                <option value="3">Bebida</option>
                <option value="4">Aseo</option>
                <option value="5">Otro</option>
            </select><br><br>

            <label for="quantity">Cantidad a Ingresar:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="100" required /><br><br>

            <input type="submit" class="add" value="Enviar">
            <input type="button" class="search" value="Buscar">
            <input type="button" class="edit" value="Editar">
            <input type="button" class="delete" value="Eliminar">
        </form>
    </div>

</body>
</html>
