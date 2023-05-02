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
    $p_palabra = $_GET['palabra'];
    if($p_palabra=='insert'){
        $consulta2=$modelo->actualizar($_GET['sql2']); //mandamos la consulta sql al modelo para ejecutarla
    }else{
        echo 'La consulta es incorrecta, debe empezar por: <b>INSERT</b>';

    }
?>
<br><br>
<a href="inicio.php"><button>Volver</button></a>
