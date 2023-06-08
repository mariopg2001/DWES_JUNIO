<?php
        if(!empty($_POST['usuario']) && !empty($_POST['contrasenia'])){
            require_once '../Controladores/controladorlog.php';
            $controlador= new Controladorlog();
            $usuario=$_POST['usuario'];
            $contrasenia=$_POST['contrasenia'];
            // $hash=password_hash($contrasenia, PASSWORD_DEFAULT);
            // echo $hash;
            $controlador->iniciarSesion($usuario, $contrasenia);
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Vistas/estilos/style.css">
    <title>Inicio</title>
</head>
<body>
    <div id="contenedor">
        <form action="./vistas/login.php" method="post">
            <label>Usuario</label><br>
            <input type="text" name="usuario"><br>
            <label>Contraseña</label><br>
            <input type="password" name="contrasenia">
            <br><br>
            <input type="submit" value="Acceder" name="login">
        </form>
    </div>
</body>
</html>