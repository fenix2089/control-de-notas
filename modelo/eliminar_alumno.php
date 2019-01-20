<?php

	require('../bd/conexion.php');
	$alum_carnet= $_GET["id"];
	$consult = pg_query("SELECT * FROM matricula WHERE alum_carnet = '$alum_carnet'");

	$contar = pg_num_rows($consult);

	if($contar == 0){
		$query = "DELETE FROM alumnos WHERE alum_carnet = '$alum_carnet'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo
				"
				<script>alert('Alumno Eliminado/a');
					window.location='../templates/mostrar_alumno.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Alumno Eliminado/a');
					window.location='../templates/mostrar_alumno.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que el alumno se encuentra registrado en otras tablas');
				window.location='../templates/mostrar_alumno.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>
