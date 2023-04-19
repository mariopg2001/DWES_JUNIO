
<?php
    if(isset($_POST['enviar']))
    {
        if(isset($_POST['deportes'])&&isset($_POST['publicar'])&&!empty($_POST['nombre'])&&isset($_POST['aceptar']))
        {
            // Preguntamos si existe la casilla de que desea recibir informacion (si existe se crea el array)
            if(isset($_POST['info'])){
                $deportes['MasInfo']='Sí desea recibir información por correo.';
            }else{
                $deportes['MasInfo']='No desea recibir información por correo ';
            }
            //Asignamos lo que nos llega a variables 
            $nombre= $_POST['nombre'];
            $descripcion= $_POST['descripcion'];
            $selec=$_POST['deportes2'];
            $radio= $_POST['publicar'];

            // asignamos las variables a un array
            $deportes['jugador']= $nombre;
            $deportes['radio']=$radio;
            //preguntamos si no es la opcion por defecto se añade al array el contenido del selec, si es igual, no se añadira al array
            if($selec!='opcion0')
            {
                $deportes['selec']=$selec;
            }
            // si la descripcion no esta vacia se añadirá al array 
            if(!empty($descripcion))
            {
                $deportes['descripcion']=$descripcion;
            }
            
           // if(is_array($_POST['deportes'])){ //preguntamos que si deportes(array de los checkbox) es un array, si no lo es es porque no se ha creado 
            $deportes['deportes']= $_POST['deportes'];
            //}    
            foreach($deportes as $indice1=>$valor1){ //foreach para recorrer el primer array 
                if(is_array($valor1)){ //preguntamos si el valor del indice es un array, si lo es hacemos un foreach para recorrerlo
                    $seleccionado= ' ';
                    $num_deportes= count( $_POST['deportes'])-1; //numero de variables que tenemos en el checkbox
                    foreach($_POST['deportes'] as $indice=>$deporte){
                        if($indice != $num_deportes){ //preguntamos si el indice no es igual al numero de elementos
                            $seleccionado = $seleccionado. $deporte.', '; //lo concatenamos con lo que hay ta en la variable y el final pone una ','
                            // $seleccionado .= $valor.', ' el .= sirve para concatenar con el resultado qu eya tenia ;
                        }else{
                            $seleccionado =$seleccionado. $deporte.'.'; // si es igual el indice al numero de variables concatenaremos y pondrá un '.'
                        }
                    }
                    echo 'deportes seleccionados en los checkbox:'.$seleccionado.'<br><br>'; // mostraremos el resultado
                }else{
                    //si no es un array mostrará nombre del indice del primer array y el valor rellenado o marcado
                    echo '<br> '.$indice1.' es: '.$valor1.'<br><br>';
                }
            }  
        }else{
            //Errores
            if(!isset($_POST['deportes'])&&!isset($_POST['publicar'])&&empty($_POST['nombre'])&&!isset($_POST['aceptar'])){
                //si no hay ningun campo obligatorio
                echo '<b> Debe rellenar los campos obligatorios (*) </b>';
            }else{
                if(empty($_POST['nombre'])){
                    //mensaje que sale si dejamos el nombre sin rellenar
                    echo '<b> Debe Rellenar el nombre(*)<br></b>'; 
                }
                if(!isset($_POST['deportes'])){
                    //mensaje que sale si dejamos el checkbox sin rellenar
                    echo '<b> Debe elegir almenos un deporte en los checkbox<br></b>';
                }
                if(!isset($_POST['publicar'])){
                    //mensaje que sale si dejamos el radio sin rellenar
                    echo '<b> Debe marcar un deporte de radio<br></b>'; 
                }
                if(!isset($_POST['aceptar'])){
                    //mensaje que sale si no aceptamos los terminos
                    echo '<b> Debe aceptar los terminos<br></b>'; 
                }
            }
        }
    }
?>
    <br><br>
    <a href="index.php"><button>Volver</button></a>

