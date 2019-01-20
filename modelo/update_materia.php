<?php 
	require("../bd/conexion.php");

	$id_mate = $_POST["id"];
	$nombre = $_POST["nom"];
	/*$password = $_POST["pass"];
	$tipo = $_POST["tipo"];*/

	$query = "UPDATE materia SET nombre_materia = '$nombre' WHERE id_materia = '$id_mate'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo 
			"
			<script>
				alert('Materia Actualizada');
				window.location='../templates/mostrar_materia.php'
			</script>
			";
	}else{
		echo 
			"
			<script>
				alert('Materia no Actualizada');
				window.location='../templates/mostrar_materia.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>