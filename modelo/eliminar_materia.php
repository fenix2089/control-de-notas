<?php 

	require('../bd/conexion.php');
	$id_mate = $_GET["id"];
	$consult = pg_query("SELECT * FROM nota WHERE id_asignatura = '$id_mate'");

	$contar = pg_num_rows($consult);
	if($contar == 0){
		$query = "DELETE FROM materia WHERE id_materia = '$id_mate'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo 
				"
				<script>alert('Materia Eliminada');
					window.location='../templates/mostrar_materia.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Materia no Eliminada');
					window.location='../templates/mostrar_materia.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que la materia se encuentra registrada en otras tablas');
				window.location='../templates/mostrar_materia.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>