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
		$("#resultadosmaterias").load("CargarMateriasAsistencias.php?usuario_id=<?php echo $usuario_id?>&periodo_id="+periodo,function(data){
			CerrarLoader();
		});
	}
	$(document).ready(function(){
		$("#periodo").trigger("change");
	});
</script>
<h1 class="text-shadow">Asistencias</h1>
<br>
<table class="hovered cell-hovered bordered sombra table">
<thead>
<tr>
	<th><b>Periodo</b><br>
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
	</th>
	<th><b>Materia</b><br>
	<span id="resultadosmaterias"></span>
	</th>
	<th>
		<b>Fecha</b><br>
		<div class="input-control text " data-role="datepicker" data-scheme="darcula" data-effect='slide' data-locale='es' data-format="yyyy/mm/dd">
		<input type="text" id="fecha" required="required">
		<button class="button"><span class="mif-calendar"></span></button>
		</div>
	</th></tr><tr>
	<th colspan="3">
<center><input type="button" value="Cargar" onclick="CargarAlumnos()" class="button primary text-shadow sombra"></center>
	</th>
</tr>
</thead>

</table><br>
<div id="resultadosalumnos"></div>
