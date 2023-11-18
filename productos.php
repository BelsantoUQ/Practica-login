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
        <p style="font-size: 1.3em;border: 1px solid whitesmoke;width: 70%;height: 20%;background-color: rgb(0 0 0 / 26%);border-radius: 15px;text-align: center;padding-top: 5%;box-shadow: rgb(67 120 167 / 40%) -5px 5px, rgb(50 131 157 / 30%) -10px 10px, rgb(53 127 179 / 20%) -15px 15px, rgb(171 58 130 / 10%) -20px 20px, rgb(69 46 240 / 5%) -25px 25px;">
            CRUD de Productos
            <br>
            <span style="display: flex; justify-content: center;">
                <a href="productosAdd.php" style="margin: 20px 40px;">
                    AGREGAR
                </a>
                <a href="productosSearch.php" style="margin: 20px 40px;">
                    BUSCAR
                </a>
                <a href="productosEdit.php" style="margin: 20px 40px;">
                    EDITAR
                </a>
                <a href="productosDelete.php" style="margin: 20px 40px;">
                    ELIMINAR
                </a>
            </span>
        </p>


</body>
</html>
