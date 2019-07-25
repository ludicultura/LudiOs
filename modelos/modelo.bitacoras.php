<?php
    require_once "../vistas/js/dropbox/vendor/autoload.php";   //Agregar dropbox-SDK
    use Kunnu\Dropbox\Dropbox;
    use Kunnu\Dropbox\DropboxApp;

    session_start();
    
    //Conectar con la base de datos
    $conexion = new mysqli("opalo.studio", "opalostu_user", ".Pinshicontra", "opalostu_LudiOs");
    
    //Verificar conexion
    if($conexion->connect_errno) {
        $conexion = new mysqli("localhost", "root", "Bambucha_24", "ludios");
        if($conexion->connect_errno)
            $salida = "0";
    }

    $salida = "";
    if(isset($_POST["verificar"])) {
        if(isset($_SESSION["sessionComision"]))
            $salida = $_SESSION["sessionComision"];
        else 
            $salida = "0";
    } else if(isset($_POST["consultarSemana"])) {
        $semana = $_POST["consultarSemana"];
        $Query = $conexion->query("select * from semana where \"$semana\" between semana.fecha_inicio and semana.fecha_fin;");
        if($Result  = $Query->fetch_assoc())
            $salida = $Result["idSemana"].",".$Result["num_semana"].",".$Result["periodo"].",".$Result["fecha_inicio"].",".$Result["fecha_fin"];
        else 
            $salida = "\"La semana no coincide\"";
    } else if(isset($_FILES["bitacora"])) {
        //Claves de acceso para dropbox
        $dropboxKey = "x0hjlc8omqoghyv";
        $dropboxSecret = "ueasvywpqht16di";
        $dropboxToken = "kGLT-Hb6_bAAAAAAAAAACz9nBVUu7TlINdiXXbS5IsdkFpOpm3MbW4VbDjt37hF0";

        //Conexion a Dropbox
        $app = new DropboxApp($dropboxKey, $dropboxSecret, $dropboxToken);
        $dropbox = new Dropbox($app);

        //Configurar el archivo
        $nombre = $_FILES["bitacora"]["name"];
        $tempfile = $_FILES["bitacora"]["tmp_name"];
        $ext = explode(".", $nombre);
        $nombre = current($ext);
        $ext = end($ext);
        $nombreDropbox = "/".$_POST["periodo"]."/".$_SESSION["sessionNombre"]."/".$nombre.".".$ext;

        //Guardar el archivo
        try {
            $dropbox->upload($tempfile, $nombreDropbox, ["autorename" => true]);  //Subir el archivo

            //Guardar en la base de datos
            $Query = $conexion->query("insert into bitacora (idLudi, idSemana, nombre, fecha_entregado) values (".$_SESSION["sessionIdPersona"].",".$_POST["idSemana"].",\"".$nombre.".".$ext."\",\"".$_POST["semana"]."\");");
            
            $salida = "Bitácora subida";
        } catch(exception $e) {
            $salida = "No se pudo subir la bitácora";
        }
    } else if($_POST["historial"]) {
        $Query = $conexion->query("select bitacora.nombre, bitacora.fecha_entregado, semana.num_semana from bitacora, semana where bitacora.idLudi = ".$_SESSION["sessionIdPersona"]." and bitacora.idSemana = semana.idSemana;");
        while($Result = $Query->fetch_assoc())
            $salida = $salida.$Result["nombre"].",".$Result["fecha_entregado"].",".$Result["num_semana"].";";
    }

    $conexion->close();
    if(isset($Query)) 
        $Query->close();

    echo $salida;
 ?>