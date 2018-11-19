<?php 
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];

	$query=("DELETE from eventosimportantes where idEvento='$id'");
	echo(mysqli_query($con,$query));
 ?>