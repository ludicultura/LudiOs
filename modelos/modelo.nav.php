<?php
    session_start();

    //Mostrar u ocultar la barra de tareas dependiendo si hay o no una sesion iniciada
    if(isset($_POST["verificar"])) {
        if(isset($_SESSION["sessionNombre"])) 
            echo "flex";
        else 
            echo "none";
    } else
        echo "none";
 ?>