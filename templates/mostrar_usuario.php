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
	$result = pg_query($dbconn, "SELECT * FROM usuarios ORDER BY user_id");

	$total = pg_num_rows($result);

	if ($total != 0) {
		# code...

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Alumnos</title>
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
		                        <h4 class="title">Datos Usuarios</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
		                    	<div class="central">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nombre</th>
												<th>Tipo</th>
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
												<td><?php echo $row['user_id']; ?></td>
												<td><?php echo $row['nombre']; ?></td>
												<td><?php echo $row['tipo']; ?></td>
												<td><a href="../modelo/eliminar_usuario.php?id=<?php echo $row['user_id']; ?>" onClick="return confirm('Esta seguro en eliminar al usuario')"><img src="../img/del.png" width="25" alt="Delete"></a></td>
												<td><a href="../modelo/modificar_usuario.php?id=<?php echo $row['user_id']; ?>"><img src="../img/upd.png" width="25" alt="Update"></a></td>
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
