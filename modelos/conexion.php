<?php
    $conexion = new mysqli("localhost", "root", "Bambucha_24", "ludibd");   //Conectar con la base de datos
    
    //Verificar que no haya error en la conexion
    if(mysqli_connect_errno()) 
        echo "Error: Falló la conexión".mysqli_connect_error();
 ?>
