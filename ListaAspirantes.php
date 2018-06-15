<script>
    TablaDinamicaDefault("#tabla-listaaspirantes")
</script>
<h1><a href="javascript:history.back(1)" class="nav-button transform"><span></span></a> Lista de aspirantes</h1>
<table id="tabla-listaaspirantes" class="table hovered bordered border shadow">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Fecha registro</th>
        <th>Celular</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
        <?php
require_once("funciones.php");
conectar();
$resultado=mysql_query("select * from Aspirantes where Inscrito=0 and Activo=1")or die(mysql_error());
   while($filas=mysql_fetch_array($resultado))
{
  $id=$filas["id"];
$Nombre=$filas["Nombre"];
$ApellidoP=$filas["ApellidoP"];
$ApellidoM=$filas["ApellidoM"];
$Fecha=$filas["Fecha"];
$Celular=$filas["Celular"];
$Correo=$filas["Correo"];

?>
    <tr>
        <td><?php echo "$Nombre"; ?></td>
        <td><?php echo "$ApellidoP"; ?></td>
        <td><?php echo "$ApellidoM"; ?></td>
        <td><?php echo "$Fecha"; ?></td>
        <td><?php echo "$Celular"; ?></td>
        <td><?php echo "$Correo"; ?></td>
        <td><input type="button" value="Abrir" onclick="Ventana('EditarAspirante.php?aspirante_id=<?php echo "$id"; ?>')" class="button primary"></td>
    </tr>
    <?php
     }
     cerrar();
?>
    </tbody>
</table>
