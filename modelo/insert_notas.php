<?php
	include("../bd/conexion.php");

	$id_asignatura = $_POST['id_asignatura'];
	$id_matricula = $_POST['id_matricula'];
	$nota1 = $_POST['nota1'];
	$nota2 = $_POST['nota2'];
	$nota3 = $_POST['nota3'];
  $nota4 = $_POST['nota4'];
  $nota5 = $_POST['nota5'];
  $p = (($nota1 * 0.20)+($nota2 * 0.20)+($nota3 * 0.20)+($nota4 * 0.20)+($nota5 * 0.20));

	$query = "INSERT INTO nota (id_asignatura, id_matricula, cali1, cali2, cali3, cali4, cali5, prom) VALUES ('$id_asignatura', '$id_matricula', '$nota1', '$nota2', '$nota3', '$nota4', '$nota5', '$p')";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Notas Registradas');
					window.location='../templates/mostrar_notas.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('notas no Registradas');
					window.location='../templates/mostrar_notas.php'
				</script>
			";
	}

?>
