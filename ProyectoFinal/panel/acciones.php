<?php

require '../vendor/autoload.php';

$consola = new consolasretro\Consola;

if($_SERVER['REQUEST_METHOD'] === 'POST'){ //Se verifica que la info llegue a través del método post

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['consola']))
            exit('Completar nombre de consola');

        if(empty($_POST['descripcion']))
            exit('Completar titulo');
        
        if(empty($_POST['empresas']))
            exit('Seleccionar una empresa');

        if(!is_numeric($_POST['empresas']))
            exit('Seleccionar una empresa válida');

        $_params = array(
            'consola'=> $_POST['consola'],
            'descripcion'=> $_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=> $_POST['precio'],
            'empresas'=> $_POST['empresas'],
            'fecha'=> date('Y-m-d')
        );
        $rpt = $consola->registrar($_params);

        var_dump($rpt); //muestra el tipo de dato de la variable y la longitud
    }

}
function subirFoto(){  
    $carpeta = __DIR__.'/../upload/';
    $archivo = $carpeta.$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];

}