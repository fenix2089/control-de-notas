<?php 

	require('../bd/conexion.php');
	$id_grado = $_GET["id"];
	$consult = pg_query("SELECT * FROM matricula WHERE id_grado = '$id_grado'");

	$contar = pg_num_rows($consult);
	if($contar == 0){
		$query = "DELETE FROM grado WHERE id_grado = '$id_grado'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo 
				"
				<script>alert('Grado Eliminado');
					window.location='../templates/mostrar_grado.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Grado no Eliminado');
					window.location='../templates/mostrar_grado.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que el grado se encuentra registrada en otras tablas');
				window.location='../templates/mostrar_grado.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>