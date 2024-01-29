<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "admin@iineed.edu.mx";
    $to = "admin@iineed.edu.mx";
    $subject = "Correo enviado desde página Web";
    $message = "Asunto: <br>".$_GET["asunto"]."<br><br>Nombre: ".$_GET["nombre"]."<br><br>Correo: ".$_GET["correo"]."<br><br>Mensaje: ".$_GET["mensaje"]."<br><br>";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
?>