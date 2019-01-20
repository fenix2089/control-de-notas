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

	$id_matricula = $_GET["id"];

	$result = pg_query($dbconn, "SELECT * FROM matricula WHERE id_matricula = '$id_matricula'")or die("Error al consultar la matricula:".pg_last_error());

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar Matricula</title>
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
		                        <h4 class="title">Modificar Matricula</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/update_matricula.php" method="POST">
								<?php
								while ($row = pg_fetch_assoc($result)) {
									# code...

								?>
									<label>ID</label><br>
									<div class="form-group">
										<input type="text" hidden id="id" name="id" required value="<?php echo $row['id_matricula'];?>">
									</div><br>
									<label>Carnet</label><br>
									<div class="form-group">
										<input type="text" id="carnet" name="carnet" required value="<?php echo $row['alum_carnet'];?>">
										<br>
									</div><br>
									<label>Docente</label><br>
									<div class="form-group">
										<input type="text" id="docente" name="docente" required value="<?php echo $row['id_docente'];?>">
										<br>

									</div>
									<label>Grado</label><br>
									<div class="form-group">
										<input type="text" id="grado" name="grado" required value="<?php echo $row['id_grado'];?>">
										<br>

									</div>
									<label>Fecha</label><br>
									<div class="form-group">
										<input type="text" id="fecha" name="fecha" required value="<?php echo $row['fecha_matricula'];?>">
									</div><br>

								<?php
									}
								?>

									<button class="btn btn-success" type="submit" name="UP_matricula">Guardar</button>
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
