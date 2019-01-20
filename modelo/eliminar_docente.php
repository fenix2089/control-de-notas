<?php

	require('../bd/conexion.php');
	$id_docente = $_GET["id"];
	$consult = pg_query("SELECT * FROM matricula WHERE id_docente = '$id_docente'");

	$contar = pg_num_rows($consult);

	if($contar == 0){
		$query = "DELETE FROM docente WHERE id_docente = '$id_docente'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo
				"
				<script>alert('Docente Eliminado/a');
					window.location='../templates/mostrar_docente.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Docente no Eliminado/a');
					window.location='../templates/mostrar_docente.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que el docente se encuentra registrado en otras tablas');
				window.location='../templates/mostrar_docente.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>
