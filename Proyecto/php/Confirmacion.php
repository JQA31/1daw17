<?php
	session_start();
	$_SESSION["nombre"]=$_POST["nombre"];
	$Codigo = $_POST["codigo"];

	
	//Conecta con la base de datos ($conexión)
		include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
		$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
		$conexion->set_charset("utf8"); //Usa juego caracteres UTF8
		
	//Desactiva errores
		$controlador = new mysqli_driver();
		$controlador->report_mode = MYSQLI_REPORT_OFF;
		
	
	//Cadena de caracteres de la consulta sql	
		$sqlcodigo = "SELECT codigo FROM jesuita Where nombre=".'"'.$_SESSION["nombre"].'"'.";";
		
		/*echo $sql;	//Para probar
		echo $sql2;*/
		
?>	

<html>
	<head>
		<meta charset="UTF-8">
		<title>Confirmacion de Jesuita</title>
		<link rel="stylesheet" href="../css/EstilosCSS.css">
	</head>
	<body>
		
		<?php
				$objcodigo = $conexion->query($sqlcodigo);
				
				$codigobbdd = $objcodigo->fetch_array();
				
				
			//Extrae cada una de las filas del resultado de la consulta
			
			// Verificar la contraseña si está hasheada
			if (password_verify($Codigo , $codigobbdd["codigo"])) 
			{
				echo "<div class='titulo'>¡Contraseña válida!</div>";
				echo '<h1><a href="./Confirmado.php">Pagina Siguiente</a></h1>';
			}
			else 
			{
				echo "<br/><br/><h1>El Jesuita no existe o el Código es Incorrecto</h1>";
				echo '<h1><a href="../Jesuitas.html">Volver a la Página Principal</a></h1>';
			}

				
			//Cierra la conexión		
				$conexion->close();	
			?>
	</body>
</html>