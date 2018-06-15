<?php require_once("funciones.php");
$carrera_id=$_REQUEST["carrera_id"];
$carrera=ConsultarValor("Select Nombre as valor from Carreras where id=$carrera_id");
?>
<script>
function AgregarMateria(id)
  {
    Ventana("NuevaMateria.php?carrera_id="+id);
  }
  function CrearGrupo(id)
  {
    Ventana("NuevoGrupo.php?carrera_id="+id);
  }
  function AbrirMateria(id,materia,clave)
  {
    Ventana("EditarMateria.php?materia_id="+id+"&materia="+materia+"&clave="+clave);
  }
  function EliminarMateria(id,materia)
  {
var r = confirm("¿Estas seguro(a) que deseas eliminar la materia: "+materia+"?");
if (r == true) {
    $.post("Guardar.php?metodo=EliminarMateria&materia_id="+id,function(data){
      if(data=="usada")
      {
        MensajeE("La materia es utilizada en el historial de algún alumno");
      }
      else
      {
        if(data=="bien")
        {
          $("#tr-"+id).fadeOut();
          MensajeB("La materia se eliminó correctamente");
        }
        else
        {
          MensajeE("Ocurrió un error al eliminar la materia");
        }

      }

    });
  }
}
 function EliminarGrupo(id)
  {
var r = confirm("¿Estas seguro(a) que deseas eliminar el grupo?");
if (r == true) {
    $.post("Guardar.php?metodo=EliminarGrupo&grupo_id="+id,function(data){
        if(data=="bien")
        {
          $("#grupo-"+id).fadeOut();
          MensajeB("El grupo se eliminó correctamente");
        }
        else
        {
          MensajeE("Ocurrió un error al eliminar el grupo");
        }
    });
  }
}
  $(document).ready(function(){
  	TablaDinamicaDefault("#tablaplan");
  });
</script>
<h1 class="text-shadow"><span class="mif-arrow-left mif-ani-fast mif-ani-hover-horizontal sombra" style="border-radius:50%;border: 2px solid green;font-size:30px" onclick="Abrir('Estructura.php')"></span> Carrera: <?php echo $carrera; ?></h1><br>
<div class="tabcontrol bordered border sombra" data-role="tabcontrol">
      <ul class="tabs">
          <li><a href="#Grupos">Grupos</a></li>
          <li><a href="#Plan">Plan de estudio</a></li>
      </ul>
      <div class="frames" style="background-color:white;">
        <div class="frame" id="Grupos" style="background-color:white;padding:20px">
<br><input type="button" value="Crear grupo" class="button success sombra text-shadow" onclick="CrearGrupo(<?php echo $carrera_id; ?>)">
<table class="table hovered bordered border sombra" id="">
<thead>
<tr>
<th>Clave</th>
<th>Nombre</th>
<th>Grado</th>
<th>Periodo</th>
<th>Acciones</th>
</tr>
</thead>
<?php
$rs=ConsultarLista("Select Grupos.id as id,Grados.Nombre as grado,Grupos.Nombre as Nombre,Periodos.Nombre as periodo from Grupos join Periodos on Periodos.id=Grupos.Periodo_id join Grados on Grados.id=Grupos.Grado_id where Carrera_id=$carrera_id order by Periodos.FechaInicio desc");
while($registro=mysql_fetch_array($rs))
{
$periodo=$registro["periodo"];
$grado=$registro["grado"];
$nombre=$registro["Nombre"];
$grupo_id=$registro["id"];
?>
<tr  id="grupo-<?php echo $grupo_id; ?>">
<td style="cursor:pointer" onclick="Abrir('Alumnos.php?grupo_id=<?php echo $grupo_id; ?>')"><?php echo $grupo_id;?></td>
<td style="cursor:pointer" onclick="Abrir('Alumnos.php?grupo_id=<?php echo $grupo_id; ?>')"><?php echo $nombre;?></td>
<td style="cursor:pointer" onclick="Abrir('Alumnos.php?grupo_id=<?php echo $grupo_id; ?>')"><?php echo $grado;?></td>
<td style="cursor:pointer" onclick="Abrir('Alumnos.php?grupo_id=<?php echo $grupo_id; ?>')"> <?php echo $periodo;?></td>
<td><input type="button" class="sombra button text-shadow danger" value="Eliminar" onclick="EliminarGrupo(<?php echo $grupo_id; ?>)"></td>
</tr>
<?php
}
?>
</table>
<br><br>
</div>
<div class="frame" id="Plan" style="background-color:white;padding:20px">
<br><input type="button" value="Agregar materia" class="button success sombra text-shadow" onclick="AgregarMateria(<?php echo $carrera_id; ?>)">
<table class="table hovered bordered border sombra" id="tablaplan">
<thead>
<tr>
<th>Clave</th>
<th>Grado</th>
<th>Materia</th>
<th>Acciones</th>
</tr>
</thead>
<?php
$rs=ConsultarLista("Select m.Clave as clave,m.Nombre as materia,g.Nombre as grado,m.id as materia_id from Planes p join Grados g on g.id=p.Grado_id join Materias m on m.id=p.Materia_id where Carrera_id=$carrera_id order by g.Numero");
while($registro=mysql_fetch_array($rs))
{
$materia=$registro["materia"];
$materia_id=$registro["materia_id"];
$grado=$registro["grado"];
$clave=$registro["clave"];
?>
<tr id="tr-<?php echo $materia_id?>">
<td id="clave-<?php echo $materia_id; ?>"><?php echo $clave;?></td>
<td><?php echo $grado;?></td>
<td id="materia-<?php echo $materia_id; ?>"><?php echo $materia;?></td>
<td>
      <input type="button" onclick="AbrirMateria(<?php echo $materia_id; ?>,'<?php echo $materia; ?>','<?php echo $clave; ?>')" value="Editar Materia" class="button primary sombra text-shadow">
      <input type="button" onclick="EliminarMateria(<?php echo $materia_id; ?>,'<?php echo $materia; ?>')" value="Eliminar Materia" class="button danger sombra text-shadow">
      </td>

</tr>
<?php
}
?>
</table>
<br><br>
</div>
</div>
</div>