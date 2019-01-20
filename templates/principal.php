<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
<?php require('../bd/conexion.php'); ?>


<!doctype html>
<html lang="en">
<?php include './menu/menu.php'; ?>

<?php include './menu/menu2.php'; ?>


<div class="main-panel">

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Control de notas</h4>
                            <p class="category">Bienvenido al control de notas CMDP</p>
                        </div>
                        <div class="content table-responsive table-full-width">
														<center><img src="../img/1.jpg" width="170px" height="170px" alt="mundo"></center>
														<center><h3 class="title">Bienvenido al control de notas CDMP</h3></center>
														<center><h4 class="card">Mini tutorial</h4></center>
														<ol>
														  <li>Ingresa un alumno en la sección: ingresar estudiante</li>
														  <li>Ingresa un grado en la sección: grados</li>
														  <li>Ingresa una materia en la sección: materias </li>
														  <li>Ingresa tu matricula con los datos anteriores en la sección: matriculas</li>
														  <li>Ingresa las notas con los datos anteriores en la sección: notas</li>
														  <li>Si deseas ver un reporte de notas tienes la sección: reporte de notas</li>
														</ol>
														<blockquote>
														  <p>Recuerda, tanto el usuario como el docente lo maneja el usuario administrador y el administrador debe de proporcionarte el id del docente</p>
														</blockquote>
														<center><h4 class="card">ULS BD2</h4></center>
														<center><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">licencia de Creative Commons Reconocimiento-NoComercial 4.0 Internacional</a></center>
                        </div>
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
<script type="text/javascript">
  $(document).ready(function(){

      demo.initChartist();

      $.notify({
          icon: 'ti-user',
          message: "Bienvenido profesor"

        },{
            type: 'success',
            timer: 5.50
        });

  });
</script>


</html>
