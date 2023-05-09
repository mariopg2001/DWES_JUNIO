<?php
    if(isset($_POST['conect'])){
        if(!empty($_POST['server'])& !empty($_POST['usu'])& !empty($_POST['bbdd'])){
            if(empty($_POST['contra'])){
                $contra= '';
            }else{
                $contra= $_POST['contra'];
            }
            $host = $_POST['server'];
            $username = $_POST['usu'];
            $password = $contra;
            $database = $_POST['bbdd'];

            // Guardar los datos de conexión en un archivo de configuración
            $file = fopen("configdb.php", "w");
            fwrite($file, "<?php\n");
            fwrite($file, "define('SERVER', '".$host."');\n");
            fwrite($file, "define('USU', '".$username."');\n");
            fwrite($file, "define('CONTRA', '".$password."');\n");
            fwrite($file, "define('BBDD', '".$database."');\n");
            fclose($file);

            header('location: pruebaconectar.php');
            
        }
    }