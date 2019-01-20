<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<?php

	require("../bd/conexion.php");
	$result = pg_query($dbconn, "SELECT * FROM nota ORDER BY idnota");

	$total = pg_num_rows($result);

	if ($total != 0) {

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado de notas</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/estilos3.css">
</head>
<body>

<?php include './menu/menu.php'; ?>

<?php include './menu/menu2.php'; ?>

	<div class="main-panel">

		<div class="content">
		    <div class="container-fluid">
		    	<div class="row">
		            <div class="col-md-12">
		                <div class="card">
		                    <div class="header">
		                        <h4 class="title">Datos de las notas</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
		                    	<div class="central">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>N°</th>
												<th>id_asignatura</th>
												<th>id_matricula</th>
												<th>Asistencia</th>
												<th>Cuaderno</th>
												<th>Examenes</th>
												<th>Deberes</th>
                        <th>Conducta</th>
												<th>Promedio</th>
                        <th>Eliminar</th>
                        <th>Modificar</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$cont=0;
											while ($row = pg_fetch_assoc($result)) {
												$cont ++;

										?>
											<tr>
												<td><?php echo $cont; ?></td>
												<td><?php echo $row['id_asignatura']; ?></td>
												<td><?php echo $row['id_matricula']; ?></td>
												<td><?php echo $row['cali1']; ?></td>
                        <td><?php echo $row['cali2']; ?></td>
                        <td><?php echo $row['cali3']; ?></td>
                        <td><?php echo $row['cali4']; ?></td>
                        <td><?php echo $row['cali5']; ?></td>
                        <td><?php echo $row['prom']; ?></td>
												<td><a href="../modelo/eliminar_notas.php?id=<?php echo $row['idnota']; ?>" onClick="return confirm('Esta seguro en eliminar la nota')"><img src="../img/del.png" width="25" alt="Delete"></a></td>
												<td><a href="./modificar_notas.php?id=<?php echo $row['idnota']; ?>"><img src="../img/upd.png" width="25" alt="Update"></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
									<?php
										}else{
											echo "No se encontraron resultados";
										}
										pg_close($dbconn);
									?>
									<br><br>
									<a href="principal.php"><button>Regresar</button></a>
								</div>
							</div>
		                </div>
		            </div>
				</div>
		    </div>
		</div>
	</div>
</body>
<?php include './menu/footer.php'; ?>


</html>
