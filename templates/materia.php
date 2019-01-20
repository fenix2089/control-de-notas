<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Materia</title>
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
		                        <h4 class="title">Registro de Materias</h4>
														<a href="mostrar_materia.php"> <button class="btn btn-info pull-right">Mostrar materias</button></a>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/insert_materia.php" method="POST">
									<label>ID</label><br>
									<div class="form-group">
										<input type="text" id="id_mate" class="form-control" name="id_mate" required>
									</div><br>
									<label>Nombre Materia</label><br>
									<div class="form-group">
										<input type="text" id="nom" class="form-control" name="nom" required>
									</div><br><!--
									<label>Password</label><br>
									<div class="form-group">
										<input type="text" id="pass" class="form-control" name="pass" required>
									</div><br>
									<label>Confirmación Password</label><br>
									<div class="form-group">
										<input type="text" id="passs" class="form-control" name="passs" required>
									</div><br>
									<label>Tipo</label><br>
									<div class="form-group">
										<input type="text" id="tipo" class="form-control" name="tipo" required>
									</div><br>-->

									<button class="btn btn-success" type="submit" name="G_Materia">Guardar</button>
								</form>
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
