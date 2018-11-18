<?php 
session_start();
require 'DataBase.php';
$message ='';


if (isset($_SESSION['idUsuario'])) {
	$records = $conn->prepare('SELECT idUsuario, NomUsuario, Contrasena FROM usuario WHERE idUsuario = :idUsuario');
    $records->bindParam(':idUsuario', $_SESSION['idUsuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a ClassHub</title>
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Assets/CSS/Estilos.css">
	<link rel="shortcut icon" href="Assets/Logo-Class.ico" />
</head>
<body>
	 <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['NomUsuario']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
    </a>
    <?php else: ?>
	
	<h1>Inicia Sesion o Registrate</h1>
	<a href="Login.php">Iniciar Sesion</a> or
	<a href="SingUp.php"> Registrarse</a>
	<?php endif; ?>

</body>
</html>