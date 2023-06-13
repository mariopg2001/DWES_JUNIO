<?php 
    require_once '../Modelos/modeloexcel.php';
    
    class Controladorexcel{
    
        private $modelo;   
        public function __construct()
        {
            $this->modelo = new Modeloexcel();
        }
        public function consultardatostabla(){
            $resultado=$this->modelo->consultartabla();
            return $resultado;
        }
        public function subirDatos($nombre,$correo,$contrasenia){
           $this->modelo->subirDatos($nombre,$correo,$contrasenia);
        }
        public function generarContrasena($longitud) {
           $resultado=$this->modelo->generarContrasena($longitud);
            return $resultado;
        }
    
        
    }