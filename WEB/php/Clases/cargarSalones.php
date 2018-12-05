<?php 
	include '../cn.php';
	$con=conectar();
	$salon=$_POST['salon'];

	$query=("SELECT numero FROM salones WHERE edificio='$salon';");
	$result= mysqli_connect($query);
	$salones=array();
	while (($fila = mysql_fetch_array($result)) != NULL) {
    	$salones[$fila['id']] = $fila['numero'];
	}
	print_r($salones);
 ?>