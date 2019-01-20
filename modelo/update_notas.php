<?php
	require("../bd/conexion.php");

  $idnota = $_POST['idnota'];
  $id_asignatura = $_POST['id_asignatura'];
	$id_matricula = $_POST['id_matricula'];
	$nota1 = $_POST['cali1'];
	$nota2 = $_POST['cali2'];
	$nota3 = $_POST['cali3'];
  $nota4 = $_POST['cali4'];
  $nota5 = $_POST['cali5'];
  $p = (($nota1 * 0.20)+($nota2 * 0.20)+($nota3 * 0.20)+($nota4 * 0.20)+($nota5 * 0.20));

	$query = "UPDATE nota SET id_asignatura = '$id_asignatura', id_matricula = '$id_matricula', cali1 = '$nota1', cali2 = '$nota2', cali3 = '$nota3', cali4 = '$nota4', cali5 = '$nota5', prom = '$p' WHERE idnota = '$idnota'";

	$result = pg_query($dbconn, $query) or die("Error al actualizar los datos:".pg_last_error());

	if($result){
		echo
			"
			<script>
				alert('Notas Actualizadas');
				window.location='../templates/mostrar_notas.php'
			</script>
			";
	}else{
		echo
			"
			<script>
				alert('Notas no Actualizadas');
				window.location='../templates/mostrar_notas.php'
			</script>
			";
	}

	pg_free_result($result);

	pg_close($dbconn);
?>
