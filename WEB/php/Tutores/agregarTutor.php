<?php 
	include '../cn.php';
	$con=conectar();
	$nombre=$_POST['nombreNew'];
	$horaInicio=$_POST['horaInicioNew'];
	$horaFin=$_POST['horaFinNew'];
	$email=$_POST['emailTutorNew'];
	$numCubiculo=$_POST['numCubiculoNew'];
	$imgName=$_FILES['imageCrear']['name'];
	$imgTemp=$_FILES['imageCrear']['tmp_name'];
	$path="C:/xampp/htdocs/Ing_Software/ClassHub/WEB/img/".$imgName;
	echo $path;
	move_uploaded_file($_FILES['imageCrear']['tmp_name'], $path);
	$query=("INSERT INTO imagenes(ruta) VALUES ('$path')");
	mysqli_query($con,$query);
	//$query=("SELECT idImagen FROM imagenes WHERE ruta='$img'");
	//$result=mysqli_query($con,$query);
	//$row=mysqli_fetch_row($result);
	//$query= ("INSERT INTO tutores (nombre,horaInicio,horaFin,correo,cubiculo,idImagen) 
	//				VALUES('$nombre','$horaInicio','$horaFin','$email',$numCubiculo,$row[0])");
	//echo $query;
	//echo(mysqli_query($con,$query));


	

 ?>