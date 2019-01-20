<?php
	require ("../bd/conexion.php");

	$grado = $_POST['grado'];

	$year = $_POST['year'];

	$cons_grado = pg_query($dbconn, "SELECT * FROM reporte WHERE grado='$grado' and year='$year'");

	$total = pg_num_rows($cons_grado);

	if ($total != 0) {

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte</title>
</head>
<body>
	<h4>Listado de alumnos por grado</h4><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>N°</th>
				<th>Alumno</th>
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
				<td><?php echo $cont; ?></td>
				<td><?php echo $row['alumno']; ?></td>
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
	<a href="principal.php"><button>Regresar</button></a>

</body>
</html>
