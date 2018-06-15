
<?php
session_start();
ob_start();
$usuario_id=$_SESSION['usuario_id'];
require_once("funciones.php");
$profesor=ConsultarRegistro("Select Docentes.*,u.Nombre as NombreUsuario from Docentes join Usuarios u on u.id=Docentes.Usuario_id where Usuario_id=$usuario_id");
 ?>
 <h1 class="text-shadow">Mi Perfil</h1><br>
<table class="hovered cell-hovered bordered sombra table">

	<tr>
		<th colspan="2">Nombre</th>
		<th rowspan="4">
 <script>
     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                  if(datos=="tamaño")
                  {
                    MensajeE("El tamaño máximo de la fotografía es de 2MB");
                  }
                  else if(datos=="extension")
                  {
                    MensajeE("La fotografía debe tener extensión .jpg");
                  }
                  else
                  {
                    MensajeB("La fotografía se guardó correctamente");
                    $("#respuesta").html("");
                    $("#respuesta").html(datos);
                    window.location="Docente.php?pagina=cuenta";
                  }

                }
            });
        });
     });
    </script>
  <center>
    <div id="respuesta"><img src="<?php echo "fotos/".$usuario_id.".jpg"; ?>" width="250px" height="250px" onerror="this.src='/img/Administrator.png';"></div><br>
 <form method="post" id="formulario" enctype="multipart/form-data">
    <div class="input-control file" data-role="input">
    <input type="file" name="file">
    <input type="hidden" value="<?php echo $usuario_id; ?>" name="usuario_id">
    <button class="button"><span class="mif-folder"></span></button>
</div>
 </form>

          <br></center>
		</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $profesor['Nombre']; ?> <?php echo $profesor['ApellidoP']; ?> <?php echo $profesor['ApellidoM']; ?></td>
	</tr>
	<tr>
		<th>Usuario</th>
		<th>Correo</th>
	</tr>
	<tr>
		<td><?php echo $profesor['NombreUsuario']?></td>
		<td><?php echo $profesor['Correo']?></td>
	</tr>
	<tr>
<td colspan="2">
	<center><input type="button" value="Cambiar contraseña" class="button sombra text-shadow success" onclick="Ventana('CambiarContrasena.php');"></center>
</td>
	</tr>
</table>