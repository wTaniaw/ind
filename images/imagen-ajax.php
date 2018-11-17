<?php
session_start();
ob_start();
if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "fotos/";
    $usuario_id=$_REQUEST["usuario_id"];
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg')
    {
      echo "extension"; 
    }
    else if ($size > 2048*2048)
    {
      echo "tamaño";
    }
    else
    {
        $extension=end(explode(".", $nombre));
        $src = $carpeta.$usuario_id.".".$extension;

        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='$src' width='250px' height='250px'>";
    }
}