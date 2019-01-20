<?php

	require('../bd/conexion.php');
	$idnota= $_GET["id"];
	$consult = pg_query("SELECT * FROM nota WHERE idnota = '$idnota'");

	$contar = pg_num_rows($consult);

	if($contar == 0){
		$query = "DELETE FROM nota WHERE idnota = '$idnota'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo
				"
				<script>alert('Nota Eliminada');
					window.location='../templates/mostrar_notas.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Nota Eliminada');
					window.location='../templates/mostrar_notas.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que la nota encuentra registrado en otras tablas');
				window.location='../templates/mostrar_notas.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>
