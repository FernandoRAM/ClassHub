<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];
	$query=("SELECT Nombre, Descripcion,TipoConvocatoria,fecha FROM convocatoria WHERE idConvocatoria= $id");
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$datos = array('Nombre' => $row[0],
					'Descripcion' => $row[1],
					'TipoConvocatoria' => $row[2],
					'Fecha'=>$row[3],
					'idConv'=>$id);
	//echo $row[1];
	echo(json_encode($datos));
?>