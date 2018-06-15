<?php
$carrera_id=$_REQUEST["carrera_id"];
?>
<script>
	function GuardarMateria()
	{
		var nombre=$("#nombre").val();
		var grado=$("#grado").val();
		var clave=$("#clave").val();
		var gradotexto = $('#grado option:selected').text();
		$.post("Guardar.php?metodo=GuardarMateria&carrera_id=<?php echo $carrera_id; ?>&nombre="+nombre+"&grado="+grado+"&clave="+clave,function(data){

			if(data!="0")
			{
				MensajeB("La materia se guardó correctamente");
				$("#tablaplan").append("<tr ><td>"+gradotexto+"</td><td id='materia-"+data+"'>"+nombre+"</td><td><input type='button' onclick='AbrirMateria("+data+",\""+nombre+"\")' value='Editar Materia' class='button primary sombra text-shadow'></td></tr>");
				CerrarVentana();
			}
			else
			{
				MensajeE("Ocurrió un error al guardar la materia");
			}
		});
	}
</script>

<table class="table bordered hovered bordered sombra">
<thead>
	<tr>
		<th>Clave</th>
		<th>Nombre</th>
		<th>Grado</th>
		<th>Acción</th>
	</tr>
</thead>
	<tr>
	<td>
			<div class="input-control text">
			<input type="text" placeholder="Clave de la materia" id="clave">
			</div>
		</td>
		<td>
			<div class="input-control text">
			<input type="text" placeholder="Nombre de la materia" id="nombre">
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
			<input type="button" onclick="GuardarMateria()" value="Guardar Materia" class="button success sombra text-shadow">
		</td>
	</tr>

</table>