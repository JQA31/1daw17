<?php
	session_start();
	$sql = "SELECT IP,Lugar FROM lugares;"; //Prepara la consulta
	//echo $sql;
	//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

	
?>


<html>
	<head>
		<meta charset="utf-8"/>
		<title>Introducir Lugares</title>
		<link rel="stylesheet" href="../css/EstilosCSS.css">
	</head>
	<body>
		<div class="titulo">
			<?php echo "¡Hola ".$_SESSION["nombre"]."!"; ?>
		</div>
		
		<br/><br/>
		
		<div class="cuadro">
			<form method="POST" action="./GuardarVisita.php">
				<label>Escoger Ciudad a Visitar: </label>
				<select class="cuadro" name="lugares">
					<?php
						$resultado = $conexion->query($sql);
						while ($fila = $resultado->fetch_array()) 
						{
							echo "<option value=".'"'.$fila["IP"].'"'.">".$fila["Lugar"]."</option>";	
						}
						$conexion->close();	
					?>
				</select>
				<br/><br/>
				<center><input type="submit"></center>
			</form>
		</div>
	</body>
</html>