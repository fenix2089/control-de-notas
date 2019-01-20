<?php
	include("../bd/conexion.php");

	$id_matricula = $_POST['id'];

	$alum_carnet = $_POST['carnet'];

	$id_docente = $_POST['docente'];

	$id_grado = $_POST['grado'];

	$fecha = $_POST['fecha'];

	$query = "INSERT INTO matricula 
							(id_matricula, alum_carnet, id_docente, id_grado, fecha_matricula) 
				VALUES 
							('$id_matricula', '$alum_carnet', '$id_docente', '$id_grado', '$fecha')";
	$result = pg_query($dbconn, $query) or die ("Error al insertar los datos ".pg_last_error());

	if($result){
		echo"
				<script>
					alert('Matricula Registrada');
					window.location='../templates/mostrar_matricula.php'
				</script>
			";
	}else{
		echo"
				<script>
					alert('Matricula no Registrada');
					window.location='../templates/mostrar_matricula.php'
				</script>
			";
	}

?>