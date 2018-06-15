<?php 
$universidad_id=$_REQUEST["universidad_id"];
?>
<script>
	function GuardarCarrera()
	{
		var nombre=$("#nombre").val();
		$.post("Guardar.php?metodo=GuardarCarrera&universidad_id=<?php echo $universidad_id; ?>&nombre="+nombre,function(data){
			ValidarGuardado(data,"La carrera se guardó correctamente","Ocurrió un error al guardar la carrera");
			if(data=="bien")
			{
				Abrir("Estructura.php");
				CerrarVentana();
			}
		});
	}

</script>

<table class="table bordered hovered bordered sombra">
<thead>
	<tr>
		<th>Nombre</th>
		<th>Acción</th>
	</tr>
</thead>
	<tr>
		<td>
			<div class="input-control text">
			<input type="text" placeholder="Nombre de la carrera" id="nombre">
			</div>
		</td>
		<td>
			<input type="button" onclick="GuardarCarrera()" value="Guardar Carrera" class="button success sombra text-shadow">
		</td>
	</tr>

</table>