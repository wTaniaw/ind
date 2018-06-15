<?php
$matricula=$_REQUEST['matricula'];
$nombre=$_REQUEST['nombre'];
$apellidop=$_REQUEST['apellidop'];
$apellidom=$_REQUEST['apellidom'];
require_once("funciones.php");
$rs=ConsultarLista("Select a.id as alumno_id,a.Matricula,asp.Nombre,asp.ApellidoP,asp.ApellidoM from Alumnos a join Aspirantes asp on asp.id=a.Aspirante_id where asp.Nombre like '%$nombre%' and asp.ApellidoP like '%$apellidop%' and asp.ApellidoM like '%$apellidom%' and Matricula like '%$matricula%'");
?>
<table class="border bordered hovered table sombra">
<thead>
  <tr>
<th>Matrícula</th>
<th>Nombre</th>
<th>Apellido paterno</th>
<th>Apellido materno</th>
<th>Acciones</th>
  </tr>
</thead>
<tbody>
  <?php
while($resultado=mysql_fetch_array($rs))
{
  $matricula=$resultado["Matricula"];
  $nombre=$resultado["Nombre"];
  $apellidop=$resultado["ApellidoP"];
  $apellidom=$resultado["ApellidoM"];
  $alumno_id=$resultado["alumno_id"];
  ?>
<tr>
<td><?php echo $matricula;?></td>
<td><?php echo $nombre;?></td>
<td><?php echo $apellidop;?></td>
<td><?php echo $apellidom;?></td>
<td>
<input type="button" class="button warning text-shadow sombra" onclick="Abrir('Expediente.php?alumno_id=<?php echo $alumno_id?>')" value="Abrir expediente">
</td>
  </tr>
  <?php }?>
</tbody>
</table>
