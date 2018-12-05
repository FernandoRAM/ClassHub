<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];
	$query=("SELECT * FROM eventosimportantes where idEvento='$id'");
	//echo $query;
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$datos = array('idEvento'=> $row[0],
					'Nombre' => $row[1],
					'Fecha' => $row[2],
					'Hora' => $row[3],
					'Descripcion'=>$row[4]);
	//print_r($datos);
	echo(json_encode($datos));
?>