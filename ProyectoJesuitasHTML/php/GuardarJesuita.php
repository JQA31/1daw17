<?php
//Recoge la información del formulario
	$Jesuita = $_POST["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$Codigo = $_POST["codigo"];
	$Alumno = $_POST["alumno"];
	$Ingles = $_POST["ingles"];
	$Español = $_POST["español"];

//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

	$encriptado = password_hash($Codigo, PASSWORD_DEFAULT);
	//echo "</br>";
	
//Cadena de caracteres de la consulta sql	
	$sql="INSERT INTO jesuita(Nombre,Codigo,NombreAlumno,Firma,FirmaIngles) VALUES("."'".$Jesuita."'".","."'".$encriptado."'".","."'".$Alumno."'".","."'".$Español."'".","."'".$Ingles."'".');';  //completa lo que falta
	echo $sql; //envía el contenido de la variable al navegador, o sea, muestra la información en el navegador

//Ejecuta la consulta
	if($conexion->query($sql))
	{
		echo "<h2>Introduccion Correcta</h2>";
	}
	else
	{
		echo "<h2>Introduccion Incorrecta</h2>";
		echo '<h3><a href="../Visitas.html"> Vuelve a intentarlo</a></h3>';
	}	

//Cierra la conexión
	$conexion->close();

?>