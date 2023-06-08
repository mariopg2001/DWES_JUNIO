<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inicio.php" method="Post" enctype="multipart/form-data">
        <label >
            <input type="file" name="archivo" accept=".pdf">
        </label>
        <input type="submit" name="guardar">
    </form>
</body>
</html>
<?php
    if(isset($_POST['guardar'])){
        if(isset($_FILES['archivo'])){
                $documento= $_FILES['archivo'];
                $nombre=$documento['name'];
                $extension = pathinfo($nombre, PATHINFO_EXTENSION);
                if($extension== 'pdf'){
                    $tmp_name = $documento['tmp_name'];
                    $directorio_destino = 'subidas/';
                    $ruta_destino = $directorio_destino . $nombre;
                    move_uploaded_file($tmp_name, $ruta_destino);
                echo 'El archivo se ha subido correctamente';

                }else{
                    echo 'El archivo debe ser extensión <b>pdf</b>';
                }
                
        }
    }else{
        echo 'Pulsa enviar';
    }