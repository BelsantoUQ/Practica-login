<?php
    session_start();

    //aqui valido en que prueba se encuentra, si ya es la quinta lo redirijo al cuestionario 
    if( $_SESSION ["closeSesion"] == 1){
        header ('location: login.php');
    }

?>
