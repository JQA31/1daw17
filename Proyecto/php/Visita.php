<?php

	$Nombre = $_POST["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$Codigo = $_POST["codigo"];
	
	//Conecta con la base de datos ($conexión)
		include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
		$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
		$conexion->set_charset("utf8"); //Usa juego caracteres UTF8
		
	//Desactiva errores
		$controlador = new mysqli_driver();
		$controlador->report_mode = MYSQLI_REPORT_OFF;
		
	//Cadena de caracteres de la consulta sql	
		$sql = "SELECT IP,Lugar FROM lugares;"; //Prepara la consulta
		$sql2 = "SELECT idJesuita,nombreAlumno FROM jesuita WHERE nombre ="."'".$Nombre."'"." and codigo ="."'".$Codigo."';";
		/*echo $sql;	//Para probar
		echo $sql2;*/
		
?>	

<html>
	<head>
		<meta charset="UTF-8">
		<title>Selecciona el Lugar</title>
		<link rel="stylesheet" href="../css/EstilosCSS.css">
	</head>
	<body>
		
		<?php
				$resultado=$conexion->query($sql2);	//Ejecuta la consulta sql
			//Extrae cada una de las filas del resultado de la consulta
				if($conexion->affected_rows>0)
				{
					echo "<div class="."titulo".">";
					echo "<p>¡Hola ".$Nombre."!</p>";
					echo "</div>";
					echo "<br/><br/>";
					echo "<div class="."cuadro".">"; 
					$resultado=$conexion->query($sql);
					echo "<form method="."get"." action="."GuardarVisita.php".">";
					echo "<input name="."nombre"." type="."hidden"." value=".'"'.$Nombre.'"'.">";
					echo "<input name="."codigo"." type="."hidden"." value=".$Codigo.">";
					echo "<label>Escoga una Ciudad a visitar: </label>";
					echo "<select class="."cuadro"." name="."lugares".">";
					
					while($fila=$resultado->fetch_array())
					{
						echo "<option value=".'"'.$fila["IP"].'"'.">".$fila["Lugar"]."</option>";						
					}	
					echo "</select><br/><br/>";
					echo "<center><input type="."submit"."></center>";
				}else
				{
					echo "<br/><br/><h1>El Jesuita no existe o el Codigo es Incorrecto</h1>";
					echo '<h1><a href="../Jesuitas.html">Volver a la Pagina Principal</a></h1>';
				}
				echo "</form>";
				echo "</div>";
				
			//Cierra la conexión		
				$conexion->close();	
			?>
	</body>
</html>