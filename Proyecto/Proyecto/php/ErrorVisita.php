<?php
	//Conecta con la base de datos ($conexión)
		include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
		$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
		$conexion->set_charset("utf8"); //Usa juego caracteres UTF8
		
	//Desactiva errores
		$controlador = new mysqli_driver();
		$controlador->report_mode = MYSQLI_REPORT_OFF;
		
	//Cadena de caracteres de la consulta sql	
		$sql = "SELECT IP,Lugar FROM lugares;"; //Prepara la consulta
		
		echo $sql;	//Para probar
		
		$resultado=$conexion->query($sql);	//Ejecuta la consulta sql
		
	//Extrae cada una de las filas del resultado de la consulta
		if($conexion->affected_rows>0)
		{
			while($fila=$resultado->fetch_array())
			{
				echo "<option value=".'"'.$fila["IP"].'"'.">".$fila["Lugar"]."</option>";						
			}
		}else{
			
		}
			
	//Cierra la conexión		
		$conexion->close();	

?>					

<html>
	<head>
		<meta charset="UTF-8">
		<title>Selecciona el Lugar</title>
		<link rel="stylesheet" href="../css/VisitaCSS.css">
	</head>
	<body>
			<div class="titulo">
				<p>Hola <?php echo  $_GET["nombre"];?></p>
			</div>
		
			<br/><br/>
			
			<div class="cuadro">
				<legend>Escoja el Lugar al que quiera Visitar: </legend> 
				<select>
					
				</select>
			</div>
			<br/><br/>
	</body>
</html>