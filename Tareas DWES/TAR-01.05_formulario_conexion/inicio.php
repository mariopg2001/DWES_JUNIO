
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql formulario de conexion</title>
</head>
<body>
    <h2>SQL</h2>
    <div id="divContenedor2">
        <form action="control.php" method="post">
           <label>
                Introduce la consulta sql: <input type="text" name="sql"  size="50"/>
           </label> <br><br>
           <input type="submit" name="insert" value="Insert">
           <input type="submit" name="select" value="Select">
        </form>
    </div>
    <a href="index.php"><button>Hacer otra conexion</button></a>
</body>
</html>
