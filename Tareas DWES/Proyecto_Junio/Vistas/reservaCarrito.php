<?php
         session_start();
        require_once('../Controladores/controladorCarrito.php');
        $controlador= new ControladorCarrito;
        $carritos=$controlador->carritos();
        $clases=$controlador->clases();
        $usuario=$controlador->profesor($_SESSION['usuario']);
        // $correo=$_GET['correo'];
        $correo=$_SESSION['usuario'];
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Carritos</title>
</head>
<body>
    <form action="reservaCarrito.php" method="post">
        <label>Fecha de reserva
            <input type="date" name="fechareserva">
        </label><br>
        <label>Carrito: 
            <select name="carrito">
                <?php
               
                while($fila=$carritos->fetch_assoc())
                {
                    foreach($fila as $indice=>$valor){
                        echo '<option value='.$valor.'>'.$valor.'</option>';
                    }
                }
                 ?>
            </select>
        </label><br>
        <label>Hora de reserva:</label>
            <select name="horas">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select><br>
        <label>Clase:   
            <select name="clase">
                <?php
               
                while($fila2=$clases->fetch_assoc())
                {
                    foreach($fila2 as $indice2=>$valor2){
                        echo '<option value='.$valor2.'>'.$valor2.'</option>';
                    }
                }
                 ?>
            </select>
        </label><br><br>
        <input type="submit" name="guardar" value="Guardar" maxlength="6">
    </form>
</body>
</html>
<?php
    if(isset($_POST['guardar'])){
       
        $reserva=$controlador->hacerReserva($_POST['clase'],$_POST['horas'],$_POST['fechareserva'], $_POST['carrito'], $usuario);
    }
?>
