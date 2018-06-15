<?php
if(isset($_REQUEST['alumno_id'])){
$alumno_id=$_REQUEST['alumno_id'];
}
?>
<script>
function GuardarFolio()
{
	var folio=$("#folio").val();
	Cargando();
	$.post("Guardar.php?metodo=GuardarFolio&folio="+folio+"&alumno_id=<?php echo $alumno_id;?>",function(data){
		ValidarGuardado(data,"El folio se guardó correctamente","Ocurrió un error al guardar el folio");
		if(data=="bien"){
			$("#spanfolio").html(folio);
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
<h2>Capturar o editar folio</h2>
<div class="input-control text">
<input type="text" id="folio">
</div>
<input type="button" class="button sombra success text-shadow" onclick="GuardarFolio()" value="Guardar">