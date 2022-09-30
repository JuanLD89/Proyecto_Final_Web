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

        if ($rpt)
            header('Location: consolas/index.php');
        else
            print 'Error al registrar la consola';    
    }

    if ($_POST['accion']==='Actualizar'){

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
            'precio'=> $_POST['precio'],
            'empresas'=> $_POST['empresas'],
            'fecha'=> date('Y-m-d'),
            'id'=>$_POST['id'],
        );

        if(!empty($_POST['foto_temp']))
            $_params['foto'] = $_POST['foto_temp'];
        
        if(!empty($_FILES['foto']['name']))
            $_params['foto'] = subirFoto();

        $rpt = $consola->actualizar($_params);

        

        var_dump($rpt);
        if ($rpt)
            header('Location: consolas/index.php');
        else
            print 'Error al actualizar la consola';   
    }

}

if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $id = $_GET['id'];

    $rpt = $consola->Eliminar($id);

    if ($rpt)
        header('Location: consolas/index.php');
    else
        print 'Error al eliminar la consola';
}

function subirFoto(){  
    $carpeta = __DIR__.'/../upload/';
    $archivo = $carpeta.$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];

}