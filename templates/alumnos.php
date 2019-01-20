<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Alumnos</title>
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
													<a href="mostrar_alumno.php"> <button class="btn btn-info pull-right">Mostrar alumnos</button></a>
		                        <h4 class="title">Ingresar Alumno</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/insert_alumno.php" method="POST">
									<label>Carnet</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="id" name="id" required>
									</div><br>
									<label>Nombres</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="nom" name="nom" required><br>
									</div>
									<label>Apellidos</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="ape" name="ape" required><br>
									</div>
									<label>Dirección</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="dir" name="dir" required><br>
									</div>
									<label>Teléfono</label><br>
									<div class="form-group">
										<input class="form-control" type="int" id="tel" name="tel" required><br>
									</div>

									<button class="btn btn-success" type="submit" name="G_Alumno">Guardar</button>
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
