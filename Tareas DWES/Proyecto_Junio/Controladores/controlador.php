<?php 
    require_once './Modelos/modelo.php';
    
    class Controlador{
    
        private $modelo;   
        public function __construct()
        {
            $this->modelo = new Modelo();
        }
        public function nombreProfesor($correo){
            $resultado=$this->modelo->nombreProfesor($correo);
            return $resultado;
        }
    }