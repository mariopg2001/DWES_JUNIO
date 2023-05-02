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
    <form action="control.php" method="post">
        <label>
            Servidor de la base de datos: 
            <input type="text" name="server">
        </label><br>
        <label>
            Base de datos:
            <input type="text" name="bbdd">
        </label>
        <label><br>
            Usuario:
            <input type="text" name="usu">
        </label>
        <label><br>
            Contraseña: 
            <input type="text" name="contra">
        </label> <br> 
        <input type="submit" value="enviar" name="conect">  
    </form>
    
    </body>
</html>

