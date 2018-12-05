<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];
	$query=("SELECT * FROM materias where idMateria='$id'");
	//echo $query;
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$datos = array('idMateria'=> $row[0],
					'nombre' => $row[1],
					'carrera' => $row[2],
					'bloque' => $row[3]);
	//print_r($datos);
	echo(json_encode($datos));
?>