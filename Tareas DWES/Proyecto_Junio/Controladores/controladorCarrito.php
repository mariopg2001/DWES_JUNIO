<?php
require_once '../Modelos/modeloCarrito.php';
    
    class ControladorCarrito{
    
        private $modelo;   
        public function __construct()
        {
            $this->modelo = new ModeloCarrito();
        }
        public function carritos(){
            $resultado=$this->modelo->carritos();
            return $resultado;
        }
        public function clases(){
            $resultado=$this->modelo->clases();
            return $resultado;
        }
        public function profesor($correo){
            $resultado=$this->modelo->profesor($correo);
            return $resultado;
        }
        public function hacerReserva($clase, $hora,$fecha,$carrito,$correo){
            $resultado=$this->modelo->hacerReserva($clase, $hora,$fecha,$carrito,$correo);
            return $resultado;
        }
    }