<?php
        // Mostrar el contenido de header.php
    //require_once './config/configdb.php';       // Trae los datos de configdb.php
    //require_once './modelo.php';                // Trae los valores del modelo.php 
    require '../vendor/autoload.php';             // Trae los valores del autoload.php
    require_once('../Controladores/controladorexcel.php');
   
    $controlador=new Controladorexcel();
    $extensiones = array('xls', 'xlsx');
    if(isset($_FILES['archivo'])) {
        $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
        $nombre_archivo = $_FILES['archivo']['name'];
        $ruta_archivo = $_FILES['archivo']['tmp_name'];

        move_uploaded_file($ruta_archivo, './' . $nombre_archivo);
     
        if(in_array($extension_archivo, $extensiones)) {
            echo "<div id='bien'>El archivo introducido se ha subido correctamente</div>";


            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $inputFileName = $nombre_archivo;

            // Identifica el tipo de $inputFileName
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
            // Crear un nuevo Reader del tipo que se ha identificado
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

            // Leer la función para obtener los datos de una celda en especifica, que sea mayor al número de la función
            $reader->setReadFilter( new MyReadFilter() );
            // Cargar $inputFileName a un objeto de la hoja de cálculo
            $spreadsheet = $reader->load($inputFileName);
            $cantidad = $spreadsheet->getActivesheet()->toArray();
            foreach($cantidad as $row){
                if($row[0] != ''){
                    $contrasenia=$controlador->generarContrasena(8);
                    $consulta2=$controlador->subirDatos($row[0],$row[1],$contrasenia);
                    $consulta3= $controlador->enviarCorreo($row[0],$row[1],$contrasenia);
                }
            }
            // header('Location:../index.php');
        }else {
            echo "<div id='error'>El tipo de archivo introducido no se puede subir.<br> Solo se permiten archivos de Excel con extensión .xls, .xlsx</div>";
        }   
    }

