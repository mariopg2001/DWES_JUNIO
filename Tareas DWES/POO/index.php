<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql</title>
</head>
<body>
    <h2>SQL</h2>
    <div id="divContenedor2">
        <form action="index.php" method="post">
           <label>
                Introduce la consulta sql: <input type="text" name="sql" />
           </label> 
           <input type="submit" name="guardar">
        </form>
    </div>
</body>
</html>
<?php

if(!isset($_POST['guardar'])){
    echo 'Introduce una consulta';
}

if(isset($_POST['guardar'])){
    require_once('./modelo.php');
    $modelo=new Modelo();
    $primera_palabra = strtolower(substr($_POST['sql'], 0, 6)); //convertimos la consulta a minusculas(strtolower), contamos las 6 primeras letras(substr)
    if($primera_palabra=='select'){ //si las 6 primeras letras son igual a select mandamos la consulta a la funcion consulta
        $consulta1=$modelo->consulta($_POST['sql']); //mandamos la consulta sql al modelo para ejecutarla
        echo 'La consulta realizada tiene '.$consulta1[1].' filas';
?>
        <table>
            <tr>  
    
            <?php
        $i=1;
        if($consulta1[1]>0){
            while($fila=$consulta1[0]-> fetch_assoc())
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
            echo 'La consulta no ha devuelto filas';
        }
         echo '</tr>
        </table>';
    }elseif($primera_palabra=='insert'){//si las 6 primeras letras son igual a insert mandamos la consulta a la funcion anadir
        $consulta2=$modelo->anadir($_POST['sql']); //mandamos la consulta sql al modelo para ejecutarla
        echo 'El número de filas afectadas es: '.$consulta2[1];
    }
}

