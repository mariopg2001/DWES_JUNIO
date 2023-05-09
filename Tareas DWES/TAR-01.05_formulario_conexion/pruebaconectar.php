<?php
error_reporting(0);
try{
    require_once('./modelo.php');
    $modelo=new Modelo();
    $conectar=$modelo->conectar();
  
  if($conectar=='true'){
    header('location: inicio.php');
  }
  
}catch(Exception $e){
    $e->getCode();
    if($e->getCode()==2002){
        echo 'El Host esta mal';
    }else{
        echo 'el host esta bien pero algunos datos de conexion no';
    }
}

