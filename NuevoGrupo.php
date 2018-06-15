<?php 
$carrera_id=$_REQUEST["carrera_id"];
?>
<script>
	function GuardarGrupo()
	{
		var nombre=$("#nombre").val();
		var periodo=$("#periodo").val();
		var grado=$("#grado").val();
		$.post("Guardar.php?metodo=GuardarGrupo&carrera_id=<?php echo $carrera_id; ?>&nombre="+nombre+"&grado="+grado+"&periodo="+periodo,function(data){
			ValidarGuardado(data,"El grupo se guardó correctamente","Ocurrió un error al guardar el grupo");
			if(data=="bien")
			{
				Abrir("Carrera.php?carrera_id=<?php echo $carrera_id; ?>");
				CerrarVentana();
			}
		});
	}

</script>

<table class="table bordered hovered bordered sombra">
<thead>
	<tr>
		<th>Nombre</th>
		<th>Grado</th>
		<th>Periodo</th>
		<th>Acción</th>
	</tr>
</thead>
	<tr>
		<td>
			<div class="input-control text">
			<input type="text" placeholder="Nombre del grupo" id="nombre">
			</div>
		</td>
		<td>
						<?php
			require_once("funciones.php");
			$grados=ConsultarLista("Select * from Grados");
			echo '<div class="input-control select">';
			echo '<select id="grado">';
			while($grado=mysql_fetch_array($grados))
			{
			  $nombregrado=$grado["Nombre"];
			  $idgrado=$grado["id"];
			  echo "<option value='$idgrado'>$nombregrado</option>";
			}
			echo "</select>";
			echo '</div>';
			?>
		</td>
		<td>
			<?php
			require_once("funciones.php");
			$periodoactivo=ConsultarValor("Select id as valor from Periodos where Activo =1");
			$periodos=ConsultarLista("Select * from Periodos order by id desc");
			echo '<div class="input-control select">';
			echo '<select id="periodo">';
			while($periodo=mysql_fetch_array($periodos))
			{
			  $nombreperiodo=$periodo["Nombre"];
			  $idperiodo=$periodo["id"];
			  echo "<option value='$idperiodo'";
			  if($periodoactivo==$idperiodo)
			  {
			      echo "selected";
			  }
			  echo ">$nombreperiodo</option>";
			}
			echo "</select>";
			echo '</div>';
			?>
		</td>
		<td>
			<input type="button" onclick="GuardarGrupo()" value="Guardar Grupo" class="button success sombra text-shadow">
		</td>
	</tr>

</table>