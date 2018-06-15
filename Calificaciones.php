<?php
session_start();
ob_start();
$usuario_id=$_SESSION["usuario_id"];
?>
<script>
	function CargarMaterias()
	{
		var periodo=$("#periodo").val();
		Cargando();
		$.get("CargarMateriasCalificaciones.php?usuario_id=<?php echo $usuario_id?>&periodo_id="+periodo,function(data){
			$("#resultadosmaterias").html(data)
		});	
	}
	$(document).ready(function(){
		$("#periodo").trigger("change");
	});
</script>
<h1 class="text-shadow">Calificaciones</h1>
<br>
<table class="hovered cell-hovered bordere sombra table">
<thead>
<tr>
	<td><b>Periodo</b><br>
		<?php
require_once("funciones.php");
$periodos=ConsultarLista("Select Periodos.Nombre,Periodos.id from Historialdocente join Docentes on Docentes.id=Historialdocente.Docente_id join Usuarios on Usuarios.id=Docentes.Usuario_id join Periodos on Periodos.id=Historialdocente.Periodo_id where Usuarios.id=$usuario_id group by Periodos.id order by Historialdocente.id desc");

echo '<div class="input-control select">';
echo '<select id="periodo" onchange="CargarMaterias()">';
while($periodo=mysql_fetch_array($periodos))
{
  $nombreperiodo=$periodo["Nombre"];
  $idperiodo=$periodo["id"];
  echo "<option value='$idperiodo'>$nombreperiodo</option>";
}
echo "</select>";
echo '</div>';
?>
	</td>
	<th><b>Materia</b><br>
	<span id="resultadosmaterias"></span>
	</th>
</tr>	
</thead>

</table><br>
<div id="resultadosalumnos"></div>