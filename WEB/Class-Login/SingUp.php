<?php 
require 'DataBase.php';
$message ='';

if (!empty($_POST['NomUsuario']) && !empty($_POST['Contrasena'])) {
	$sql = "INSERT INTO usuario (NomUsuario,Contrasena) VALUES (:NomUsuario, :Contrasena)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':NomUsuario',$_POST['NomUsuario']);
	$Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT);
	$stmt->bindParam(':Contrasena', $Contrasena);

	if ($stmt-> execute()) {
		$message = 'Se ha creado un nuevo usuario';
	}else{
		$message = 'Ha ocurrido un error creando su cuenta';
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<link rel="shortcut icon" href="Assets/Logo-Class.ico" />
	<link rel="stylesheet" type="text/css" href="Assets/CSS/SingUp.css">
</head>
<body>
	<?php if (!empty($message)): ?>
		<p align="center"><?= $message ?></p>
	<?php endif;  ?>
			
	 

	<br>
	<br>
	<br>
	<br>

	<form class="login" action="SingUp.php" method="post">
		<h1 class="login-title">Registrarse</h1>
    	<input type="text" name="NomUsuario" class="login-input" placeholder="Nombre de Usuario" autofocus>
    	<input type="password" name="Contrasena" class="login-input" placeholder="Contraseña">
      	<input type="submit" value="Registrarse" class="login-button">
      	<p class="login-lost"><a href="Login.php">Iniciar Sesion</a></p>
      	<br>
      	<br>
      	  		
  </form>


</body>
</html>