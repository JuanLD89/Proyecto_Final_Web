<?php

    namespace consolasretro;

    class Pedido{

        private $config;
        private $cn = null;

        public function __construct(){
         
            $this->config = parse_ini_file(__DIR__.'/../config.ini'); // devuelve el contenido del archivo especificado
            
            $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],
            array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        }
        public function registrar($_params){
            $sql = "INSERT INTO `pedidos`(`cliente_id`, `total`, `fecha`)
            VALUES (:cliente_id,:total,:fecha)";  //Desde SQL se sabe como insertar una nueva consola, no se usa el id, porque este autoincrementa, y tampoco el estado, ya que este tiene un valor predeterminado
            //Lo unico que campoa son los datos depuest de VALUE y esto es porque usamos PDO, y reconoce esos datos como parametros

            $resultado = $this->cn->prepare($sql); //se encarga de devolvernos cual es el resultado final despues de ejecutar la consulta, cn se encarga de tomar la ruta a la base de datos
            //sql se encarga de leer toda la ruta 

            $_array = array(
                ":cliente_id" => $_params['cliente_id'],
                ":total" => $_params['total'],
                ":fecha" => $_params['fecha'],           
            );//se indica cuales son los parametros

            if($resultado->execute($_array))
                return $this->cn->lastInsertId(); // Devuelve el ultimo Id que se ha insertado

            return false;
        }

        public function registrarDetalle($_params){
            $sql = "INSERT INTO `detalle_pedidos`(`pedido_id`, `consola_id`, `precio`, `cantidad`) VALUES (:pedido_id,:consola_id,:precio,:cantidad)";  //Desde SQL se sabe como insertar una nueva consola, no se usa el id, porque este autoincrementa, y tampoco el estado, ya que este tiene un valor predeterminado
            //Lo unico que campoa son los datos depuest de VALUE y esto es porque usamos PDO, y reconoce esos datos como parametros

            $resultado = $this->cn->prepare($sql); //se encarga de devolvernos cual es el resultado final despues de ejecutar la consulta, cn se encarga de tomar la ruta a la base de datos
            //sql se encarga de leer toda la ruta 

            $_array = array(
                ":pedido_id" => $_params['pedido_id'],
                ":consola_id" => $_params['consola_id'],
                ":precio" => $_params['precio'],
                ":cantidad" => $_params['cantidad'],                 
            );//se indica cuales son los parametros

            if($resultado->execute($_array))
                return true;

            return false;
        }
    }