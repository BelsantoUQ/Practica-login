<?php
    session_start();

    // Destruir la sesión
    session_destroy();
    
    if (isset($_SESSION['openSesion'])) {
        if( $_SESSION ["openSesion"] == 1){
            $_SESSION ["openSesion"] = 0;
        }
    }
    header ('location: login.php');
?>
