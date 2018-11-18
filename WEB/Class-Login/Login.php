<?php
    session_start();
	require 'DataBase.php';
	$message ='';
	  
	if (!empty($_POST['NomUsuario']) && !empty($_POST['Contrasena'])) {
		$records = $conn->prepare('SELECT idUsuario,NomUsuario, Contrasena FROM usuario WHERE NomUsuario=:NomUsuario');
		$records->bindParam(':NomUsuario',$_POST['NomUsuario']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if (count($results) > 0 && password_verify($_POST['Contrasena'], $results['Contrasena'])) {
			
			header('location: /Class-Login');
		}else{
			$message = 'No coinciden los datos';
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
	 <?php if (!empty($message)): ?>
		<p align="center"><?= $message ?></p>
	<?php endif;?>

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