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

    function calcularTotal(){

    }

    function cantidadConsolas(){

    }