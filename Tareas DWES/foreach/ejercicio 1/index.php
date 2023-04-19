<?php
    $flor['loto']='loto.jpg';
    $flor['margarita']= 'margarita.jpg';
    $flor['tulipan']= 'tulipan.jpg';

    echo count($flor);
    // forma completa para mostrar el nombre del archivo y el indice de la columna
    foreach($flor as $fila =>$valor)
    {
        echo '<p>'.$fila.' es '.$valor.'</p>';
    }
    echo '<br>';

    // forma abreviada para mostrar solo el nombre del archivo
    foreach($flor as $fila)
    {
        echo    '<p>
                    '.$fila.'
                </p>';
               
    }


?>