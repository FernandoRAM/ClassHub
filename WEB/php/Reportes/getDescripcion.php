<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];
	$query=("
		SELECT 	reporte.idReporte,
				reporte.Descripcion, 
				reporte.status, 
				reporte.Titulo, 
				usuario.NomUsuario 
		FROM reporte INNER JOIN usuario ON reporte.idUsuario= usuario.idUsuario WHERE reporte.idReporte='$id'");
	//echo $query;
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$datos = array('idReporte'=> $row[0],
					'Titulo' => $row[3],
					'Descripcion' => $row[1],
					'status' => $row[2],
					'nombreUsuario'=>$row[4],
					'idReporte'=>$id);
	//print_r($datos);
	echo(json_encode($datos));
?>