<?php
session_start();
if (isset($_SESSION['logged']) === FALSE) {
	header("Location: ../index.php");
}
$usuario = $_SESSION['nombre'];
$contrasena = $_SESSION['password'];
?>
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
            timer: 4000
        });

  });
</script>


</html>
