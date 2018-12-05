<?php 
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];

	$query=("DELETE from materias where idMateria='$id'");
	echo(mysqli_query($con,$query));
 ?>