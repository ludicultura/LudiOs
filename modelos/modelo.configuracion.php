<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

    //Verificar si hay una sesion iniciada
    if(!isset($_SESSION["sessionNombre"]))
        header("Location: index.php");

    //Conectar con la base de datos
    $conexion = new mysqli("opalo.studio", "opalostu_user", ".Pinshicontra", "opalostu_LudiOs");
    //$conexion = new mysqli("localhost", "root", "Bambucha_24", "ludibd");
    
    //Verificar conexion
    if($conexion->connect_errno) {
        echo "No se conecto a la base de datos";
        exit(1);
    }

    echo "<script> carreras = Array();";
    $QCarrera = $conexion->query("select idCarrera, nombre from carrera;");     //Consulta de carreras
    
    $i = 0;
    while($RCarrera = $QCarrera->fetch_assoc()) {   
        echo "carreras[$i] = {idCarrera: \"".$RCarrera["idCarrera"]."\", nombre: \"".$RCarrera["nombre"]."\"};";
        $i++;
    }

    echo "comisiones = Array();";
    $QComision = $conexion->query("select idComision, nombre from comision;");    //Consultar de comisiones
    
    $i = 0;
    while($RComision = $QComision->fetch_assoc()) {   
        echo "comisiones[$i] = {idComision: \"".$RComision["idComision"]."\", nombre: \"".$RComision["nombre"]."\"};";
        $i++;
    }

    echo "tipos = Array();";
    $QTipo = $conexion->query("select idTipo, nombre from tipo;");    //Consultar de comisiones
    
    $i = 0;
    while($RTipo = $QTipo->fetch_assoc()) {   
        echo "tipos[$i] = {idTipo: \"".$RTipo["idTipo"]."\", nombre: \"".$RTipo["nombre"]."\"};";
        $i++;
    }

    echo "</script>";

    $QComision->close();
    $QCarrera->close();
    $conexion->close();
 ?>