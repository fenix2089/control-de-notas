<?php
	require ("../bd/conexion.php");

	$grado = $_POST["grado"];

	$year = $_POST["year"];

	$cons_grado = pg_query($dbconn, "SELECT distinct alumno, grado, year FROM reporte WHERE grado='$grado', year='$year' order by alumno");

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
				<!--<th>Alumno</th>-->
				<th>Grado</th>
				<th>Año</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$cont=0;
			while ($row = pg_fetch_assoc($cons_grado) /*or $row2 = pg_fetch_assoc($cons_alumnos)*/) {
				$cont ++;

		?>
			<tr>
				<td><?php echo $cont; ?></td>
				<!--<td><?php echo $row2['nombre']. ' '.$row['apellido']; ?></td>-->
				<td><?php echo $row['grado']; ?></td>
				<td><?php echo $row['year']; ?></td>
			</tr>
		</tbody>
	</table>
	<?php
	}
		}else{
			echo "No se encontraron resultados";
		}

		pg_close($dbconn);
	?>
	<br><br>
	<a href="principal.php"><button>Regresar</button></a>

</body>
</html>
