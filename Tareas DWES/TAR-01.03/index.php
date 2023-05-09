
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
    echo 'Introduce una consulta </br>';
    if(isset($_COOKIE['contador_select'])&& isset($_COOKIE['contador_act'])){
        echo 'consultas realizadas de consulta: '.$_COOKIE['contador_select'].'</br>';
        echo 'consultas realizadas de actualizar: '. $_COOKIE['contador_act'].'</br>';
    }else{
        setcookie ('contador_select', 0, time()+900);
        setcookie ('contador_act', 0, time()+900);
    }
   
}


if(isset($_POST['guardar'])){
    echo 'consultas realizadas de consulta: '.$_COOKIE['contador_select'].'</br>';
    echo 'consultas realizadas de actualizar: '. $_COOKIE['contador_act'].'</br>';
    require_once('./modelo.php');
    $modelo=new Modelo();
    $primera_palabra = strtolower(substr($_POST['sql'], 0, 6)); //convertimos la consulta a minusculas(strtolower), contamos las 6 primeras letras(substr)
    if($primera_palabra=='select'){ //si las 6 primeras letras son igual a select mandamos la consulta a la funcion consulta
        $consulta1=$modelo->consulta($_POST['sql']); //mandamos la consulta sql al modelo para ejecutarla
        $nfilas=$modelo->filas;
        if(isset($_COOKIE['contador_select'])){
            $_COOKIE['contador_select']++;
            setcookie ('contador_select',  $_COOKIE['contador_select'], time()+900);
        }
       
        ?>
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
    }elseif($primera_palabra=='insert' || $primera_palabra=='update' || $primera_palabra=='delete'){//si las 6 primeras letras son igual a insert mandamos la consulta a la funcion anadir
       if(isset($_COOKIE['contador_act'])){
            $_COOKIE['contador_act']++;
            setcookie ('contador_act',  $_COOKIE['contador_act'], time()+900);
            
       }
        
        $consulta2=$modelo->actualizar($_POST['sql']); //mandamos la consulta sql al modelo para ejecutarla
    }else{
        echo 'La consulta introducida es incorrecta';
    }
}

