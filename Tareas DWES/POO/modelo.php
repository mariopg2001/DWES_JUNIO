<?php
     require_once "./configdb.php";
    
    class Modelo{
        
        public $numfilas;
        private $conexion;
        public function __construct(){
            $this->conexion=$this->conectar();
            
        }
        public function conectar(){
            $conexion= new mysqli(SERVER,USU,CONTRA,BBDD) or die ('No se puede conectar');
            $conexion->set_charset('utf8');
            return $conexion;
        }
        public function consulta($consulta){
            $sql=$consulta;
            $result = $this->conexion->query($sql);
            $filas=$result->num_rows;
            $array=array($result,$filas );
            return $array;
        }
        public function anadir($consulta){
            $sql=$consulta;
            $result = $this->conexion->query($sql);
            $fila= $this->conexion->affected_rows;
            $array=array($result,$fila );
            return $array;
        }
    }