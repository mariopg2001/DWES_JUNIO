<?php
    require_once './Config/config.php';
    class Modelo{
       private $conexion;

        public function __construct(){
            $this->conexion=$this->conectar();
        }
        public function conectar(){
            $conexion= new mysqli(SERVER,USU,CONTRA,BBDD) or die ('No se puede conectar');
            $conexion->set_charset('utf8');

            return $conexion;
        }
        public function nombreProfesor($correo){
            $sql= 'SELECT nombre from Profesores Where correo="'.$correo.'"';
            $result= $this->conexion->query($sql);
            $datos= $result->fetch_assoc();
            return $datos['nombre'];
        }
    }