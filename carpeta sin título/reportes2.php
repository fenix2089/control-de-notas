<?php
	require ("../bd/conexion.php");
	$cons_grado = pg_query($dbconn, "SELECT * FROM grado order by grado");

?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Reporte</title>
	</head>
	<body>
		<form action="listado2.php" class="central" method="POST">
			<label for="">Buscar alumnos por grado</label><br>
			<select name="grado" id="grado">
				<option value="" disabled selected >Selecione Grado</option>
			<?php
				while ( $row = pg_fetch_assoc($cons_grado)) {

			?>
				<option value="<?php echo $row['id_grado'] ?>" ><?php echo $row['grado'] .' '.$row['year'];?></option>
			<?php
				}
			?>
			</select>



			<button class="btn btn-success" type="submit" name="reportes">Buscar</button>
		</form>
	</body>
</html>
