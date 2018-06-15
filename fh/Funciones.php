<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
function conectar(){
		$res=mysql_connect("107.180.56.151","iineedsistema","Sistema1");
		//$res=mysql_connect("localhost","iineedsistema","Sistema1");
		//$res=mysql_connect("localhost","root","root");
	    mysql_select_db('FinaHome');
	    mysql_query("SET NAMES 'utf8'");
		return $res;
}
function Ejecutar($consulta)
{
	$link=conectar();
	$rs=mysql_query($consulta,$link)or die("Error en: $consulta: " . mysql_error());
	mysql_close($link);
	return $rs;
}
function Insertar($consulta)
{
	$link=conectar();
	$rs=mysql_query($consulta,$link)or die("Error en: $consulta: " . mysql_error());
	$id=mysql_insert_id();
	mysql_close($link);
	return $id;
}

function cerrar(){
    	mysql_close();
}

function ConsultarLista($quer){
	$link=conectar(); 
	$rs=mysql_query($quer,$link)or die("Error en: $quer: " . mysql_error());
	mysql_close($link);
	return $rs;
}
function ConsultarRegistro($consulta)
{
	$link=conectar();
	$rs=mysql_query($consulta,$link)or die("Error en: $consulta: " . mysql_error());
	$resultado=mysql_fetch_array($rs);
	mysql_close($link);
	return $resultado;
}

function ObtenerUsuario()
{
	return $_SESSION["usuario_id"];
}

function Fecha($fecha)
{
	if(isset($fecha) && $fecha!=""){
	$fechali=date_create($fecha);
	return date_format($fechali, 'd-M-y');
}
else{
	return "Sin Registro";
}
}
Function Activo($activo)
{
	if($activo==1)
	{
		return "Si";
	}
	else{
		return "No";
	}
}

function ConsultarValor($consulta)
{
	/*Es necesario que en la consulta se redefina el valor consultado al nombre valor*/
	$link=conectar();
	$rs=mysql_query($consulta,$link)or die("Error en: $consulta: " . mysql_error());
	$resultado=mysql_fetch_array($rs);
	$nombre=$resultado["valor"];
	mysql_close($link);
	return $nombre;
}

    ?>
