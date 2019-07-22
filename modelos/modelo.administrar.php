<?php
    session_start();

    //Conectar con la base de datos
    $conexion = new mysqli("opalo.studio", "opalostu_user", ".Pinshicontra", "opalostu_LudiOs");
    
    //Verificar conexion
    if($conexion->connect_errno) {
        $conexion = new mysqli("localhost", "root", "Bambucha_24", "ludibd");
        if($conexion->connect_errno)
            $salida = "0";
    }

    //Verificar si hay una sesion iniciada
    if(isset($_POST["verificar"])) {
        if(isset($_SESSION["sessionNombre"]))
            $salida = "1";
        else
            $salida = "0";
    } else if(isset($_POST["consultaUniversidades"])) { //Consultar todas las universidades
        //Realizar consulta
        $Query = $conexion->query("select nombre from universidad;");
        $salida = "";
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",";
    } else if(isset($_POST["consultaComisiones"])) {    //Consultar comisiones
        //Realizar consulta
        $Query = $conexion->query("select nombre from comision;");
        $salida = "";
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",";
    } else if(isset($_POST["consultaFunciones"])) {    //Consultar funciones
        //Realizar consulta
        $Query = $conexion->query("select nombre from tipo;");
        $salida = "";
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",";
    } else if(isset($_POST["consultaFacultades"])) {   //Consultar facultades por universidad
        $universidad = $_POST["consultaFacultades"];
        $Query = $conexion->query("select facultad.nombre from facultad, universidad where universidad.nombre like \"$universidad\" and facultad.idUniversidad = universidad.idUniversidad;");
        $salida = "";
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",";
    } else if(isset($_POST["consultaCarreras"])) {   //Consultar carreras por facultad
        $facultad = $_POST["consultaCarreras"];
        $Query = $conexion->query("select carrera.nombre from carrera, facultad where facultad.nombre like \"$facultad\" and carrera.idFacultad = facultad.idFacultad;");
        $salida = "";
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",";
    } else if(isset($_POST["insertar"])) {
        //Leer datos recibidos
        $nombre = $_POST["nombre"];
        $nickname = $_POST["nickname"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $semestre = $_POST["semestre"];
        $universidad = $_POST["universidad"];
        $facultad = $_POST["facultad"];
        $carrera = $_POST["carrera"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $tipos = explode("-", $_POST["tipos"]);
        array_pop($tipos);

        //Quitar el SQL Injection
        $nombre = $conexion->real_escape_string($nombre);
        $nickname = $conexion->real_escape_string($nickname);
        $telefono = $conexion->real_escape_string($telefono);
        $correo = $conexion->real_escape_string($correo);
        $username = $conexion->real_escape_string($username);
        $password = $conexion->real_escape_string($password);
error_reporting(E_ALL);
ini_set('display_errors', '1');
        //Insertar en la tabla persona
        $conexion->query("insert into persona (nombre, nickname, idCarrera, semestre, correo, telefono) select \"$nombre\", \"$nickname\", carrera.idCarrera, $semestre, \"$correo\", \"$telefono\" from carrera, facultad, universidad where carrera.idFacultad = facultad.idFacultad and facultad.idUniversidad = universidad.idUniversidad and facultad.nombre like \"$facultad\" and universidad.nombre like\"$universidad\";");
        //Insertar en la tabla usuario
        $conexion->query("insert into usuario (username, passwd, idPersona) select \"$username\", md5(\"password\"), idPersona from persona where correo like \"$correo\";");
        
        if(isset($_POST["comision"])) { //Si la comision esta definida entonces es un Ludi
            $comision = $_POST["comision"];
            $fecha = $_POST["fecha"];
            $personalidad = $_POST["personalidad"];
            
            //Quitar el SQL Injection
            $personalidad = $conexion->real_escape_string($personalidad);

            //Insertar en la tabla Ludi
            $conexion->query("insert into ludi (idLudi, idComision, fecha_ingreso, personalidad) select idPersona, idComision, \"$fecha\", \"$personalidad\" from persona, comision where comision.nombre like \"$comision\" and persona.correo like \"$correo\";");
        }
        $salida = "El registro se realizo correctamente";
    }

    if(isset($Query))
        $Query->close();
    if(isset($salida))
        echo $salida;
    $conexion->close();
 ?>