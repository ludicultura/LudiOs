<?php
    //Verificar si hay un usuario conectado
    session_start();
    if(isset($_POST["verificar"])) {
        if(isset($_SESSION["sessionNombre"]))
            echo $_SESSION["sessionNombre"].",".$_SESSION["sessionNickname"].",".$_SESSION["sessionTipo"].",".$_SESSION["sessionComision"].",".$_SESSION["sessionCarrera"];
        else
            echo "0";
    } else
        echo "0";
 ?>