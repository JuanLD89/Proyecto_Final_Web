<?php

// Funcionamiento del carrito:
// Se debe activar las sesiones de php
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){ //se valida si existe el id y si lo que se envia por la url es de tipo numérico
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $consola = new consolasretro\Consola;
    $resultado = $consola->mostrarPorId($id); // valida si el producto existe

    if(!$resultado)
        header('Location: index.php');

    if(isset($_SESSION['carrito'])){        //si el carrito existe
        if(array_key_exists($id,$_SESSION['carrito'])){ //si la consola existe en el carrito
            actualizarConsola($id);
        }else{  //si el carrito no existe en el carrito
            agregarConsola($resultado, $id);
        }
    }else{  //si el carrito no existe
        agregarConsola($resultado, $id);           
    }

           
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
          <a class="navbar-brand" href="index.php">Consolas Retro</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="" class="btn">CARRITO <span class="badge"><?php print cantidadConsolas(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Consola o videojuego</th>
            <th>Foto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
              $c=0;
              foreach ($_SESSION['carrito'] as $indice => $value) {
                  $c++;
                  $total = $value['precio'] * $value['cantidad'];
          ?>
          <tr>
            <form action="actualizar_carrito.php" method="post">
            <td>
              <?php
                print $c
              ?>
            </td>
            <td>
              <?php
                print $value['consola']
              ?>
            </td>
            <td>
              <?php
                $foto = 'upload/'.$value['foto'];
                if(file_exists($foto)){
              ?>
              <img src="<?php print $foto; ?>" width="150" height="130">
              <?php
                } else{
              ?>
              <img src="assets/imagenes/not-found.jpg" width="150" height="130">
              <?php
                }
              ?>
            </td>
            <td>
              <?php
                print $value['precio']
              ?>
            </td>
            <td>
              <input type="hidden" name="id" value="<?php print $value['id'] ?>">
              <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
            </td>
            <td>
              <?php
                print $total
              ?>
            </td>
            <td>
              <button type="submit" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-refresh"></span>
              </button>

              <a href="eliminar_carrito.php?id=<?php print $value['id'] ?>" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            </td>
            </form>
          </tr>
          <?php
            }
            }else{

            
          ?>
            <tr>
              <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>
            </tr>
          <?php
            }
          ?>
          
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="text-right">Total</td>
            <td><?php print calcularTotal(); ?></td>
            <td></td>
          </tr>
        </tfoot>
      </table>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
