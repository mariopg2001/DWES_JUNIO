<?php
    $para = 'mperezg30@gmail.com';
    $titulo = 'Contraseña de acceso';
    $mensaje = 'Hola esta es tu contraseña para acceder a la web de reservas <br /><br /><br />Un Saludo.';
    $cabeceras = 'From: mperezg30@gmail.com' . "\r\n" .
    'Reply-To: mperezg30@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($para, $titulo, $mensaje, $cabeceras);