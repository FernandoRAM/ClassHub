<?php
include '../cn.php';
	$con=conectar();
	$status=$_POST['nuevoStatus'];
	$id=$_POST['id'];

	$query= ("UPDATE reporte set Status='$status' WHERE idReporte='$id'");
	echo(mysqli_query($con,$query));
 ?>