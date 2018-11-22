<?php
    session_start();
	require 'DataBase.php';

	# Instanciar la clase funciones
	$funciones = new Funciones();

	# Mandamos llamar el metodo conectar() del objeto funciones
	$conexion = $funciones->conectar();

	# INICIO DE SESIÓN
	if (isset($_POST['btnLogin'])) {
		$user = $_POST['NomUsuario'];
		$pass = $_POST['Contrasena'];

		$select = "SELECT COUNT(*) AS total
					FROM usuario
					WHERE username = '{$user}'
					AND pass = md5('{$pass}');";

		# Mandamos la consulta a la BD
		$resultado = $conexion->query($select);

		# Recuperamos el resultado de la consulta
		$total = $resultado->fetch_assoc();

		if($total['total'] == 0){
			echo "Usuario o contraseña incorrectos<br />";
		} else {
			# echo "Puedes iniciar sesión<br />";
			# Buscamos los datos del usuario que inicio sesión
			$verUser = "SELECT idUsuario, NomUsuario FROM usuario
						WHERE username = '{$user}'
						AND pass = md5('{$pass}');";

			# Mandamos la consulta a la BD
			$resUser = $conexion->query($verUser);

			# Recuperamos el resultado de la consulta
			$res = $resUser->fetch_assoc();

			$_SESSION['id'] = $res['idUsuario'];
			$_SESSION['user'] = $res['NomUsuario'];

			echo "ID> {$_SESSION['id']}<br />";
			echo "Username> {$_SESSION['user']}<br />";

			# Redigiremos al usuario a la página 
			#header("Location: timeline.php");		
		}
	}
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>
	<link rel="stylesheet" type="text/css" href="Assets/CSS/Login.css">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<link rel="shortcut icon" href="Assets/Logo-Class.ico" />
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<form class="login" action="Login.php" method="post">
		<h1 class="login-title">Iniciar Sesion</h1>
    	<input type="text" name="NomUsuario" class="login-input" placeholder="Nombre de Usuario" autofocus>
    	<input type="password" name="Contrasena" class="login-input" placeholder="Contraseña">
    	<input type="submit" value="Ingresar" class="login-button">
  		<p class="login-lost"><a href="SingUp.php">¿No tienes cuenta? Registrate</a></p>
  </form>

</body>
</html>
