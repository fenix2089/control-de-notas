<?php 
	require("../bd/conexion.php");

	$alumn_carnet = $_POST["id"];
	$nombre = $_POST["nom"];
	$apellido = $_POST["ape"];
	$direccion = $_POST["dir"];
	$telefono = $_POST["tel"];

	$query = "UPDATE alumnos SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE alumn_carnet = '$alumn_carnet'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo 
			"
			<script>
				alert('Alumno Actualizado');
				window.location='../templates/mostrar_alumnos.php'
			</script>
			";
	}else{
		echo 
			"
			<script>
				alert('Alumno no Actualizado');
				window.location='../templates/mostrar_alumnos.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>