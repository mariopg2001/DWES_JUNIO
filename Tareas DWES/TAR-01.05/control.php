<?php
    $sql2=$_POST['sql'];
    $primera_palabra = strtolower(substr($sql2, 0, 6)); //convertimos la consulta a minusculas(strtolower), contamos las 6 primeras letras(substr)
    
    if(isset($_POST['insert'])){
        header('location: insert.php?sql2='.$_POST['sql'].'&palabra='.$primera_palabra);
    }elseif(isset($_POST['select'])){
        header('location: select.php?sql2='.$_POST['sql'].'&palabra='.$primera_palabra);
    }