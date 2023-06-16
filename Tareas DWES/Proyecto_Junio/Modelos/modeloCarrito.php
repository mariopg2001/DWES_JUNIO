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
            $sql= 'SELECT * from Clases';
            $result= $this->conexion->query($sql);
           
          
            return $result;
            
        } 
         public function profesor($correo){
            $sql= 'SELECT idProfesor from Profesores where correo="'.$correo.'";';
            $result= $this->conexion->query($sql);
            $datos=$result->fetch_assoc();
            
            return $datos['idProfesor'] ;
            
        }
        public function hacerReserva( $hora,$fecha,$id,$clase,$carrito){ 
            // var_dump($fecha);
            // var_dump($hora);   
            // var_dump($id);   

            //  echo $fecha.'</br>';
            //  echo $hora.'</br>';
            //  echo $id.'</br>';
            $insertar='INSERT INTO Reservas(fechaDiareserva,hora,idProfesor,tipo) values ("'.$fecha.'","'.$hora.'",'.$id.',"c");';
             $this->conexion->query($insertar);
            $insertar2= '<br>hola<br>';
             echo $insertar,$insertar2;
           
            $idReserva=$this->conexion->insert_id;
            echo $idReserva.'<br><br>';
            
            // $sqlclase= 'SELECT idClase from Clases where nombre="'.$clase.'";';
            // $idclase= $this->conexion->query($sqlclase);
            $insertarRcarrito='INSERT INTO ReservaCarritos(idReservaCarrito,codigoCarrito,idClase) values('.$idReserva.',"'.$carrito.'",'.$clase.');';
           echo  $insertarRcarrito;
             $this->conexion->query($insertarRcarrito);


            
        }
    }