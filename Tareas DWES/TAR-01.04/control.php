<?php
    $sql2=$_POST['sql'];
    if(isset($_POST['insert'])){
        header('location: insert.php?sql2='.$_POST['sql']);
    }elseif(isset($_POST['select'])){
        header('location: select.php?sql2='.$_POST['sql']);
    }