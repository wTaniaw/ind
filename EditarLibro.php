<?php
if(isset($_REQUEST['alumno_id'])){
$alumno_id=$_REQUEST['alumno_id'];
}
?>
<script>
function GuardarLibro()
{
	var libro=$("#libro").val();
	Cargando();
	$.post("Guardar.php?metodo=GuardarLibro&libro="+libro+"&alumno_id=<?php echo $alumno_id;?>",function(data){
		ValidarGuardado(data,"El libro se guardó correctamente","Ocurrió un error al guardar el libro");
		if(data=="bien"){
			$("#spanlibro").html(libro);
			CerrarVentana();
			CerrarLoader();
		}
		else
		{
			CerrarLoader();
		}
	});
}
</script>
<h2>Capturar o editar libro</h2>
<div class="input-control text">
<input type="text" id="libro">
</div>
<input type="button" class="button sombra success text-shadow" onclick="GuardarLibro()" value="Guardar">