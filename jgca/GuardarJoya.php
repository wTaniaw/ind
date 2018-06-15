<?php
$tipo=$_REQUEST["tipo"];
$precio=$_REQUEST["precio"];
$cantidad=$_REQUEST["cantidad"];
require_once("funciones.php");
$historialnuevo="";
for($i=1;$i<=$cantidad;$i++)
{
$historialnuevo=Insertar("insert into Elementos(Tipo,Precio,Estatus,FechaAdquisicion) values('$tipo',$precio,'Adquirida',now())");
}
if($historialnuevo!=null)
{
  echo "bien";
}else
{
  echo "error";
}
?>