<?php
//Recoge la información del formulario
	$Nombre = $_POST["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$IP = $_POST["ip"];
	$Lugar = $_POST["lugar"];
//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

//Primera Consulta
	$sql="INSERT INTO lugares VALUES (".'"'.$IP.'"'.",".'"'.$Nombre.'"'.",".'"'.$Lugar.'"'.");";
	echo $sql;
	$resultado=$conexion->query($sql);
	if($conexion->affected_rows>0)
	{
		echo "<h1>Lugar Introducido con Exito </h1>";
	}
	else{
		echo "<h1>Hubo un error en la introduccion de los datos</h1>";
	}
	
//Cierra la conexión
	$conexion->close();

?>