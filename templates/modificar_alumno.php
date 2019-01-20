<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<?php
	require("../bd/conexion.php");

	$alumn_carnet = $_GET["id"];

	$result = pg_query($dbconn, "SELECT * FROM alumnos WHERE alum_carnet = '$alumn_carnet'")or die("Error al consultar el alumno:".pg_last_error());
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar Alumnos</title>
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
		                        <h4 class="title">Modificar Alumno</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/update_alumno.php" method="POST">
								<?php
								while ($row = pg_fetch_assoc($result)) {
									# code...

								?>
									<label>Carnet</label><br>
									<div class="form-group">
										<input type="text" hidden id="id" name="id" required value="<?php echo $row['alum_carnet'];?>">
									</div><br>
									<label>Nombres</label><br>
									<div class="form-group">
										<input type="text" id="nom" name="nom" required value="<?php echo $row['nombre'];?>">
									</div><br>
									<label>Apellidos</label><br>
									<div class="form-group">
										<input type="text" id="ape" name="ape" required value="<?php echo $row['apellido'];?>">
									</div><br>
									<label>Dirección</label><br>
									<div class="form-group">
										<textarea id="dir" name="dir" cols="19" rows="5"><?php echo $row['direccion'];?></textarea>
									</div><br>
									<label>Teléfono</label><br>
									<div class="form-group">
										<input type="int" id="tel" name="tel" required value="<?php echo $row['telefono'];?>">
									</div><br>
								<?php
									}
								?>

									<button class="btn btn-success" type="submit" name="UP_Alumno">Guardar</button>
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
