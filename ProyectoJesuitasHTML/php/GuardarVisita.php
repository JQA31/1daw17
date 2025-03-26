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
	
	$sqllugares="Select Lugar From lugares Where Ip=".'"'.$ipLugar.'"'.";";
	
	/*echo $sql; //envía el contenido de la variable al navegador, o sea, muestra la información en el navegador
	echo $sql2;*/
	
//Ejecuta la insercion
	$resultado=$conexion->query($sql2);
//Busca el lugar para mostrarlo
	$lugar=$conexion->query($sqllugares);
	$Lugarip = $lugar->fetch_array();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Confirmacion de Jesuita</title>
		<link rel="stylesheet" href="../css/EstilosCSS.css">
	</head>
	<body>
		
		<div class="titulo">
				¡Visita realizada!
		</div>
		</br>
		<div class="cuadro"> 
			<h2>Lugar Visitado: <?php echo $Lugarip["Lugar"] ?></h2>
		</div>
		</br>
		<div class="cuadro"> 
			<h2>Visita Realizada por: <?php echo $_SESSION["nombre"] ?></h2>
		</div>
		
		</br>
		<center><h2><a href="../Jesuitas.html">Volver a intentarlo</a></h2></center>	
				
	
	</body>
</html>

<?php echo $conexion->close(); ?>