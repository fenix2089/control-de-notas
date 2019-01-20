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

	$id_mate = $_GET["id"];

	$result = pg_query($dbconn, "SELECT * FROM materia WHERE id_materia = '$id_mate'")or die("Error al consultar la materia:".pg_last_error());
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar Materia</title>
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
		                        <h4 class="title">Modificar materia</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/update_materia.php" method="POST">
								<?php
								while ($row = pg_fetch_assoc($result)) {
									# code...

								?>
									<label>ID</label><br>
									<div class="form-group">
										<input type="text" hidden id="id" name="id" required value="<?php echo $row['id_materia'];?>">
									</div><br>
									<label>Nombre</label><br>
									<div class="form-group">
										<input type="text" id="nom" name="nom" required value="<?php echo $row['nombre_materia'];?>">
									</div><br>
								<?php
									}
								?>

									<button class="btn btn-success" type="submit" name="UP_Materia">Guardar</button>
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
