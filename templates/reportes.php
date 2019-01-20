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
	$cons_grado = pg_query($dbconn, "SELECT distinct grado, year FROM grado order by grado");
	$amo = pg_query($dbconn, "SELECT distinct year FROM grado");
	$docente = pg_query($dbconn, "SELECT distinct nombre, apellido FROM docente");
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Reporte</title>
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
			                        <h4 class="title">Reportes de notas</h4>
			                        <p class="category">Bienvenido al control de notas CMDP</p>
			                    </div>
			                    <div class="content table-responsive table-full-width">
									<form action="listado.php" class="central" method="POST">
										<label for="">Buscar por:</label><br>
										<select name="grado" id="grado">
											<option value="" disabled selected >Selecione Grado</option>
										<?php
											while ( $row = pg_fetch_assoc($cons_grado)) {

										?>
											<option><?php echo $row['grado'];?></option>
										<?php
											}
										?>
										</select>
										<select name="year" id="year">
											<option value="" disabled selected >Selecione Año</option>
										<?php
											while ( $row = pg_fetch_assoc($amo)) {

										?>
											<option ><?php echo $row['year'];?></option>
										<?php
											}
										?>
										</select>

										<br><br>


										<select name="docente" id="docente">
											<option value="" disabled selected >Selecione Docente</option>
										<?php
											while ( $row = pg_fetch_assoc($docente)) {

										?>
											<option><?php echo $row['nombre'].' '.$row['apellido'];?></option>
										<?php
											}
										?>
										</select>
										<button class="btn btn-success" type="submit" name="reportes">Buscar</button>
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
