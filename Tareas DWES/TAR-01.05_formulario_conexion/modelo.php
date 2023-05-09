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
            $conexion= new mysqli(SERVER,USU,CONTRA,BBDD) or die('error de conexion');
            if ($conexion->connect_error) {
                die('Error de conexión: ' . $conexion->connect_error);
            }else{
                $conexion->set_charset('utf8');
                  return $conexion;
            }
            
        }
        public function consulta($sql){
            try{
                $consulta=$sql;
                $result = $this->conexion->query($consulta);
                echo 'La consulta realizada tiene '.$this->filas=$result->num_rows.' filas';
                return $result;
            }catch(Exception $e){
                if($e->getCode()==1064){
                    echo 'Hay un error de sintaxis en la consulta SQL';
                   }    
            }
        }
        public function actualizar($sql){
            try{
                $consulta=$sql;
                $result = $this->conexion->query($consulta);
                $this->fila_afectadas= $this->conexion->affected_rows;
                echo 'El número de filas afectadas es: '.$this->fila_afectadas;
                return $result;
            }catch(Exception $e){
              
               if($e->getCode()==1064){
                echo 'Hay un error de sintaxis en la consulta SQL';
               }

            }
        }
    }
?>