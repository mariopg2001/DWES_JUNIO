<?php
    $sql2=$_POST['sql'];
    $primera_palabra = strtolower(substr($sql2, 0, 6)); //convertimos la consulta a minusculas(strtolower), contamos las 6 primeras letras(substr)
    if(isset($_POST['insert'])){
        header('location: insert.php?sql2='.$_POST['sql'].'&palabra='.$primera_palabra);
    }elseif(isset($_POST['select'])){
        header('location: select.php?sql2='.$_POST['sql'].'&palabra='.$primera_palabra);
    }elseif(isset($_POST['conect'])){
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

            header('location: inicio.php');
            
        }
    }