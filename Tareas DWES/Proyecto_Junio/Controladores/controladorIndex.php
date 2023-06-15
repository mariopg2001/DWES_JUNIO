<?php 
    require_once './Modelos/modeloIndex.php';
    
    class ControladorIndex{
    
        private $modelo;   
        public function __construct()
        {
            $this->modelo = new ModeloIndex();
        }
        public function nombreProfesor($correo){
            $resultado=$this->modelo->nombreProfesor($correo);
            return $resultado;
        }
        public function hacerReserva($clase,$hora,$fecha,$correo){
            $resultado=$this->modelo->hacerReserva($clase,$hora,$fecha,$correo);
            return $resultado;
        }
        public function carritos(){
            $resultado=$this->modelo->carritos();
            return $resultado;
        }
    }