<?php
$id=$_REQUEST["id"];
require_once("funciones.php");
conectar();
$resultado=Ejecutar("update Elementos set Estatus='Regresada' ,FechaDevolucion=now() where id=$id");
if($resultado!=null)
{
  echo "bien";
}else
{
  echo "error";
}
cerrar();
?>