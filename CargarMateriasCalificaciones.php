<script type="text/javascript">
function CargarAlumnos()
	{
		var grupo=$("#grupo").val();
		Cargando();
		$.get("CargarAlumnosCalificaciones.php?historial_id="+grupo,function(data){
			$("#resultadosalumnos").html(data);
			CerrarLoader();
		});
	}
	$(document).ready(function(){
		$("#grupo").trigger("change");
	});

</script>
<?php
require_once("funciones.php");
$periodo_id=$_REQUEST["periodo_id"];
$usuario_id=$_REQUEST["usuario_id"];
$listamaterias=ConsultarLista("Select m.Nombre,Grupos.Nombre as grupo, Historialdocente.id as h_id from Historialdocente join Docentes on Docentes.id=Historialdocente.Docente_id join Usuarios on Usuarios.id=Docentes.Usuario_id join Materias m on m.id=Historialdocente.Materia_id  join Grupos on Grupos.id=Historialdocente.Grupo_id join Periodos on Periodos.id=Historialdocente.Periodo_id where Usuarios.id=$usuario_id and Periodos.id=$periodo_id ");
echo '<div class="input-control select">';
echo '<select id="grupo" style="width:400px" onchange="CargarAlumnos()">';
while($periodo=mysql_fetch_array($listamaterias))
{
  $nombremateria=$periodo["Nombre"];
  $grupo=$periodo["grupo"];
  $historial_id=$periodo["h_id"];
  echo "<option value='".$historial_id."'>".$nombremateria." - ".$grupo."</option>";
}
echo "</select>";
echo '</div>';
?>
