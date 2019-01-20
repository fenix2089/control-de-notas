<?php
	require("../bd/conexion.php");

	$id_docente = $_POST["id"];
	$nombre = $_POST["nom"];
	$apellido = $_POST["ape"];
	$direccion = $_POST["dir"];

	$query = "UPDATE docente SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion' WHERE id_docente = '$id_docente'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo
			"
			<script>
				alert('Docente Actualizado');
				window.location='../templates/mostrar_docente.php'
			</script>
			";
	}else{
		echo
			"
			<script>
				alert('Docente no Actualizado');
				window.location='../templates/mostrar_docente.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>
