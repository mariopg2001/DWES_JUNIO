<?php
    $str = " select * from lugar ";
    echo $str . "<br>";
    $valor=trim($str);

    echo strlen($str). '</br>'; 
    echo strlen($valor). '</br>';

    $primera_palabra = strtolower(substr($valor, 0, 6)); //convertimos la consulta a minusculas(strtolower), contamos las 6 primeras letras(substr)
    
    if($primera_palabra== "select"){
        echo "entra";
    }


?>