<?php
require ('../bd/conexion.php');
?>
<?php
session_start();
$tipo = $_SESSION['tipo'];
if ($tipo == "operador") {
	header("Location: ../index.php");
	exit();
	}
elseif(isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}

?>
<?php
if (isset($_REQUEST['registrar']) && isset($_REQUEST['reg_agree'])) {
	if ($_REQUEST['contrasena'] === $_REQUEST['contrasenaConfirmar']) {
	$id = $_REQUEST['id'];
	$usuario = $_REQUEST['usuario'];
	$password = $_REQUEST['contrasena'];
	$tipo = $_REQUEST['tipo'];

	$encriptar = password_hash($password, PASSWORD_BCRYPT, ["cost" => '11']);
	$query = ("INSERT INTO usuarios (user_id, nombre, password, tipo) VALUES ('$id', '$usuario', '$encriptar', '$tipo')");
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());
	$_SESSION['logged'] = "Logged";
	$_SESSION['id'] = $id;
	$_SESSION['usuario'] = $usuario;
	$_SESSION['contrasena'] = $encriptar;
	$_SESSION['tipo'] = $tipo;
	header("Location: principal.php");
	} else {
		echo "<div class='error'><span>Las Contraseñas no son iguales</span></div>";
	}
} elseif (isset($_REQUEST['registrar']) && isset($_REQUEST['reg_agree']) === FALSE) {
	echo "<div class='error'><span>Necesitas Estar de Acuerdo con los Términos y Condiciones</span></div>";
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuarios</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos3.css">
</head>
<body>

<?php include './menu/menu.php'; ?>

<?php include './menu/menu2.php'; ?>

	<div class="main-panel">

		<div class="content">
		    <div class="container-fluid">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="card">
		                    <div class="header">
		                        <h4 class="title">Usuarios</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form id="register-form" class="central"  method="POST">
									<label>ID</label><br>
									<div class="form-group">
										<input type="int" id="id_user" class="form-control" name="id" required>
									</div><br>
									<label>usuario</label><br>
									<div class="form-group">
										<input type="text" id="reg_username" class="form-control" name="usuario" required>
									</div><br>
									<label>Password</label><br>
									<div class="form-group">
										<input type="password" id="reg_password" class="form-control" name="contrasena" required>
									</div><br>
									<label>Confirmar contraseña</label><br>
									<div class="form-group">
										<input type="password" class="form-control" name="contrasenaConfirmar" id="reg_agree"  placeholder="confirme contraseña" required>
									</div><br>
									<label>Tipo</label><br>
									<div class="form-group">
										<select class="form-control" name="tipo">
											<option value="admin">admin</option>
											<option value="operador">operador</option>
										</select>
									</div><br>
									<div class="form-group login-group-checkbox">
									<input type="checkbox" class="" id="reg_agree" name="reg_agree">
									<label for="reg_agree">De acuerdo con los términos y condiciones</label>
									</div>

									<button class="btn btn-success" type="submit" name="registrar">Enviar</button>
								</form>
		                    </div>
		                </div>
		            </div>
				</div>
		    </div>
		</div>
	</div>
</body>
<?php include './menu/footer.php'; ?>
</html>
