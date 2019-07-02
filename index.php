<?php
	session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php 
	
	if(isset($_GET['id'])){
		
	}
	elseif(isset($_GET['page'])){//Esta variable verifica que exista un id para la página visitada,
						   //si no existe, es porque está en el index, entonces lo del index se incluye
						   //en el else en el orden que deben aparecer las closas

		switch($_GET['page']){

			case '1':
			//Registro
			include('controladores/controlador.dashboard.php');
			break;

			case '2':
			//Perfil
			include('controladores/controlador. .php');
			break;

			case '3':
			//Nueva publicación
			include('controladores/controlador. .php');
			break;

			case '4':
			//Publicación
			include('controladores/controlador. .php');
			break;

			case '5':
			//Buscador
			include('controladores/controlador. .php');
			break;

			case '6':
			//Panel de publicaciones
			include('controladores/controlador. .php');
			break;

			case 'default':
			
		}
	}
	else{
		//Aquí se incluyen todos los controladores del index.
		include("modelos/modelo.login.php");
		include('controladores/controlador.login.php');
	}

	?>
</head>
<body>
    <?php

if(isset($_GET['id'])){
	
}

elseif(isset($_GET['page'])){

	switch($_GET['page']){

		case '1':
		//vista del dashboard
		include('vistas/modulos/dashboard.php');
		break;

		case '2':
		//vista del calendario
		include('vistas/modulos/calendario.php');
		break;

		case '3':
		//vista de las bitacoras
		include('vistas/modulos/bitacoras.php');
		break;

		case '4':
		//vista de evaluaciones
		include('vistas/modulos/evaluaciones.php');
		break;

		case '5':
		//vista de documentos
		include('vistas/modulos/documentos.php');
		break;

		case '6':
		//vista de informacion
		include('vistas/modulos/informacion.php');
		break;

		case '7':
		//vista de administrar
		include('vistas/modulos/administrar.php');
		break;

		case '8':
		//vista de configuracion
		include('vistas/modulos/configuracion.php');
		break;


	}
}
else{
	include('vistas/modulos/login.php');
	

}
include('vistas/modulos/navbar.php');
include('vistas/modulos/nav.php');

?>

	<!-- Frameworks JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>