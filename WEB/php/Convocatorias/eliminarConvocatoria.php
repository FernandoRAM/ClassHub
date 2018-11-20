<?php 
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];

	$query=("DELETE from convocatoria where idConvocatoria='$id'");
	echo(mysqli_query($con,$query));
 ?>