<?php
	include("../bd/conexion.php");

	$id_user = $_POST['id_user'];
	$nombre = $_POST['nom'];
	$password = $_POST['pass'];
	$tipo = $_POST['tipo'];

	$query = "INSERT INTO usuarios (user_id, nombre, password, tipo) VALUES ('$id_user', '$nombre', '$password', '$tipo')";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Usuario Registrado');
					window.location='../templates/mostrar_usuario.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Usuario no Registrado');
					window.location='../templates/mostrar_usuario.php'
				</script>
			";
	}

?>