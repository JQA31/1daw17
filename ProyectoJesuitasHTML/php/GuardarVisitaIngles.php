<?php
//Recoge la información del formulario
	session_start();
	$Nombre=$_SESSION["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$ipLugar=$_POST["lugares"];
//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

//Primera Consulta
	$sql="Select idJesuita From jesuita Where nombre=".'"'.$Nombre.'"'.";";
	
	$resultado=$conexion->query($sql);
	$fila=$resultado->fetch_array();

//Consulta Introduccion en la tabla Visita
	$sql2="INSERT INTO visita(idJesuita,IP) VALUES(".$fila["idJesuita"].",".'"'.$ipLugar.'"'.");";
	
//Ejecuta la insercion
	$resultado=$conexion->query($sql2);
//Busca el lugar para mostrarlo
	$sqllugares="Select Lugar From lugares Where Ip=".'"'.$ipLugar.'"'.";";

	$lugar=$conexion->query($sqllugares);
	$Lugarip = $lugar->fetch_array();
	
//Toma la fecha de la ultima consulta con el id del Jesuita
	$sqlfecha = "SELECT FechaHora FROM visita WHERE idJesuita=".$fila["idJesuita"]." ORDER BY FechaHora DESC LIMIT 1;";
	
	$fecha=$conexion->query($sqlfecha); 
	$fechahora=$fecha->fetch_array();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Confirmacion de Jesuita</title>
		<link rel="stylesheet" href="../css/EstilosCSS.css">
	</head>
	<body>
		
		<div class="titulo">
				¡Visit completed!
		</div>
		</br>
		<div class="cuadro"> 
			<h2>Place Visited: <?php echo $Lugarip["Lugar"] ?></h2>
		</div>
		</br>
		<div class="cuadro"> 
			<h2>Visit Made by: <?php echo $_SESSION["nombre"] ?></h2>
		</div>

		</br>

		<div class="cuadro"> 
			<h2>Date of the visit: <?php echo $fechahora["FechaHora"] ?> </h2>
		</div>
		
		</br>

		<center><h2><a href="../Jesuitas.html">Try again</a></h2></center>		
	
	</body>
</html>

<?php echo $conexion->close(); ?>