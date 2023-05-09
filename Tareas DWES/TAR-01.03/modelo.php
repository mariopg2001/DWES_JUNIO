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
            try{
                $conexion= new mysqli(SERVER,USU,CONTRA,BBDD);
                $conexion->set_charset('utf8');
                return $conexion;
            }catch(Exception $e){
                echo $e->getCode();
                echo $e->getMessage();
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
            //   if($e->getCode()==1146){
            //     echo 'Ya existe un lugar con ese nombre';
            //   } 
            //   if($e->getCode()==1062){
            //     echo 'La clave principal ya existe';

            //   } 
            // if( $e->getCode()== '1451'){
            //     echo 'No se puede borrar debido a que el campo está asociado como clave ajena a otro campo ';
            // }
               if($e->getCode()==1064){
                echo 'Hay un error de sintaxis en la consulta SQL';
               }else{
                echo '<br/>La consulta no cumple algunas restrinciones de la base de datos';
               }
            }
        }
    }
?>