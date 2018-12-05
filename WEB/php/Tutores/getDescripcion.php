<?php
	session_start();
	include '../cn.php';
	$con=conectar();
	$id=$_POST['id'];
	$query=("SELECT tutores.nombre, 
				tutores.correo,
        		tutores.cubiculo,
        		tutores.horaInicio,
        		tutores.horaFin,
        		imagenes.ruta
        		FROM tutores 
        		INNER JOIN imagenes ON tutores.idImagen=imagenes.idImagen WHERE tutores.idTutor='$id'");
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
	$datos = array('Nombre' => $row[0],
					'correo' => $row[1],
					'cubiculo' => $row[2],
					'horaInicio'=>$row[3],
					'horaFin'=>$row[4],
					'ruta'=>$row[5],
					'idConv'=>$id);
	//echo $row[1];
	echo(json_encode($datos));
?>