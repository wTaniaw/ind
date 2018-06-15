<?php 
if(isset($_REQUEST['hist_id'])){
$hist_id=$_REQUEST['hist_id'];
}
?>
<script>
function GuardarCal()
{

	var calif=$("#calif").val();
	if(VerificarCantidad("#calif",70))
    {
      if(VerificarCantidadMaximo("#calif",100))
      {
			Cargando();
			$.post("Guardar.php?metodo=GuardarCalificacion&calificacion="+calif+"&historial_id=<?php echo $hist_id; ?>",function(data){
			ValidarGuardado(data,"La calificación se guardó correctamente","Ocurrió un error al guardar la calificación");
			if(data=="bien"){
			CerrarVentana();
			CerrarLoader();
			$("#tdcal-<?php echo $hist_id; ?>").html(calif);
			}
			else
			{
			CerrarLoader();
			}
			});
		}
	}
}
</script>
<h2>Capturar o editar calificación</h2>
<div class="input-control text">
<input type="number" id="calif">
</div>
<input type="button" class="button sombra success text-shadow" onclick="GuardarCal()" value="Guardar">