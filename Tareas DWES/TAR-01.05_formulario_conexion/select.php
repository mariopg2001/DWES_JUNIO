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
    if($p_palabra=='select'){ //si las 6 primeras letras son igual a select mandamos la consulta a la funcion consulta
        $consulta1=$modelo->consulta($_GET['sql2']); //mandamos la consulta sql al modelo para ejecutarla
        $nfilas=$modelo->filas;
?>
<br><br>
<a href="inicio.php"><button>Volver</button></a>

        <table>
            <tr>              
<?php
        $i=1;
        if($nfilas>0){
            while($fila=$consulta1-> fetch_assoc())
            {
                if($i==1){ //si i es menor que el numero de columnas nos pondra el encabezado de la columna
                    foreach($fila as $fila2 =>$valor)
                    {
                        echo '<th>'.$fila2.'</th>';
                    }
                }
                $i=0;
                echo '</tr><tr>';
                foreach($fila as $fila2 =>$valor)
                {
                    echo '<td>'.$valor.'</td>'; //ponemos el valor de cada columna 
                }
            }
        }else{
            echo '<br/>La consulta no ha devuelto filas';
        }
            echo '</tr>
            </table>';
    }else{
        echo 'La consulta es incorrecta, debe empezar por: <b>SELECT</b>';
    }
?>