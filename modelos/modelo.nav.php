<?php
    //Mostrar u ocultar la barra de tareas dependiendo si hay o no una sesion iniciada
    $display = "none";
    if(isset($_SESSION["sessionNombre"])) {
        $display = "flex";
    }
 ?>