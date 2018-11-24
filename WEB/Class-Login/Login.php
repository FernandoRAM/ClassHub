<?php
    session_start();
	
	if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'DataBase.php';

  if (!empty($_POST['NomUsuario']) && !empty($_POST['Contrasena'])) {
    $records = $conn->prepare('SELECT idUsuario, NomUsuario, Contrasena FROM usuario WHERE NomUsuario = :NomUsuario');
    $records->bindParam(':NomUsuario', $_POST['NomUsuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['Contrasena'] , $results['Contrasena'])) {
      $_SESSION['user_id'] = $results['id'];
	#Cambiar el "/Class-Login por la pagina a la cual se va a redirigir cuando inicien sesion.
      header("Location: /Class-Login");
    } else {
      $message = 'Sorry, those credentials do not match';
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
