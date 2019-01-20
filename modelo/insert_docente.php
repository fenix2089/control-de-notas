<?php
	include("../bd/conexion.php");

	$id_docente = $_POST['id'];
	$nombre = $_POST['nom'];
	$apellido = $_POST['ape'];
	$direccion = $_POST['dir'];

	$query = "INSERT INTO docente (id_docente, nombre, apellido, direccion) VALUES ('$id_docente', '$nombre', '$apellido', '$direccion')";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Docente Registrado');
					window.location='../templates/mostrar_docente.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Docente no Registrado');
					window.location='../templates/mostrar_docente.php'
				</script>
			";
	}

?>
