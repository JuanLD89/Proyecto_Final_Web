<?php
require '../../vendor/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];

  $consola = new consolasretro\Consola;
  $resultado = $consola->mostrarPorId($id);

  if(!$resultado)
  header('Location: index.php');
}
else{
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consolas Retro</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard.php">Consolas Retro</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="../pedidos/index.php" class="btn">Pedidos</a>
            </li> 
            <li class="active">
              <a href="index.php" class="btn">Consolas</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Cerrar Sesión</a></li>
                </ul>
            </li> 
          </ul>



        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
        <div class="row">
          <div class="col-md-12">
            <fieldset>
                <legend>Datos de la consola</legend>
                <form method="POST" action="../acciones.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">
                  <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre de la Consola</label>
                                <input value="<?php print $resultado['consola'] ?>" type="text" class="form-control" name="consola"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Descripcion de la Consola</label>
                                <textarea class="form-control" name="descripcion" id="" cols="3" required><?php print $resultado['descripcion'] ?></textarea>                 
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Empresa</label>
                                <select class="form-control" name="empresas" required>
                                    <option value="">--SELECCIONE--</option>
                                    <?php
                                    require '../../vendor/autoload.php';
                                    $empresa = new consolasretro\Empresa;                
                                    $info_empresa = $empresa->mostrar();

                                    $cantidad=count($info_empresa); //almacena todas las empresas
                                    for($x=0; $x<$cantidad;$x++){
                                      $item = $info_empresa[$x];                                    
                                    ?>
                                      <option value="<?php print $item['id'] ?>"
                                        <?php print $resultado['empresas']==$item['id']?'selected':''?>
                                      > <?php print $item['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>                      
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Imagen de la Consola</label>
                                <input type="file" class="form-control" name="foto">
                                <input type="hidden" name="foto_temp" value="<?php print $resultado['foto'] ?>">
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio de la Consola</label>
                                <input value="<?php print $resultado['precio'] ?>" type="text" class="form-control" name="precio" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="accion" class="btn btn-primary" value="Actualizar">             
                    <a href="index.php" class="btn btn-default">Cancelar</a>                
                </form>
            </fieldset>
          </div>
        </div>

        
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

  </body>
</html>