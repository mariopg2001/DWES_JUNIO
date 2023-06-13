<?php 
    require_once '../Modelos/modelolog.php';
    
    class Controladorlog{
    
        private $modelo;   
        public function __construct()
        {
            $this->modelo = new Modelolog();
        }

        public function iniciarSesion($usuario, $contrasenia){
           $datos= $this->modelo->iniciarSesion($usuario, $contrasenia);
           if($datos>0){
                session_start();
                $_SESSION['usuario']=$datos;
                header('Location: ../index.php');
            }    
        }
    }