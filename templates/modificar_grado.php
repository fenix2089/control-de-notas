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

	$id_grado = $_GET["id"];

	$result = pg_query($dbconn, "SELECT * FROM grado WHERE id_grado = '$id_grado'")or die("Error al consultar el grado:".pg_last_error());
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar Grado</title>
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
		                        <h4 class="title">Modificar Grado</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/update_grado.php" method="POST">
								<?php
								while ($row = pg_fetch_assoc($result)) {
									# code...

								?>
									<label>ID</label><br>
									<div class="form-group">
										<input type="text" hidden id="id" name="id" required value="<?php echo $row['id_grado'];?>">
									</div><br>
									<label>Nombre</label><br>
									<div class="form-group">
										<input type="text" id="nombre" name="nombre" required value="<?php echo $row['grado'];?>">
									</div><br>
									<label>Año</label><br>
									<div class="form-group">
										<input type="text" id="year" class="form-control" name="year" required value="<?php echo $row['year'];?>">
									</div><br>
								<?php
									}
								?>

									<button class="btn btn-success" type="submit" name="UP_Grado">Guardar</button>
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
