<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos/style.css" rel="stylesheet" type="text/css">
        <title>Excel a BD</title>
    </head>
    <body>
        <h2>Importar excel y subir los datos a una BD</h2>
        <div id="formulario">
            Añade el archivo xlsx:<br><br>
            <form action="subirExcel.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="archivo" accept=".xlsx"/>
                <input type="submit" name="subir" value="SUBIR ARCHIVO" id="boton"/>
            </form>

