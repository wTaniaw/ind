<?php
$materia_id=$_REQUEST["materia_id"];
$materia=$_REQUEST["materia"];
$clave=$_REQUEST["clave"];
?>
<script>
	function EditarMateria()
	{
		var nombre=$("#nombre").val();
		var clave=$("#clave").val();
		$.post("Guardar.php?metodo=EditarMateria&materia_id=<?php echo $materia_id; ?>&nombre="+nombre+"&clave="+clave,function(data){
			ValidarGuardado(data,"La materia se guardó correctamente","Ocurrió un error al guardar la materia");
			if(data=="bien")
			{
				$("#materia-<?php echo $materia_id; ?>").html(nombre);
				$("#clave-<?php echo $materia_id; ?>").html(clave);
				CerrarVentana();
			}
		});
	}


</script>

<table class="table bordered hovered bordered sombra">
<thead>
	<tr>
		<th>Clave</th>
		<th>Nombre</th>
		<th>Acción</th>
	</tr>
</thead>
	<tr>
		<td>
			<div class="input-control text">
			<input type="text" placeholder="Clave de la materia" id="clave" value="<?php echo $clave; ?>">
			</div>
		</td>
		<td>
			<div class="input-control text">
			<input type="text" placeholder="Nombre de la materia" id="nombre" value="<?php echo $materia; ?>">
			</div>
		</td>

		<td>
			<input type="button" onclick="EditarMateria()" value="Guardar cambios" class="button success sombra text-shadow">
		</td>
	</tr>

</table>