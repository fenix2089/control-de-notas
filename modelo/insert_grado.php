<?php
	include("../bd/conexion.php");

	$id_grado = $_POST['id_grado'];
	$nombre = $_POST['nombre'];
	$year = $_POST['year'];
	/*$direccion = $_POST['dir'];
	$telefono = $_POST['tel'];*/

	$query = "INSERT INTO grado (id_grado, grado, year/*, direccion, telefono*/) VALUES ('$id_grado', '$nombre', '$year'/*, '$direccion', '$telefono'*/)";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Grado Registrado');
					window.location='../templates/mostrar_grado.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Grado no Registrado');
					window.location='../templates/mostrar_grado.php'
				</script>
			";
	}

?>
