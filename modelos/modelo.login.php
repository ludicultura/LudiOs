<?php
    if(isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])) { //Verifica si el username y el password fueron ingresados
        //Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "Bambucha_24", "ludibd");
        //Verificar conexion
        if($conexion->connect_errno) {
            echo "No se conecto a la base de datos";
            exit(1);
        }

        //Escapar del SQL Injection
        $email = $conexion->real_escape_string($_POST["loginEmail"]);
        $password = $conexion->real_escape_string($_POST["loginPassword"]);

        //Verificar la cuenta de usuario
        $QUsuario = $conexion->query("select idPersona, nombre, nickname, activo from persona where idPersona in (select idPersona  from usuario where username like \"$username\" and passwd like md5(\"$password\"));");

        if($RUsuario = $QUsuario->fetch_assoc()) {      //Si el usuario existe, se obtiene su informacion
            if($RUsuario["activo"] == true) {                       //Verificamos si la persona esta activa en la organizacion
                session_start();                                    //Iniciamos la sesion
                //Variables de sesion
                $_SESSION["username"] = $username;                  
                $_SESSION["idPersona"] = $RUsuario["idPersona"];    
                $_SESSION["nombre"] = $RUsuario["nombre"];
                $_SESSION["nickname"] = $RUsuario["nickname"];

                $QLudi = $conexion->query("select tipo.nombre as tipo, comision.nombre as comision from ludi, persona, tipo, ludi_tipo, comision where idPersona = ".$_SESSION["idPersona"]." = ludi.idLudi = ludi_tipo.idLudi and ludi_tipo.idTipo = tipo.idTipo and ludi.idComision = comision.idComision;");     //Verificar si la persona es un ludi
                $tipo = "";
                while($RLudi = $QLudi->fetch_assoc()) {
                    $tipo = $tipo.$RLudi["tipo"]." - ";
                    $_SESSION["comision"] = $RLudi["comision"];
                }
                $_SESSION["tipo"] = $tipo;
                header("Location: ?page=2");
            } else 
                $error = "El usuario no esta activo";
            $QLudi->free();
        } else      
            $error = "username ó password incorrecto";  //Error

        $QUsuario->free();
    }
    $conexion->close();
 ?>