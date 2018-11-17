<?php
function conectar() {
	$servidor = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "classhub";
	
	$con = mysqli_connect($servidor, $usuario, $pass, $bd);
	
	return $con;
}


function consultar($con, $query) {
	$resultado = mysqli_query($con, $query);
	return $resultado;
}
function desconectar($con) {
	mysqli_close($con);
}
function validarSiExiste($con, $query){
	$resultado = consultar($con,$query);
	if (mysqli_num_rows($resultado)>0) {
		echo "1";
		return 1;

	}else{
		echo "0";
		return 0;
	}
}
function alertaRedirec($mensaje,$redireccion){
		
		echo "<script>
                alert('$mensaje');
                window.location.replace('$redireccion');
   			 </script>" ;
}
function alerta($mensaje){
		
		echo "<script>
                alert('$mensaje');
   			 </script>" ;
}
?>