<?php
require_once "../Config/config.php";
    class ModeloCarrito{
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
        public function carritos(){
            $sql= 'SELECT codigoCarrito from Carritos';
            $result= $this->conexion->query($sql);
           
           
            return $result;
            
        }
        public function clases(){
            $sql= 'SELECT nombre from Clases';
            $result= $this->conexion->query($sql);
           
          
            return $result;
            
        } 
         public function profesor($correo){
            $sql= 'SELECT idProfesor from Profesores where correo="'.$correo.'";';
            $id= $this->conexion->query($sql);
            var_dump($id);
          
            return $id;
            
        }
        public function hacerReserva($clase,$fecha, $hora,$carrito,$correo){        
          $insertar='INSERT INTO Reservas(fechaDiareserva,hora,idProfesor,tipo) values ("'.$fecha.'",'.$hora.','.$correo.',"c");';
                    //    INSERT INTO Reservas(fechaHoraRes,fechaDiareserva,hora,idProfesor,tipo) VALUES(CURRENT_TIMESTAMP
            $this->conexion->query($insertar);
            $idReserva=$this->conexion->insert_id;
            echo $this->conexion->insert_id;
            
            // $sqlclase= 'SELECT idClase from Clases where nombre="'.$clase.'";';
            // $idclase= $this->conexion->query($sqlclase);
            // $insertarRcarrito='INSERT INTO ReservaCarrito(idReservaCarrito,codigoCarrito,idClase) values('.$idReserva.',"'.$carrito.'"'.$idclase.');';
            // $this->conexion->query($insertarRcarrito);


            
        }
    }