<?php
	include("../bd/conexion.php");

	$id_mate = $_POST['id_mate'];
	$nombre = $_POST['nom'];
	/*$apellido = $_POST['ape'];
	$direccion = $_POST['dir'];
	$telefono = $_POST['tel'];*/

	$query = "INSERT INTO materia (id_materia, nombre_materia/*, apellido, direccion, telefono*/) VALUES ('$id_mate', '$nombre'/*, '$apellido', '$direccion', '$telefono'*/)";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Materia Registrada');
					window.location='../templates/mostrar_materia.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Materia no Registrada');
					window.location='../templates/mostrar_materia.php'
				</script>
			";
	}

?>
