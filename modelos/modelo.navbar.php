<?php
    session_start();

    //Cerrar sesion
    if(isset($_POST["cerrar"])) {
        session_destroy();
        echo "1";
    } else if(isset($_POST["verificar"])) {
        if(isset($_SESSION["sessionNombre"]))
            echo $_SESSION["sessionNombre"];
        else 
            echo "LudiOs";
    }
 ?>