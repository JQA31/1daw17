<?php
	
	$Nombre= $_GET["nombre"];   //asigna el valor que se envía del formulario, recuerda acabar con ;
	$Codigo= $_GET["codigo"];
	
//Conecta con la base de datos ($conexión)
    include 'ConfiguracionesJesuitas.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;
	
//Cadena de caracteres de la consulta sql	
	$sql="SELECT idJesuita,nombreAlumno,firma,firmaIngles FROM jesuita WHERE nombre ="."'".$Nombre."'"." and codigo ="."'".$Codigo."';"; //Prepara la consulta
	echo $sql;	//Para probar
	
	$resultado=$conexion->query($sql);	//Ejecuta la consulta sql
	
	echo "<h1>LISTADO DE JESUITAS</h1>";
	//Extrae cada una de las filas del resultado de la consulta
	
	$id=$resultado->fetch_array();
	if($conexion->affected_rows>0)
	{
		echo "<h3>"."IdJesuita: ".$id["idJesuita"]."</h3>";
		echo "<h3>"."Nombre del Alumno: ".$id["nombreAlumno"]."</h3>";
		echo "<h3>"."Firma Español: ".$id["firma"]."</h3>";
		echo "<h3>"."Firma Ingles: ".$id["firmaIngles"]."</h3>";	
	}else {
		echo '<h3>El Jesuita no existe o el Codigo es Incorrecto</h3>';
	}
	
	echo '<h3><a href="../Jesuitas.html">Volver a la Pagina Principal</a></h3>';
	
	
	
//Cierra la conexión		
	$conexion->close();
?>