<?php

    namespace consolasretro;

    class Consola{

        private $config;
        private $cn = null;

        public function __construct(){

            $this->config = parse_ini_file(__DIR__.'/../config.ini'); // devuelve el contenido del archivo especificado

            $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],
            array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

            //print_r($this->config);
        } 
        
        public function registrar($_params){
            $sql = "INSERT INTO `consolas`(`consola`, `descripcion`, `foto`, `precio`, `empresas`, `fecha`) VALUES (:consola, :descripcion, :foto, :precio, :empresas, :fecha)";  //Desde SQL se sabe como insertar una nueva consola, no se usa el id, porque este autoincrementa, y tampoco el estado, ya que este tiene un valor predeterminado
            //Lo unico que campoa son los datos depuest de VALUE y esto es porque usamos PDO, y reconoce esos datos como parametros

            $resultado = $this->cn->prepare($sql); //se encarga de devolvernos cual es el resultado final despues de ejecutar la consulta, cn se encarga de tomar la ruta a la base de datos
            //sql se encarga de leer toda la ruta 

            $_array = array(
                ":consola" => $_params['consola'],
                ":descripcion" => $_params['descripcion'],
                ":foto" => $_params['foto'],
                ":precio" => $_params['precio'],
                ":empresas" => $_params['empresas'],
                ":fecha"=> $_params['fecha'],
            );//se indica cuales son los parametros
            if($resultado->execute($_array))
                return true;

            return false;
        }//ejecutamos la consulta
        //execute se encarga de ejecutar todos los parametros que le enviamos a nuestro arreglo

        public function actualizar($_params){
            $sql = "UPDATE `consolas` SET `consola`=:consola,`descripcion`=:descripcion,`foto`=:foto,`precio`=:precio,`empresas`=:empresas,`fecha`=:fecha WHERE 'id'=:id";//sale desde SQL de la base de datos, obviamos id ya que esta autoincrementano, y estado, ya que esta predeterminado

            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":consola" => $_params['consola'],
                ":descripcion" => $_params['descripcion'],
                ":foto" => $_params['foto'],
                ":precio" => $_params['precio'],
                ":empresas" => $_params['empresas'],
                ":fecha"=> $_params['fecha'],
                ":id" => $_params['id'],
            );
            if($resultado->execute($_array))
                return true;

            return false;
        }

        public function eliminar($id){
            $sql = "DELETE FROM `consolas` WHERE `id`=:id ";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $_params['id'],
            );
            if($resultado->execute($_array))
                return true;

            return false;
        }

        public function mostrar(){
            $sql = "SELECT consolas.id, consola, descripcion,foto,nombre,precio,fecha,estado FROM consolas
            
            INNER JOIN empresa
            ON consolas.empresas = empresa.id ORDER BY consolas.id DESC";//relacionamos 2 tablas, la de consolas y la de espresa, la parte del id en empresa y empresas en consolas
            // SELECT es la palabra reservada para ppreguntar que columnas, INNER JOIN para comparar, para ver que tienen en comun usamos ON, ORDER BY es para ordenar, y DESC de manera descendente
            $resultado = $this->cn->prepare($sql);

            if($resultado->execute())
                return $resultado->fetchAll();

            return false;
        }//se retorna el resultado, fetchAll se usa para traer todos los registros que se encuentan en nuestra tabla

        public function mostrarPorId($id){
            $sql = "SELECT * FROM `consolas` WHERE `id`=:id";
            $resultado = $this->cn->prepare($sql);

            $_array = array(
                ":id" => $_params['id'],
            );

            if($resultado->execute($_array))
                return $resultado->fetch();

            return false;
        }//fetch solo nos trae un registro en especial, solo una consola
    }

?>