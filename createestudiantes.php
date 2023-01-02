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

    <title>crear Placa</title>
  </head>
  <body>
  <div class="container">

  <?php
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
        <div class="col-md-10 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                    Registro estudiantes
                    <a href="index.php" class="btn btn-danger float-end">Regresar a placa provisional</a>
                    </h3>
                </div>

                <div class="card-body">
                  <form action="guardar.php" method="POST">
                  <div class="mb-3">
                      <label class = "fs-3" for="">Indice:</label>
                      <input type="text" name="indice" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label class = "fs-3" for="">Codigo:</label>
                      <input type="text" name="codigo" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Placa:</label>
                      <input type="text" name="placa" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Tipo de vehiculo:</label>
                      <input type="text" name="vehiculo" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Marca:</label>
                      <input type="text" name="marca" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Modelo:</label>
                      <input type="text" name="modelo" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Color:</label>
                      <input type="text" name="color" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Año:</label>
                      <input type="text" name="año" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3" for="">Chasis:</label>
                      <input type="text" name="chasis" class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class = "fs-3"  for="">Fecha de expiracion:</label>
                      <input type="text" name="expiracion" class="form-control">
                    </div>

                    <div class="mb-3">
                      <button type="submit" name="btnguardar" class="btn btn-primary float-end">Guadar estudiantes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        </div>



        <div class = "col-md-12 mt-5">

          <div class="card">
            <div class="card-header">
              <h3>
                Tabla placas
              </h3>
            </div>

          <div class="card-body">
            <table class="table table-bordered table-striped ">
              <thead>
                <tr class = "text-center">
                  <th>ID</th>
                  <th>Indice</th>
                  <th>Codigo</th>
                  <th>Placa</th>
                  <th>Tipo de vehiculo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Color</th>
                  <th>Año</th>
                  <th>Chasis</th>
                  <th>Fecha de expiracion</th>
                  <th>Opciones</th>
                  
                </tr>
                <?php
                  $res = $conexion->query("SELECT `ID`, `indices`, `codigo`, `placa`, `vehiculo`, `marca`, `modelo`, `color`, `año`, `chasis`, `expiracion` FROM `placa`");
                  while($fila = $res->fetch_object()){
                ?>
                  <tr class = "fs-5">
                    <td><?php echo $fila->ID; ?></td>
                    <td><?php echo $fila->indices; ?></td>
                    <td><?php echo $fila->codigo; ?></td>
                    
                    <td><?php echo $fila->placa; ?></td>
                    <td><?php echo $fila->vehiculo; ?></td>
                    <td><?php echo $fila->marca; ?></td>
                    
                    <td><?php echo $fila->modelo; ?></td>
                    <td><?php echo $fila->color; ?></td>
                    <td><?php echo $fila->año; ?></td>
                    
                    <td><?php echo $fila->chasis; ?></td>
                    <td><?php echo $fila->expiracion; ?></td>
                    <td>
                      <a href ="editarestudiantes.php?id=<?php echo md5($fila->ID); ?>" class = "btn btn-primary">Edictar</a>
                      <a class = "btn btn-danger">borrar</a>
                    </td>
                  </tr>
                <?php 
                  } 
                  ?>
              </thead>
            </table>
          </div>
          </div>
      </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>