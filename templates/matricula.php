<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<?php
	require ("../bd/conexion.php");
	$result = pg_query($dbconn, "SELECT * FROM matricula order by id_matricula");

	$cons_alum = pg_query($dbconn, "SELECT * FROM alumnos order by alum_carnet");
	$cons_docente = pg_query($dbconn, "SELECT * FROM docente order by id_docente");
	$cons_grado = pg_query($dbconn, "SELECT * FROM grado order by id_grado");

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Matricula</title>
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
		                        <h4 class="title">Ingresar Matricula</h4>
														<a href="mostrar_matricula.php"> <button class="btn btn-info pull-right">Mostrar matricula</button></a>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/insert_matricula.php" method="POST">
									<label>ID</label><br>
									<div class="form-group">
										<input class="form-control" type="int" id="id" name="id" required>
									</div><br>
									<label>Alumno Carnet</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="carnet" name="carnet" required><br>

									</div>
									<label>Docente</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="docente" name="docente" required><br>

									</div>
									<label>Grado</label><br>
									<div class="form-group">
										<input class="form-control" type="text" id="grado" name="grado" required><br>

									</div>
									<label>Fecha</label><br>
									<div class="form-group">
										<input class="form-control" type="date" id="fecha" name="fecha" required><br>
									</div>

									<button class="btn btn-success" type="submit" name="G_matricula">Guardar</button>
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
