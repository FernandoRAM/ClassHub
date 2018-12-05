<?php
include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$carrea=$_POST['carrea'];
	$bloque=$_POST['bloque'];
	$id=$_POST['id'];

	$query= ("UPDATE materias set Nombre='$nom',carrera='$carrea',bloque='$bloque' WHERE idMateria='$id'");
	echo(mysqli_query($con,$query));
 ?>