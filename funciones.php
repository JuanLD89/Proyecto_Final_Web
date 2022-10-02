<?php

    function agregarConsola($resultado, $id, $cantidad=1){
        $_SESSION['carrito'][$id] = array(
            'id' => $resultado['id'],
            'consola' => $resultado['consola'],
            'foto' => $resultado['foto'],
            'precio' => $resultado['precio'],
            'cantidad' => $cantidad            
        );
    }

    function actualizarConsola($id,$cantidad = FALSE){
        if($cantidad){
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;       
        }else{
            $_SESSION['carrito'][$id]['cantidad']+=1;       
        }
    }

    function calcularTotal(){

    }

    function cantidadConsolas(){

    }
?>