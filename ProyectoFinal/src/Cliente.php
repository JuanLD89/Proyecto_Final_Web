<?php

    namespace consolasretro;

    class Cliente{

        private $config;
        private $cn = null;

        public function __construct(){
         
            $this->config = parse_ini_file(__DIR__.'/../config.ini'); // devuelve el contenido del archivo especificado
            
            $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],
            array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        }
        public function registrar($_params){
            $sql = "INSERT INTO `clientes`(`nombre`, `apellidos`, `email`, `telefono`, `comentario`)
            VALUES (:nombre,:apellidos,:email,:telefono,:comentario)";  //Desde SQL se sabe como insertar una nueva consola, no se usa el id, porque este autoincrementa, y tampoco el estado, ya que este tiene un valor predeterminado
            //Lo unico que campoa son los datos depuest de VALUE y esto es porque usamos PDO, y reconoce esos datos como parametros

            $resultado = $this->cn->prepare($sql); //se encarga de devolvernos cual es el resultado final despues de ejecutar la consulta, cn se encarga de tomar la ruta a la base de datos
            //sql se encarga de leer toda la ruta 

            $_array = array(
                ":nombre" => $_params['nombre'],
                ":apellidos" => $_params['apellidos'],
                ":email" => $_params['email'],
                ":telefono" => $_params['telefono'],
                ":comentario" => $_params['comentario']                
            );//se indica cuales son los parametros
            if($resultado->execute($_array))
                return $this->cn->lastInsertId(); // Devuelve el ultimo Id que se ha insertado

            return false;
        }
    }