<?php
	require("../bd/conexion.php");

	$alum_carnet = $_POST["id"];
	$nombre = $_POST["nom"];
	$apellido = $_POST["ape"];
	$direccion = $_POST["dir"];
	$telefono = $_POST["tel"];

	$query = "UPDATE alumnos SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE alum_carnet = '$alum_carnet'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo
			"
			<script>
				alert('Alumno Actualizado');
				window.location='../templates/mostrar_alumno.php'
			</script>
			";
	}else{
		echo
			"
			<script>
				alert('Alumno no Actualizado');
				window.location='../templates/mostrar_alumno.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>
