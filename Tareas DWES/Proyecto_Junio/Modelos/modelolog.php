<?php
    require_once '../Config/config.php';
    class Modelolog{
       private $conexion;

        public function __construct(){
            $this->conexion=$this->conectar();
        }
        public function conectar(){
            $conexion= new mysqli(SERVER,USU,CONTRA,BBDD) or die ('No se puede conectar');
            $conexion->set_charset('utf8');

            return $conexion;
        }
        public function iniciarSesion($usuario, $contrasenia){
            $this->conectar();
            $consulta= 'SELECT * FROM Profesores WHERE correo="'.$usuario.'"AND contrasenia="'.$contrasenia.'"  ;';
            $result= $this->conexion->query($consulta);

            return $usuario;
            // if(($result->num_rows)>0){
            //     $linea = $result ->fetch_assoc();
            //     return $linea['idProfesor'];
            // }else{
            //     return 0;
            // }

            $this->conexion->close();
        }
    }