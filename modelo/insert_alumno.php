<?php
	include("../bd/conexion.php");

	$carnet = $_POST['id'];
	$nombre = $_POST['nom'];
	$apellido = $_POST['ape'];
	$direccion = $_POST['dir'];
	$telefono = $_POST['tel'];

	$query = "INSERT INTO alumnos (alum_carnet, nombre, apellido, direccion, telefono) VALUES ('$carnet', '$nombre', '$apellido', '$direccion', '$telefono')";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Alumno Registrado');
					window.location='../templates/mostrar_alumno.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Alumno no Registrado');
					window.location='../templates/mostrar_alumno.php'
				</script>
			";
	}

?>
