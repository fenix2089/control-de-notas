<?php
session_start();
require('./bd/conexion.php'); ?>
<?php
if (isset($_REQUEST['iniciar'])) {
	$usuario = $_REQUEST['nombre'];
	$password = $_REQUEST['password'];

	$result = pg_query($dbconn, "SELECT * FROM usuarios where nombre='$usuario'");
	while ($login = pg_fetch_array($result)) {
		$usuarioDB = $login['nombre'];
		$passwordDB = $login['password'];
		$tipo = $login['tipo'];
	}
	if ($usuario == isset($usuarioDB) && password_verify($password, $passwordDB)) {
		$_SESSION['logged'] = "Logged";
		$_SESSION['nombre'] = $usuarioDB;
		$_SESSION['password'] = $passwordDB;
		$_SESSION['tipo'] = "$tipo";
		header("Location: ./templates/principal.php");
	} elseif ($usuario !== isset($usuarioDB)) {
		echo "<div class='error'><span>El Nombre de Usuario o contraseña que has Introducido es Incorrecto</span></div>";
	}
}
?>
<html>
   <head>
      <title>Login</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
   </head>
   <body>
      <div id="login">
         <form action= "" method="POST">
            <label>Usuario: </label>
            <input type="text" name="nombre"/><br>
            <label>Contraseña: </label>
            <input type="password" name="password"/><br><br>
            <input type="submit" name="iniciar" value="iniciar"/>
         </form>
      </div>
   </body>
</html>
