<?php
include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$des=$_POST['descripcion'];
	$id=$_POST['id'];

	$query= ("UPDATE eventosimportantes set Nombre='$nom',Fecha='$fecha',Hora='$hora',Descripcion='$des' 
				WHERE idEvento='$id'");
	echo(mysqli_query($con,$query));
 ?>