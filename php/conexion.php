<?php 

class Funciones {
	public function conectar() {
		$host = "classhub2.000webhostapp.com";
		$user = "id7692427_fernando";
		$pass = "123..";
		$db = "id7692427_classhub";

		$conexion = new mysqli($host, $user, $pass, $db);



		if ($conexion-> connect_errno > 0) {
			echo "ERROR:".$conexion->error."<br>";
		} else {
			
			return $conexion;
		}
	}

	public function desconectar($conexion){
		mysql_close($conexion);
	}
}

 ?>