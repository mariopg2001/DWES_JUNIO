<?php
//Version de con dos select
//conexion a la base de datos local
   
    // define("Server",'localhost');
    // define("Usu",'root');
    // define("Contra",'');
    // define("Bbdd",'user2daw_BD1-19');

    define("Server",'2daw.esvirgua.com');
    define("Usu",'user2daw_19');
    define("Contra",'M^wPDCC_z3~0');
    define("Bbdd",'user2daw_BD1-19');
    $conexion= new mysqli(Server,Usu,Contra,Bbdd);
    $conexion->set_charset('utf8');

?>
<h2>¿El lugar de que visita quiere modificar?</h2>
<?php
    $consulta= "SELECT idVisita from visita"; //consultamos los id de la tabla visitas
    $resultado = $conexion->query($consulta);
    
    echo '<form action="indexv1.php" method="post" >
            <input type="text" class="form-control-md" list="ids" name="visita">
            <datalist name="visita" id="ids">';
                while($fila=$resultado-> fetch_assoc()) 
                {
                    echo "<option value=".$fila['idVisita']." />"; 
                }
    echo '</datalist>
    <input type="submit" name="enviar" value="enviar">
    </form>';

?>

<?php
    if(isset($_POST['enviar'])){
       
        $consulta2= "SELECT ip from visita WHERE idVisita=".$_POST['visita']; //consultamos la ip del lugar de la visita
        $resultado2 = $conexion->query($consulta2);
        
        if($resultado2->num_rows>0){ //si nos devuelve 0 filas el id de la visita no existe y si existe nos mostrará el lugar
            
            echo'<form method="post" action="indexv1.php">
                <label>Elige el lugar de visita</label>
                <select name="lugares">';
                while($resultado2-> fetch_assoc()==1)//guardamos como array 
                {
                    $iplugar=$fila['ip']; //lo añadimos a una variable para poder usarla fuera del while
                }
                $consulta3= 'SELECT lugar from lugar WHERE ip="'.$iplugar.'"'; //consultamos el nombre de la ip que hemos seleccionado
                $resultado3 = $conexion->query($consulta3);
                while($fila=$resultado3-> fetch_assoc())
                {
                   $nlugar=$fila['lugar']; //lo añadimos a una variable para poder usarla fuera del while
                }
                echo '<option value="'.$iplugar.'">'.$nlugar.'</option>'; //lo ponemos en el primer option para que nos aparezca en la 1 opcion
                $consulta4= 'SELECT * from lugar WHERE ip!="'.$iplugar.'"'; //consultamos todos los lugares menos la ip que seleccionamos
                $resultado4 = $conexion->query($consulta4);
                while($fila3=$resultado4-> fetch_assoc())
                {
                    echo "<option value=".$fila3['ip'].">".$fila3['lugar']."</option>"; //lo añadimos al option 
                }
                echo '</select>';
        }else{
            echo 'El id introducido es incorrecto';
        }
    }
?>