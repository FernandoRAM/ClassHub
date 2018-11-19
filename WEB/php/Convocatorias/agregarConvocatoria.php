<?php 
	include '../cn.php';
	$con=conectar();
	$nom=$_POST['nombre'];
	$tipo=$_POST['tipo'];
	$des=$_POST['descripcion'];
	//$imagename=$_FILES["image"]["name"];

	//$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/'.$imagename; //ruta del directorio donde se guardara
	//$imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
	//Validar que no exista una foto llamada igual
		//$query=("SELECT idImagen FROM imagenes WHERE ruta= '$directorio'");

		//if (validarSiExiste($con,$query)==1) {
		//	echo "0";
		//}else{
			//Query para subir la foto y su ruta
		//	$query=("INSERT into imagenes (imagen,ruta) VALUES ('$imagetmp','$directorio')");
			//Ejecutamos la consulta
		//	consultar($con,$query);

			//Seleccionaremos el Id de la imagen que acabamos de subir
		//	$query=("SELECT idImagen FROM imagenes WHERE ruta= '$directorio'");
			//Ejecutamos la consulta
		//	$idImagen=consultar($con,$query);
		//	$row = mysqli_fetch_array($idImagen);
		//	$idImagen= $row['idImagen'];
		//	$query= ("INSERT INTO eventosimportantes (Nombre,Fecha,Hora,Descripcion,idImagen) 
		//			VALUES('$nom','$fecha','$hora','$des','$idImagen')");
			$query= ("INSERT INTO convocatoria (Nombre,TipoConvocatoria,Descripcion) 
					VALUES('$nom','$tipo','$des')");
			
			echo(mysqli_query($con,$query));
		//}
	

	

 ?>