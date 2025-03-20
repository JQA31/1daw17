<?php
//Recoge la información del formulario
	$Nombre=$_GET["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$ipLugar=$_GET["lugares"];
	$Codigo=$_GET["codigo"];
//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

//Primera Consulta
	$sql="Select idJesuita From jesuita Where nombre=".'"'.$Nombre.'"'." AND codigo=".'"'.$Codigo.'"'.";";
	$resultado=$conexion->query($sql);
	$fila=$resultado->fetch_array();

//Consulta Introduccion en la tabla Visita
	$sql2="INSERT INTO visita(idJesuita,IP) VALUES(".$fila["idJesuita"].",".'"'.$ipLugar.'"'.");";
	
	/*echo $sql; //envía el contenido de la variable al navegador, o sea, muestra la información en el navegador
	echo $sql2;*/
	
//Ejecuta la insercion
	$resultado=$conexion->query($sql2);
		echo "<h2>Visita realizada</h2>";

		echo "Lugar Visitado: ".$ipLugar;
		
		echo '<h3><a href="../Jesuitas.html">Volver a intentarlo</a></h3>';	

//Cierra la conexión
	$conexion->close();

?>