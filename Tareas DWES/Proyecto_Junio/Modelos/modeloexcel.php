<?php
     require_once "../Config/config.php";
    class Modeloexcel{
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
        public function consultartabla(){
            $consulta= 'SELECT * from Profesores';
            $result= $this->conexion->query($consulta);
            $filas= $result->num_rows;
            $array= array($result, $filas);
            return $array;
        }
        public function subirDatos($nombre,$correo,$contrasenia){
            $consulta = "INSERT INTO Profesores(nombre, correo, contrasenia) VALUES ('".$nombre."','".$correo."','".$contrasenia."')";
            $this->conexion->query($consulta);
           
        }
        public function generarContrasena($longitud ) {
            // Caracteres permitidos en la contraseña
            $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        
            // Obtener la longitud total de los caracteres
            $longitudCaracteres = strlen($caracteres);
        
            // Generar una contraseña aleatoria
            $contrasena = '';
            for ($i = 0; $i < $longitud; $i++) {
                // Generar un índice aleatorio
                $indice = random_int(0, $longitudCaracteres - 1);
        
                // Agregar el carácter correspondiente al índice a la contraseña
                $contrasena .= $caracteres[$indice];
            }
        
            return $contrasena;
        }
        

    }
    class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

        public function readCell($column, $row, $worksheetName = ""){
            // Leer fila del título para alante
            if($row > 1){
                return true;
            }
            return false;
        }

    }
?>