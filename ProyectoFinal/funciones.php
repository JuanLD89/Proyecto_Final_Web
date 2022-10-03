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
        $total=0;
        if(isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $indice => $value){
                $total += $value['precio'] * $value['cantidad']; 
            }
        }
        return $total;
    }

    function cantidadConsolas(){
        $cantidad=0;
        if(isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $indice => $value){
                $cantidad++;
            }
        }
        return $cantidad;
    }

?>