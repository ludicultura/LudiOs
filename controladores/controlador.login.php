<?php
    require("modelos/conexion.php");
    require("modelos/funciones.php");

    $errores = array();     //Errores que surgen durante la ejecucion

    if($_POST["username"] && $_POST["password"]) {      //Verifica si el username y el password fueron ingresados
        //Escapar del SQL Injection
        $username = $conexion->real_escape_string($_POST["username"]);
        $password = $conexion->real_escape_string($_POST["password"]);
        
        $QUsuario = $conexion->query("select nuevo, idPersona from usuario where username like \"$username\" and passwd like md5(\"$password\")");  //Verificar la cuenta de usuario
        
        if($RUsuario = $QUsuario->fetch_array(MYSQLI_BOTH)) {   //Si el usuario existe, se obtiene su informacion
            $idPersona = $RUsuario["idPersona"];
            if($RUsuario["nuevo"] == 1)  //Si el usuario es nuevo, lo manda a una pagina para cambiar su username y password            
                header("?page=2");
            else {
                $QLudi = $conexion->query("select activo, tipo.nombre as tipo from ludi, persona, tipo, ludi_tipo where idPersona = ".$RUsuario["idPersona"]." = ludi.idLudi = ludi_tipo.idLudi and ludi_tipo.idTipo = tipo.idTipo;");     //Verificar si el usuario es un ludi
                if($RLudi = $QLudi->fetch_array(MYSQLI_ASSOC)) {    //Si el ludi existe, se obtiene su informacion
                    if($RLudi["activo"] == 1) {     //Verificamos si el ludi esta activo actualmente
                        echo "Adentro";
                        switch($RLudi["tipo"]) {    //Verificamos el tipo de ludi y lo enviamos a su vista correspondiente

                        }
                    } else
                        $errores[] = "El Ludi asociado a esta cuenta no se encuentra activo";   //Error
                } else    //Si no es ludi lo manda a la pagina de aspirantes
                    header("?page=3");

                $QLudi->free();
            }
        } else      
            $errores[] = "username ó password incorrecto";  //Error

        $QUsuario->free();
    }

    $conexion->close();
 ?>