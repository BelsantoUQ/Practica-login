<!DOCTYPE html>
<html>
    <head>
        <meta charset= "UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> INICIO PRUEBAS </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="cssInicio/estilosRegistro.css">
        <link rel="stylesheet" href="cssInicio/estilos.css">
    </head>

<header>
    <nav>

    </nav>
    <?php session_start(); ?>
</header>
<body style="
    background-image: linear-gradient(to bottom,rgb(0 255 149 / 50%),rgba(0, 0, 255, 0.5)), url(https://www.uniquindio.edu.co/programas/publicaciones/271/ingenieria-de-sistemas-y-computacion/info/uniquindio/media/pub271.jpg);
    height: 100vh;
    overflow: hidden;
    
">

    <form  class="formulario" action="validar.php" method="post">
        <h1 class="formulario__titulo">Iniciar Sesion</h1>

        <input name="loginCedula" id="loginCedula" class="formulario__input" required="" />
        <label  class="formulario__label">Cédula</label>

        <input name="loginPass" id="loginPass" type="password" class="formulario__input" required="" />
        <label  class="formulario__label">Contraseña</label>

        <input  type="submit" class="formulario__submit" value="Ingresar" />

        <br>
        <br>

    </form>

    <script src=javascript/form.js></script>

    <footer>
    <div class="contenedor">
        <p class="copy">Redes &copy; 2023 - Santiago, Sergio</p>
        <div class="sociales">
            <a class="" href="https://github.com/BelsantoUQ">Github Repo</a>
        </div>
    </div>
    </footer>
</body>
</html>