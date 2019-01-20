<?php
	require("../bd/conexion.php");

	$id_matricula = $_POST["id"];
	$alum_carnet = $_POST["carnet"];
	$id_docente = $_POST["docente"];
	$id_grado = $_POST["grado"];
	$fecha = $_POST["fecha"];

	$query = "UPDATE matricula SET alum_carnet = '$alum_carnet', id_docente = '$id_docente', id_grado = '$id_grado', fecha_matricula = '$fecha' WHERE id_matricula = '$id_matricula'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo
			"
			<script>
				alert('Matricula Actualizado');
				window.location='../templates/mostrar_matricula.php'
			</script>
			";
	}else{
		echo
			"
			<script>
				alert('Matricula no Actualizado');
				window.location='../templates/mostrar_matricula.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>
