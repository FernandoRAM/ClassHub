<?php
include("cn.php");
header("Cache-Control: no-cache, must-revalidate");
clearstatcache();
$con = conectar();

//Validar si estan todos los campos

$imagename=$_FILES["image"]["name"];;

alerta($_POST['name']."nombre");
if (isset($_POST['name'])&& isset($_POST['type']) && isset($_POST['description'])) {
	if (is_null($imagename)) {
		alertaRedirec("No seleccionó ninguna Imagen","../crearconvocatoria.html");
	}else{

	
		$name = $_POST['name'];
		$type = $_POST['type'];
		$description = $_POST['description'];

		$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/'.$imagename; //ruta del directorio donde se guardara
		$imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
		//Validar que no exista una foto llamda igual
		$query=("SELECT idImagen FROM imagenes WHERE ruta= '$directorio'");

		if (validarSiExiste($con,$query)==1) {
			alertaRedirec( "La imagen que intenta subir ya existe, intente cambiando el nombre.","../crearconvocatoria.html");
		}else{
			//Query para subir la foto y su ruta
			$query=("INSERT into imagenes (imagen,ruta) VALUES ('$imagetmp','$directorio')");
			//Ejecutamos la consulta
			consultar($con,$query);

			//Seleccionaremos el Id de la imagen que acabamos de subir
			$query=("SELECT idImagen FROM imagenes WHERE ruta= '$directorio'");
			//Ejecutamos la consulta
			$idImagen=consultar($con,$query);

			while ($row = mysqli_fetch_array($idImagen)) {
				//guardamos el id de la imagen
    			$idImagen= $row['idImagen'];
			}
			//Creamos el query para insertar la convocatoria
			$query=("INSERT INTO convocatoria (Nombre,TipoConvocatoria,Descripcion,idImagen) VALUES(
				'$name',
				'$type',
				'$description',
				'$idImagen')");
			//Ejecutamos el query
			consultar($con,$query);
			alertaRedirec("La convocatoria se creo con exito","../crearconvocatoria.html");
		}
	}	
}else{
	alertaRedirec("Ingrese todos los campos", "../crearconvocatoria.html");
}



?>
