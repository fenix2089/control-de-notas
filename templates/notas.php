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
	<title>Registro de notas</title>
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
													<a href="mostrar_notas.php"> <button class="btn btn-info pull-right">Mostrar notas</button></a>
		                        <h4 class="title">Ingresar notas</h4>
		                        <p class="category">Bienvenido al control de notas CMDP</p>
		                    </div>
		                    <div class="content table-responsive table-full-width">
								<form class="central" action="../modelo/insert_notas.php" method="POST">
									<label>Id asignatura</label><br>
									<div class="form-group">
										<input class="form-control" type="float" id="id_asignatura" name="id_asignatura" required>
									</div><br>
									<label>Id matricula</label><br>
									<div class="form-group">
										<input class="form-control" type="float" id="id_matricula" name="id_matricula" required><br>
									</div>
									<label>Asistencia</label><br>
									<div class="form-group">
										<input class="form-control" type="float" id="nota1" name="nota1" required><br>
									</div>
									<label>Examenes</label><br>
									<div class="form-group">
										<input class="form-control" type="float" id="nota2" name="nota2" required><br>
									</div>
									<label>Deberes</label><br>
									<div class="form-group">
										<input class="form-control" type="float" id="nota3" name="nota3" required><br>
									</div>
                  <label>Conducta</label><br>
                  <div class="form-group">
                    <input class="form-control" type="float" id="nota4" name="nota4" required><br>
                  </div>
                  <label>Cuaderno</label><br>
                  <div class="form-group">
                    <input class="form-control" type="float" id="nota5" name="nota5" required><br>
                  </div>

									<button class="btn btn-success" type="submit" name="g_notas">Guardar</button>
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
