<?php
include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$tipo=$_POST['tipo'];
	$des=$_POST['descripcion'];
	$id=$_POST['id'];
	$fecha=$_POST['fecha'];

	$query= ("UPDATE CONVOCATORIA set 
						Nombre='$nom',
						TipoConvocatoria='$tipo',
						Descripcion='$des',
						Fecha='$fecha' 
		WHERE idConvocatoria='$id'");

	echo(mysqli_query($con,$query));
 ?>