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

	$idnota = $_GET["id"];

	$result = pg_query($dbconn, "SELECT * FROM nota WHERE idnota = '$idnota'")or die("Error al consultar el alumno:".pg_last_error());
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
		                        <h4 class="title">Modificar Notas</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/update_notas.php" method="POST">
								<?php
								while ($row = pg_fetch_assoc($result)) {
									# code...

								?>
								<div class="form-group">
									<input type="float" hidden id="idnota" name="idnota" required value="<?php echo $row['idnota'];?>">
								</div><br>
									<label>Id asignatura</label><br>
									<div class="form-group">
										<input type="float" id="id_asignatura" name="id_asignatura" required value="<?php echo $row['id_asignatura'];?>">
									</div><br>
									<label>Id matricula</label><br>
									<div class="form-group">
										<input type="float" id="id_matricula" name="id_matricula" required value="<?php echo $row['id_matricula'];?>">
									</div><br>
									<label>Asistencia</label><br>
									<div class="form-group">
										<input type="float" id="cali1" name="cali1" required value="<?php echo $row['cali1'];?>">
									</div><br>
                  <label>Examenes</label><br>
									<div class="form-group">
										<input type="float" id="cali2" name="cali2" required value="<?php echo $row['cali2'];?>">
									</div><br>
									<label>Deberes</label><br>
									<div class="form-group">
										<input type="float" id="cali3" name="cali3" required value="<?php echo $row['cali3'];?>">
									</div><br>
									<label>Conducta</label><br>
									<div class="form-group">
										<input type="float" id="cali4" name="cali4" required value="<?php echo $row['cali4'];?>">
									</div><br>
									<label>Cuaderno</label><br>
									<div class="form-group">
										<input type="float" id="cali5" name="cali5" required value="<?php echo $row['cali5'];?>">
									</div><br>
								<?php
									}
								?>

									<button class="btn btn-success" type="submit" name="up_guardar">Guardar</button>
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
