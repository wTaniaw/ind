<?php
session_start();
ob_start();
$usuario_id=$_SESSION['usuario_id'];
require_once("funciones.php");
$administrativo=ConsultarRegistro("Select * from Usuarios where id=$usuario_id");
 ?>
 <script>
 function GuardarContrasena()
 {
 	var anterior=$("#contrasenaanterior").val();
 	var nueva=$("#contrasenanueva").val();
 	var nueva2=$("#confirmanueva").val();
	$.post("Guardar.php?metodo=GuardarContrasena&anterior="+anterior+"&nueva="+nueva+"&nueva2="+nueva2+"&usuario_id=<?php echo $usuario_id;?>",function(data){

			if(data=="bien"){
				MensajeB("La contraseña se guardó correctamente");
			}
			else if (data=="confirmacion")
			{
				MensajeE("La contraseña proporcionada y la confirmación no coinciden");
			}
			else if(data=="anterior")
			{
				MensajeE("La contraseña anterior no coincide con la guardada en el sistema");
			}
			else
			{
				MensajeE("Ocurrió un error al guardar la contraseña");
			}

			CerrarVentana();
			CerrarLoader();
			});
}
 </script>
 <h2 class="text-shadow">Cambiar contraseña</h2><br>

 <b>Contraseña anterior</b> <div class="input-control text"><input type="password" id="contrasenaanterior"></div><br>
 <b>Contraseña nueva</b> <div class="input-control text"><input type="password" id="contrasenanueva"></div><br>
 <b>Confirma la contraseña nueva</b> <div class="input-control text"><input type="password" id="confirmanueva"></div><br>
 <input type="button" value="Guardar contraseña" class="button sombra text-shadow success" onclick="GuardarContrasena()">
</div>