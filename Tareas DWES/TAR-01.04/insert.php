<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql</title>
</head>
<?php
    require_once('./modelo.php');
    $modelo=new Modelo();
    $primera_palabra = strtolower(substr($_GET['sql2'], 0, 6));
    if($primera_palabra=='insert'){
        $consulta2=$modelo->actualizar($_GET['sql2']); //mandamos la consulta sql al modelo para ejecutarla
    }else{
        echo 'La consulta es incorrecta, debe empezar por: <b>INSERT</b>';

    }
?>
<br><br>
<a href="index.php"><button>Volver</button></a>
