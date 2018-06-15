<?php 
if(isset($_REQUEST['alumno_id'])){
$alumno_id=$_REQUEST['alumno_id'];
}
?>
<script>
function GuardarMat()
{
	var matricula=$("#matricula").val();
	Cargando();
	$.post("Guardar.php?metodo=GuardarMatricula&matricula="+matricula+"&alumno_id=<?php echo $alumno_id;?>",function(data){
		ValidarGuardado(data,"La matrícula se guardó correctamente","Ocurrió un error al guardar la matrícula");
		if(data=="bien"){
			$("#spanmatricula").html(matricula);
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
<h2>Capturar o editar matrícula</h2>
<div class="input-control text">
<input type="text" id="matricula">
</div>
<input type="button" class="button sombra success text-shadow" onclick="GuardarMat()" value="Guardar">