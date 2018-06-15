<?php
require_once("funciones.php");
$res=Ejecutar("Select * from Administrativos");
while ($r=mysql_fetch_array($res)){
echo "Nombre: ".$r["Nombre"];
}
?>
