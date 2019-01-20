<?php 
	require("../bd/conexion.php");

	$id_grado = $_POST["id"];
	$nombre = $_POST["nombre"];
	$year = $_POST["year"];
	/*$tipo = $_POST["tipo"];*/

	$query = "UPDATE grado SET grado = '$nombre', year = '$year' WHERE id_grado = '$id_grado'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo 
			"
			<script>
				alert('Grado Actualizado');
				window.location='../templates/mostrar_grado.php'
			</script>
			";
	}else{
		echo 
			"
			<script>
				alert('Grado no Actualizado');
				window.location='../templates/mostrar_grado.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>