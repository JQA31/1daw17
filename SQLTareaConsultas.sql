--1- Muestra las visitas con el nombre del jesuita que las has realizado.
	SELECT idVisita,jesuita.Nombre 
		FROM visita INNER JOIN jesuita
			ON visita.idJesuita=jesuita.idJesuita
				WHERE jesuita.nombre='Antonio de Monserrat';
--2- Muestra todas las visitas con el nombre del jesuita que las ha realizado y el nombre (lugar) de lugar visitado.
	SELECT visita.idVisita,jesuita.Nombre,lugares.lugar 
		FROM visita INNER JOIN jesuita INNER JOIN lugares
			ON visita.IP=lugares.IP AND jesuita.idJesuita=visita.idJesuita
				WHERE jesuita.Nombre ='Alejandro';
--3- Añade un jesuita nuevo. Este jesuita no va a realizar ninguna visita.
	INSERT INTO jesuita (Codigo, Nombre, NombreAlumno, Firma, FirmaIngles)
	VALUES ('valor hash', 'Jesuita', 'Alumno', 'Firma', 'Signature');
--4- Añade 2 lugares nuevos. Estos lugares no se van a visitar.
	INSERT INTO lugares (Ip, N_Equipo, Lugar)
	VALUES ('192.168.1.1', '12', 'Badajoz'),
			('192.168.1.2', '13', 'Sevilla');
--5- Muestra todos los jesuitas con el nombre del lugar que han visitado. Si algún jesuita no ha realizado visita, también habrá que visualizar sus datos, mira que ocurre con el valor del campo lugar en estos casos.
--Realiza 2 versiones de la misma consulta, una usando LEFT y otra usando RIGHT.
	SELECT jesuita.idJesuita, jesuita.Nombre AS NombreJesuita, lugares.Lugar
		FROM jesuita
			LEFT JOIN visita 
				ON jesuita.idJesuita = visita.idJesuita
			LEFT JOIN lugares 
				ON visita.Ip = lugares.Ip
			ORDER BY jesuita.idJesuita;
	
	SELECT jesuita.idJesuita, jesuita.Nombre AS NombreJesuita, lugares.Lugar
		FROM visita
			RIGHT JOIN jesuita 
				ON visita.idJesuita = jesuita.idJesuita
			LEFT JOIN lugares 
				ON visita.Ip = lugares.Ip
			ORDER BY jesuita.idJesuita;
--6- Muestra todos los lugares con el nombre del jesuita que realiza la visitada. Si algún lugar no se ha visitado, también habrá que visualizar sus datos ´mira que ocurre con el valor del campo nombre (jesuita) en estos casos.
	SELECT lugares.Ip, lugares.Lugar, jesuita.Nombre AS NombreJesuita
		FROM lugares
			LEFT JOIN visita 
				ON lugares.Ip = visita.Ip
			LEFT JOIN jesuita 
				ON visita.idJesuita = jesuita.idJesuita
			ORDER BY lugares.Ip;
--7- Mirando los resultado de la consulta anterior, intenta mostrar solo los lugares que NO se han visitado (es la consulta anterior con una condición).
	SELECT lugares.Ip, lugares.Lugar
		FROM lugares
			LEFT JOIN visita 
				ON lugares.Ip = visita.Ip
					WHERE visita.idVisita IS NULL;
--8- Muestra todos los jesuitas con el nombre del lugar que han visitado. Si algún jesuita no ha realizado visita, también habrá que visualizar sus datos y si algún lugar no se ha visitado también se muestra su nombre (lugar). Realiza esta consulta en 2 pasos y ve comprobado qué ocurre al hacer el JOIN.
-- Paso 1: Jesuitas con sus visitas (incluyendo los sin visitas)
	SELECT jesuita.idJesuita, jesuita.Nombre, visita.Ip
		FROM jesuita
			LEFT JOIN visita 
				ON jesuita.idJesuita = visita.idJesuita;

-- Paso 2: Añadiendo información de lugares
	SELECT jesuita.idJesuita, jesuita.Nombre AS NombreJesuita, lugares.Lugar
		FROM jesuita
			LEFT JOIN visita 
				ON jesuita.idJesuita = visita.idJesuita
			LEFT JOIN lugares 
				ON visita.Ip = lugares.Ip
	UNION
	SELECT NULL AS idJesuita, NULL AS NombreJesuita, lugares.Lugar
		FROM lugares
			LEFT JOIN visita 
				ON lugares.Ip = visita.Ip
					WHERE visita.idVisita IS NULL;
--Consultas con DISTINCT:
--9- Muestra el nombre de los jesuitas que han realizado alguna visitas (no hay que mostrar ningún dato más de la visita).
	SELECT DISTINCT jesuita.Nombre
		FROM jesuita
			INNER JOIN visita 
				ON jesuita.idJesuita = visita.idJesuita;
--10- Piensa otra consulta diferente con DISTINCT (con la misma base de datos).
	SELECT DISTINCT lugares.Lugar
		FROM lugares
			INNER JOIN visita 
				ON lugares.Ip = visita.Ip;
--Consultas para probar los operadores de la cláusula WHERE:
-- Busca una necesidad de consultas con la base de datos jesuitas y usa cada uno de los operadores. Tienes que poner los enunciados y también la solución.
-- Mostrar todos los datos del jesuita que tiene el código x
 	SELECT *
		FROM jesuita
			WHERE Codigo = 'x';
--Mostrar todas las visitas que no fueron realizadas por el jesuita con id 5
	SELECT *
		FROM visita
			WHERE idJesuita != 5;
--Mostrar los jesuitas con id menor que 10
	SELECT *
		FROM jesuita
			WHERE idJesuita < 10;
--Mostrar visitas realizadas entre el 1 de enero y el 31 de marzo de 2023
	SELECT *
		FROM visita
			WHERE FechaHora BETWEEN '2023-01-01' AND '2023-03-31';
--Mostrar jesuitas cuyos códigos sean 'J0001', 'J0002' o 'J0003'
	SELECT *
		FROM jesuita
			WHERE Codigo IN ('hash1', 'hash2', 'hash3');
--Mostrar lugares que no tienen equipo asignado (N_Equipo es NULL)
	SELECT *
		FROM lugares
			WHERE N_Equipo IS NULL;
-- Busca en Internet el operador LIKE y realiza las siguientes consultas:
  --* Lugares con IP que terminen en  (completa el enunciado según tus datos).
	SELECT *
		FROM lugares
			WHERE Ip LIKE '%.100';
  --* Jesuitas que sean santos (comienzan por la palabra San ).
	SELECT *
		FROM jesuita
			WHERE Nombre LIKE 'San %';
  --* Otras consultas con LIKE (pueden ser de 2 o 3 tablas).
	SELECT jesuita.Nombre, visita.FechaHora
		FROM jesuita
			JOIN visita  
				ON jesuita.idJesuita = visita.idJesuita
			WHERE jesuita.Nombre LIKE '%de%';
-- Todos los operadores se pueden negar, menos el IS (ya que se preguntaría por NOT NULL). Realiza consultas negando estos operadores, de nuevo tienes que poner los enunciados con su solución.

--  Jesuitas que su nombre no comienza con San
	SELECT *
		FROM jesuita
			WHERE Nombre NOT LIKE 'San %';
-- Lugares que no son Badajoz ni Sevilla
	SELECT *
		FROM lugares
			WHERE Lugar NOT IN ('Badajoz' , 'Sevilla');
--Visitas que no fueron realizadas entre las 9:00 o después de las 18:00
	SELECT *
		FROM visita
			WHERE TIME(FechaHora) NOT BETWEEN '09:00:00' AND '18:00:00';
--Jesuitas que no tienen el código x
	SELECT *
		FROM jesuita
			WHERE NOT Codigo = 'hash';	
-- Jesuitas que tienen código asignado
	SELECT *
		FROM jesuita
			WHERE Codigo IS NOT NULL;