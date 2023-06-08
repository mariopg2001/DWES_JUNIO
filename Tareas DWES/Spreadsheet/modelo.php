<?php
     require_once "./configdb.php";
    class Modelo{
        public $fila_afectadas;
        public $filas;
        private $conexion;
        public function __construct(){
            $this->conexion=$this->conectar();     
        }
        public function conectar(){
            $conexion= new mysqli(SERVER,USU,CONTRA,BBDD);
            $conexion->set_charset('utf8');
            if($conexion->connect_errno){
                echo 'la conexion falló'. $conexion->connect_error;
                die();
            }else{
                return $conexion;
            }
        }
        public function consultartabla(){
            $consulta= 'SELECT * from visita';
            $result= $this->conexion->query($consulta);
            $filas= $result->num_rows;
            $array= array($result, $filas);
            return $array;
        }

    }
?>