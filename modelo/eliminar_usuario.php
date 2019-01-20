<?php 

	require('../bd/conexion.php');
	$user_id = $_GET["user_id"];
	$consult = pg_query("SELECT * FROM usuarios WHERE user_id = '$user_id'");

	$contar = pg_num_rows($consult);

	if($contar == 0){
		$query = "DELETE FROM usuarios WHERE user_id = '$user_id'";
		$result = pg_query($dbconn, $query);

		if ($result) {
			echo 
				"
				<script>alert('Usuario Eliminado/a');
					window.location='../templates/mostrar_usuario.php'
				</script>
				";
		}else{
			echo
				"
				<script>alert('Usuario no Eliminado/a');
					window.location='../templates/mostrar_usuario.php'
				</script>
				";
		}
	}else{
		echo
			"
			<script>
				alert('Imposible eliminar ya que el usuario se encuentra registrado en otras tablas');
				window.location='../templates/mostrar_usuario.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);

?>