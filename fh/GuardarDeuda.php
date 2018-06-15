<?php
    require_once("funciones.php");
    $descripcion=$_REQUEST["descripcion"];
	$fechalimite=$_REQUEST["fechalimite"];
	$cantidad=$_REQUEST["cantidad"];
	$recurrente=$_REQUEST["recurrente"];
	$rec=0;
	if(isset($recurrente))
	{
		$rec=1;
	}
    $id=Insertar("insert into Deudas (Descripcion,FechaLimite,Cantidad,Recurrente,Activo) values('$descripcion','$fechalimite',$cantidad,$rec,1)");
    if(isset($id)){
		header("Location: Deuda.php?deuda_id=$id");
	}
?>