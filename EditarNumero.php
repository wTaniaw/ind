<?php
if(isset($_REQUEST['alumno_id'])){
$alumno_id=$_REQUEST['alumno_id'];
}
?>
<script>
function GuardarNcertificado()
{
	var ncertificado=$("#ncertificado").val();
	Cargando();
	$.post("Guardar.php?metodo=GuardarNcertificado&ncertificado="+ncertificado+"&alumno_id=<?php echo $alumno_id;?>",function(data){
		ValidarGuardado(data,"El No. de certificado se guardó correctamente","Ocurrió un error al guardar el no. de certificado");
		if(data=="bien"){
			$("#spancertificado").html(ncertificado);
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
<h2>Capturar o editar No. de certificado</h2>
<div class="input-control text">
<input type="text" id="ncertificado">
</div>
<input type="button" class="button sombra success text-shadow" onclick="GuardarNcertificado()" value="Guardar">