<?php

	require('../bd/conexion.php');
	$id_matricula= $_GET["id"];
	$consult = pg_query("SELECT * FROM nota WHERE id_matricula = '$id_matricula'");

	$contar = pg_num_rows($consult);

	if($contar == 0){
		$query = "DELETE FROM matricula WHERE id_matricula = '$id_matricula'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo
				"
				<script>alert('Matricula Eliminada');
					window.location='../templates/mostrar_matricula.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Matricula Eliminada');
					window.location='../templates/mostrar_matricula.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que la matricula se encuentra registrado en otras tablas');
				window.location='../templates/mostrar_matricula.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>
