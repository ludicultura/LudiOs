<?php
    if(isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])) { //Verifica si el username y el password fueron ingresados
        //Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "Bambucha_24", "ludios");

        //Verificar conexion
        if($conexion->connect_errno) {
            $conexion = new mysqli("opalo.studio", "opalostu_user", ".Pinshicontra", "opalostu_LudiOs");
            if($conexion->connect_errno)
                echo "No se conecto a la base de datos";
        }

        //Escapar del SQL Injection
        $email = $conexion->real_escape_string($_POST["loginEmail"]);
        $password = $conexion->real_escape_string($_POST["loginPassword"]);

        //Verificar la cuenta de usuario
        //$QUsuario = $conexion->query("select persona.idPersona, persona.nombre, persona.nickname, persona.activo, carrera.nombre as carrera from persona, carrera where idPersona in (select idPersona  from usuario where username like \"$email\" and passwd like \"$password\" and carrera.idCarrera = persona.idCarrera);");
        $QUsuario = $conexion->query("select persona.idPersona, persona.nombre, persona.nickname, persona.activo, carrera.nombre as carrera from persona, carrera where idPersona in (select idPersona  from usuario where username like \"$email\" and passwd like md5(\"$password\") and carrera.idCarrera = persona.idCarrera);");

        if($RUsuario = $QUsuario->fetch_assoc()) {      //Si el usuario existe, se obtiene su informacion
            if($RUsuario["activo"] == true) {           //Verificamos si la persona esta activa en la organizacion
                //Variables de sesion
                session_start();
                $_SESSION["sessionUsername"] = $email;                  
                $_SESSION["sessionIdPersona"] = $RUsuario["idPersona"];    
                $_SESSION["sessionNombre"] = $RUsuario["nombre"];
                $_SESSION["sessionNickname"] = $RUsuario["nickname"];
                $_SESSION["sessionCarrera"] = $RUsuario["carrera"];

                $QLudi = $conexion->query("select tipo.nombre as tipo, comision.nombre as comision from ludi_tipo, tipo, comision, ludi where ludi_tipo.idLudi = ".$_SESSION["sessionIdPersona"]." and ludi.idLudi = ludi_tipo.idLudi and tipo.idTipo = ludi_tipo.idTipo and comision.idComision = ludi.idComision;");     //Verificar si la persona es un ludi
                $tipo = "";
                while($RLudi = $QLudi->fetch_assoc()) {
                    $tipo = $tipo.$RLudi["tipo"]." - ";
                    $_SESSION["sessionComision"] = $RLudi["comision"];
                }
                $_SESSION["sessionTipo"] = $tipo;
                echo "1";
            } else 
                echo "El usuario no esta activo";
            $QLudi->free();
        } else      
            echo "username ó password incorrecto";  //Error

        $QUsuario->free();
        $conexion->close();
    }
 ?>