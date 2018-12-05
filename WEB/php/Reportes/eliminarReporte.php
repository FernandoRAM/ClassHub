<?php 
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];

	$query=("DELETE from reporte where idReporte='$id'");
	echo(mysqli_query($con,$query));
 ?>