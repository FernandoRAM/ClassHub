<?php 
	include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$horaInicio=$_POST['horaInicio'];
	$horaFin=$_POST['horaFin'];
	$salon=$_POST['salon'];
	$edificio=$_POST['edificio'];
	$dias=$_POST['dias'];
	$query=("INSERT INTO salones (edificio,numero) VALUES ('$edificio','$salon')");
	mysqli_query($con,$query); 
	$query= ("INSERT INTO clases (nombreProfesor,horaInicio,horaFin, dias) VALUES('$nom','$carrea','$bloque')");
	echo(mysqli_query($con,$query));

 ?>