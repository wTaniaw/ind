<?php
$nombre=$_REQUEST["nombre"];
$apellidop=$_REQUEST["apellidop"];
$apellidom=$_REQUEST["apellidom"];
$telefono=$_REQUEST["telefono"];
$celular=$_REQUEST["celular"];
$municipion=$_REQUEST["municipion"];
$curp=$_REQUEST["curp"];
$fecha=$_REQUEST["fecha"];
$correo=$_REQUEST["correo"];
$calle=$_REQUEST["calle"];
$colonia=$_REQUEST["colonia"];
$numero=$_REQUEST["numero"];
require_once("funciones.php");
conectar();
$resultado=mysql_query("insert into Aspirantes values(0,'$nombre','$apellidop','$apellidom','$telefono','$celular',$municipion,'$curp','$fecha','$correo','$calle','$colonia','$numero',0)")or die(mysql_error());

if($resultado)
{
  echo "bien";
}else
{
  echo "error";
}
cerrar();
?>
