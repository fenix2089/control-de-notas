<?php
	require ("../bd/conexion.php");
	$cons_grado = pg_query($dbconn, "SELECT distinct grado, year FROM grado order by grado");
	$amo = pg_query($dbconn, "SELECT distinct year FROM grado");
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Reporte</title>
	</head>
	<body>
		<form action="listado.php" class="central" method="POST">
			<label for="">Buscar alumnos por grado</label><br>
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
				<option value="" disabled selected >Selecione Grado</option>
			<?php
				while ( $row = pg_fetch_assoc($amo)) {

			?>
				<option ><?php echo $row['year'];?></option>
			<?php
				}
			?>
			</select>


			<button class="btn btn-success" type="submit" name="reportes">Buscar</button>
		</form>
	</body>
</html>
