<?php 
	include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$carrea=$_POST['carrea'];
	$bloque=$_POST['bloque'];

			$query= ("INSERT INTO materias (Nombre,carrera,bloque) 
					VALUES('$nom','$carrea','$bloque')");
			echo(mysqli_query($con,$query));

	

 ?>