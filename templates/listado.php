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

	$grado = $_POST['grado'];

	$year = $_POST['year'];

	$docente = $_POST['docente'];

	$cons_grado = pg_query($dbconn, "SELECT * FROM reporte WHERE grado='$grado' and year='$year' and docente='$docente'");

	$total = pg_num_rows($cons_grado);

	if ($total != 0) {

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
			                        <h4 class="title">Reportes de alumnos por grado</h4>
			                        <p class="category">Bienvenido al control de notas CMDP</p>
			                    </div>
			                    <div class="content table-responsive table-full-width">
									<table class="table table-striped">
										<thead>
											<tr>
												Docente:
											</tr>
											<tr>

												<th>N°</th>
												<th>Carnet</th>
												<th>Alumno</th>
												<th>Materia</th>
												<th>Nota 1</th>
												<th>Nota 2</th>
												<th>Nota 3</th>
												<th>Nota 4</th>
												<th>Nota 5</th>
												<th>Promedio</th>
												<th>Grado</th>
												<th>Año</th>
											</tr>
										</thead>
										<tbody>


										<?php
											$cont=0;
											while ($row = pg_fetch_assoc($cons_grado)) {
												$cont ++;

										?>
										<tr>

											<?php echo $row['docente']; ?>
										</tr>
											<tr>
												<td><?php echo $cont; ?></td>
												<td><?php echo $row['carnet']; ?></td>
												<td><?php echo $row['alumno']; ?></td>
												<td><?php echo $row['materia']; ?></td>
												<td><?php echo $row['n1']; ?></td>
												<td><?php echo $row['n2']; ?></td>
												<td><?php echo $row['n3']; ?></td>
												<td><?php echo $row['n4']; ?></td>
												<td><?php echo $row['n5']; ?></td>
												<td><?php echo $row['promedio']; ?></td>
												<td><?php echo $row['grado']; ?></td>
												<td><?php echo $row['year']; ?></td>
											</tr>
											<?php
												}
											?>

										</tbody>
									</table>
									<?php
										}else{
											echo "No se encontraron resultados";
										}
										pg_close($dbconn);
									?>
									<br><br>
									<a href="reportes.php"><button>Regresar</button></a>
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
