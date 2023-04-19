<?php
// que siga su orden desde la que elegimos y despues vuelva a empezar
//conexion a la base de datos local
    define("Server",'localhost');
    define("Usu",'root');
    define("Contra",'');
    define("Bbdd",'user2daw_BD1-19');

    // define("Server",'2daw.esvirgua.com');
    // define("Usu",'user2daw_19');
    // define("Contra",'M^wPDCC_z3~0');
    // define("Bbdd",'user2daw_BD1-19');
    $conexion= new mysqli(Server,Usu,Contra,Bbdd);
    $conexion->set_charset("utf8");
?>
<h2>¿El lugar de que visita quiere modificar?</h2>
<?php
    $consulta= "SELECT idVisita from visita"; //consultamos los id de la tabla visitas
    $resultado = $conexion->query($consulta);
    echo '<form action="indexv3.php" method="post" >
            <input type="text"class="form-control-md" list="ids" name="visita">
            <datalist name="visita" id="ids">';
    while($fila=$resultado-> fetch_assoc()) 
    {
        echo "<option value=".$fila['idVisita'].">"; 
    }
    echo '</datalist>
    <input type="submit" name="enviar" value="enviar">
    </form>';
?>
<?php
    if(isset($_POST['enviar'])){
       
        $consulta2= "SELECT ip from visita WHERE idVisita=".$_POST['visita']; //consultamos la ip del lugar de la visita
        $resultado2 = $conexion->query($consulta2);
        //var_dump($resultado2);
        if($resultado2->num_rows>0){ //si nos devuelve 0 filas el id de la visita no existe y si existe nos mostrará el lugar
            echo'<form method="post" action="indexv3.php">
                
                <label>Elige el lugar de visita</label>
                <select name="lugares">';

                while($fila=$resultado2-> fetch_assoc())//guardamos como array 
                {
                    $iplugar=$fila['ip']; //lo añadimos a una variable para poder usarla fuera del while
                }

                $consulta4= 'SELECT * from lugar'; //consultamos todos los lugares menos la ip que seleccionamos
                $resultado4 = $conexion->query($consulta4);
                while($fila=$resultado4-> fetch_assoc())
                {
                  if($fila['ip']==$iplugar){
                        echo '<option value="'.$iplugar.'">'.$fila['lugar'].'</option>'; //añadimos el lugar seleccionado en la 1 opcion
                        break;
                    }
                }
                
                while($fila=$resultado4-> fetch_assoc())
                {  
                    echo "<option value=".$fila['ip'].">".$fila['lugar']."</option>"; //continuamos añadiendo las opciones partiendo del anterior       
                }
               $resultado4->data_seek(0);// ponemos el puntero en la posicion 0 para volver a recorrer el array
                while($fila=$resultado4-> fetch_assoc())
                {
                        if($fila['ip']!=$iplugar){
                            echo "<option value=".$fila['ip'].">".$fila['lugar']."</option>"; //si no es igual al lugar seleccionado se añade
                        }else{
                            break; //si es igual terminamos el while
                        }  
                }
                     
                echo '</select>';
               
                
        }else{
            echo 'El id introducido es incorrecto';
        }
    }
?>