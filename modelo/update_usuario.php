<?php 
	require("../bd/conexion.php");

	$user_id = $_POST["id"];
	$nombre = $_POST["nom"];
	$password = $_POST["pass"];
	$tipo = $_POST["tipo"];

	$query = "UPDATE usuarios SET nombre = '$nombre', password = '$password', tipo = '$tipo' WHERE user_id = '$user_id'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo 
			"
			<script>
				alert('Usuario Actualizado');
				window.location='../templates/mostrar_usuarios.php'
			</script>
			";
	}else{
		echo 
			"
			<script>
				alert('Usuario no Actualizado');
				window.location='../templates/mostrar_usuarios.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>