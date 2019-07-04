<?php
    $error = "";
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
        $QUsuario = $conexion->query("select persona.idPersona, persona.nombre, persona.nickname, persona.activo, carrera.nombre as carrera from persona, carrera where idPersona in (select idPersona  from usuario where username like \"$email\" and passwd like md5(\"$password\") and carrera.idCarrera = persona.idCarrera);");

        if($RUsuario = $QUsuario->fetch_assoc()) {      //Si el usuario existe, se obtiene su informacion
            if($RUsuario["activo"] == true) {                       //Verificamos si la persona esta activa en la organizacion
                //Variables de sesion
                $_SESSION["sessionUsername"] = $email;                  
                $_SESSION["sessionIdPersona"] = $RUsuario["idPersona"];    
                $_SESSION["sessionNombre"] = $RUsuario["nombre"];
                $_SESSION["sessionNickname"] = $RUsuario["nickname"];
                $_SESSION["sessionCarrera"] = $RUsuario["carrera"];

                $QLudi = $conexion->query("select tipo.nombre as tipo, comision.nombre as comision from ludi, persona, tipo, ludi_tipo, comision where idPersona = ".$_SESSION["sessionIdPersona"]." = ludi.idLudi = ludi_tipo.idLudi and ludi_tipo.idTipo = tipo.idTipo and ludi.idComision = comision.idComision;");     //Verificar si la persona es un ludi
                $tipo = "";
                while($RLudi = $QLudi->fetch_assoc()) {
                    $tipo = $tipo.$RLudi["tipo"]." - ";
                    $_SESSION["sessionComision"] = $RLudi["comision"];
                }
                if(!empty($tipo)) { //El usuario que ingreso es un Ludi
                    $_SESSION["sessionTipo"] = $tipo;
                    header("Location: ?page=1");
                } else              //El usuario que ingreso es un aspirante
                    header("Location: ?page=1");
            } else 
                $error = "El usuario no esta activo";
            $QLudi->free();
        } else      
            $error = "username ó password incorrecto";  //Error

        $QUsuario->free();
        $conexion->close();
    }
 ?>