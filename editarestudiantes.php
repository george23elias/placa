<?php
    session_start();
    require 'conexion.php';
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>editar Placa</title>
  </head>
  <body>
  <div class="container">

  <?php

    if(isset($_GET['id'])){
      $id = mysqli_real_escape_string($conexion, $_GET['id']);
      $sql = "SELECT `ID` FROM `estudiante` WHERE md5(ID)='$id'";
      $red = $conexion->query($sql);

      if($red->num_rows>0){
      }else{
          $_session['mensaje'] = "no se guardo nada";
          $_session['error'] = true;
          header("location:index.php");
          exit;
      }

    }



    if (isset($_SESSION['mensaje'])) {
      if (!$_SESSION['mensaje']) {
        ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['mensaje'];?>
        </div>
        <?php
      }else{
        ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION['mensaje'];?>
        </div>
        <?php
      }
      unset($_SESSION['mensaje']);
      unset($_SESSION['error']);
    }
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                    editar estudiantes
                    <a href="index.php" class="btn btn-danger float-end">Regresar</a>
                    </h3>
                </div>

                <div class="card-body">
                  <form action="guardar.php" method="POST">
                    <div class="mb-3">
                      <label for="">Nombre estudiantes:</label>
                      <input type="text" name="nombre" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label for="">apellido estudiantes:</label>
                      <input type="text" name="apellido" class="form-control">
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="btnguardar" class="btn btn-primary">Guadar estudiantes</button>
                    </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>