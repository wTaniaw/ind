<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "admin@iineed.edu.mx";
$to = "admin@iineed.edu.mx";
$subject = "Correo enviado desde contacto Web";
$message = "Asunto: \n" . $_GET["asunto"] . "\n\nNombre:\n " . $_GET["nombre"] . "\n\nCorreo: \n" . $_GET["correo"] . "\n\nMensaje: \n" . $_GET["mensaje"] . "\n\n";
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);
header('Location: contacto.php?status="enviado"');
