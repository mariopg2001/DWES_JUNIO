<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <div id="divContenedor">
        <form action="mensajes.php" method="POST">
            <label > <b>*Nombre:</b> </label> 
            <input class="form-control-md" name="nombre" type="text" placeholder="Nombre"><br><br>
            <label ><b>Descripción:</b>  </label> 
            <textarea class="form-control-md" name="descripcion" rows="3" placeholder="Descripcion"></textarea><br><br>
            <label class="form-check-label"><b>*¿Deportes?</b></label><br>
                <input type="checkbox" class="form-check-input " value="Futbol" name="deportes[]">Futbol <br>        
                <input type="checkbox" class="form-check-input" value="Baloncesto" name="deportes[]">Baloncesto<br>
                <input type="checkbox" class="form-check-input" value="Golf" name="deportes[]">Golf<br>
                <input type="checkbox" class="form-check-input" value="Motociclismo" name="deportes[]">Motociclismo<br>
                <input type="checkbox" class="form-check-input" value="Esports" name="deportes[]">E-sports<br><br>
            <label><b> *Elige 1 deporte</b></label><br>
                <input type="radio" class="form-check-input" name="publicar" value="Natación">Natación<br><br>
                <input type="radio" class="form-check-input" name="publicar" value="Motociclismo">Motociclismo<br><br>
                <input type="radio" class="form-check-input" name="publicar" value="Hockey">Hockey<br><br>
                <input type="radio" class="form-check-input" name="publicar" value="Waterpolo">Waterpolo<br><br>

            <label> Elige el deporte</label>
            <select class="form-select-md" name="deportes2">
                <option value="opcion0" hidden>Elige una opcion</option>
                <option value="Cricket">Cricket</option>
                <option value="Rugby" >Rugby</option>
                <option value="Courling">Courling</option>
            </select>    <br><br>
            <label class="form-check-label">*Acepta los terminos legales</label>
            <input type="checkbox" class="form-check-input" name="aceptar" ><br><br>
            <label class="form-check-label" >¿Desea recibir informacion por correo?</label>
            <input type="checkbox" class="form-check-input" name="info" ><br>
            <b>* Son campos onligatorios</b><br>
            <button type="submit" class="btn btn-primary"name="enviar">Enviar</button>
        </form>
    </div>
</body>
</html>
