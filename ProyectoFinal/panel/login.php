<?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $nombre_usuario = $_POST['nombre_usuario'];
        $clave = $_POST['clave'];
        require '../vendor/autoload.php';
        $usuario = new consolasretro\Usuario;
        $resultado = $usuario->login($nombre_usuario,$clave);

        print '<pre>';
        print_r($resultado);

        if($resultado){
            header('Location: dashboard.php');
        }else{
            exit(json_encode(array('estado'=>FALSE,'mensaje'=>'Error al iniciar sesion')));
        }

   }