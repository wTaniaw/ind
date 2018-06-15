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
    $carpeta = "images/slider/";
    
    if ($size > 2048*2048)
    {
      echo "tamaño";
    }
    else
    {
        $extension=end(explode(".", $nombre));
echo "haber si llega qui";
       require_once("funciones.php");
       $id=Insertar("insert into Banner values(0,'$extension',1)");
       
        $src = $carpeta.$id.".".$extension;
        move_uploaded_file($ruta_provisional, $src);
    }
}