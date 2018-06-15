<!DOCTYPE html>

<?php
include("Menuprincipal.php");
?>

<style type="text/css">
	body{
		font-size:14px;
		color:#2E2E2E;
	}
	h2{
		color:#084B8A;
	}
	h3{
		color:#FA8258;
	}
</style>
	<script>
$(document).ready(function(){
  $("#nombre").focus();
    ConvertirMayusculas("#nombre");
    ConvertirMayusculas("#apellidop");
    ConvertirMayusculas("#apellidom");
    ConvertirMayusculas("#curp");
    ConvertirMayusculas("#calle");
    ConvertirMayusculas("#numero");
    ConvertirMayusculas("#colonia");
});

function CargarMunicipios()
{
  var estadon=$("#estadon").val();
  $.get("Municipios.php?estadon="+estadon,function(data){
    $("#divmunicipio").html(data);
  });
}
function GuardarAspirante()
{
  var nombre=$("#nombre").val();
  var apellidop=$("#apellidop").val();
  var apellidom=$("#apellidom").val();
  var telefono=$("#telefono").val();
  var celular=$("#celular").val();
  var curp=$("#curp").val();
  var genero=$("#genero").val();
  var correo=$("#correo").val();
  var fecha=$("#fecha").val();
  var municipion=$("#municipion").val();
  var calle=$("#calle").val();
  var numero=$("#numero").val();
  var colonia=$("#colonia").val();

  VerificarInput("#nombre");
  VerificarInput("#apellidop");
  VerificarInput("#apellidom");
  VerificarInput("#telefono");
  VerificarInput("#celular");
  VerificarNumLetras("#curp",18);
  VerificarCorreo("#correo");
  VerificarInput("#fecha");
  VerificarSelect("#municipion");
  VerificarInput("#calle");
  VerificarInput("#numero");
  VerificarInput("#colonia");

  if(
  VerificarInput("#nombre")&&
  VerificarInput("#apellidop")&&
  VerificarInput("#apellidom")&&
  VerificarInput("#telefono")&&
  VerificarInput("#celular")&&
  VerificarNumLetras("#curp",18)&&
  VerificarCorreo("#correo")&&
  VerificarInput("#fecha")&&
  VerificarSelect("#municipion")&&
  VerificarInput("#calle")&&
  VerificarInput("#numero")&&
  VerificarInput("#colonia")
)
{
 	 $.post("Guardar.php?metodo=GuardarAspirante&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom+"&telefono="+telefono+"&celular="+celular+"&curp="+curp+"&correo="+correo+"&fecha="+fecha+"&municipion="+municipion+"&calle="+calle+"&numero="+numero+"&colonia="+colonia+"&genero="+genero,function(data){
    if(data=="bien")
    {
    alert("El aspirante se guardó correctamente");
	}
	else
	{
	alert("Ocurrió un error al guardar el aspirante");	
	}
});
}
else {

  alert("Verifica que la información esté completa, CURP 18 dígitos, todos los campos son obligatorios");
}
}


</script>
<body>
<center>
<br>

<br>
<h2 style="width:70%">Registro de aspirantes</h2><br>
<p style="width:70%" align="justify">

    

    <table class="cell-hovered grid stiped table">
        <tbody>
            <tr>
                <td>
                  <b>Nombre</b><br>
                  <div class="input-control text"><input type="text" id="nombre" required="required"></div>
                </td>
                <td>
                  <b>Apellido paterno</b><br>
                  <div class="input-control text"><input type="text" id="apellidop"></div>
                </td>
                <td>
                  <b>Apellido materno</b><br>
                  <div class="input-control text"><input type="text" id="apellidom"></div>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Teléfono</b><br>
                  <div class="input-control text"><input type="text" id="telefono" required="required"></div>
                </td>
                <td>
                  <b>Celular</b><br>
                  <div class="input-control text"><input value="614-" type="text" id="celular" required="required"></div>
                </td>
                  <td>
                    <b>CURP</b><br>
                    <div class="input-control text"><input type="text" id="curp" required="required"></div>
                  </td>
                </td>
            </tr>
            <tr>
              <td>
                <b>Correo</b><br>
                <div class="input-control text "><input type="text" id="correo" required="required" data-role="popover" data-popover-position="bottom" data-popover-text="El correo debe tener el formato nombre@dominio.com" data-popover-background="bg-green" data-popover-color="fg-white" data-popover-mode="focus"></div>
              </td>
              <td>
                <b>Fecha nacimiento</b><br>
                <div class="input-control text " data-role="datepicker" data-scheme="darcula" data-effect='slide' data-locale='es' data-format="yyyy/mm/dd">
              <input type="date" id="fecha" required="required">
              
              </div>
              </td>
                <td>
                  <b>Estado nacimiento</b><br>
                  <div class="input-control select ">
                    <select id="estadon" required="required" onchange="CargarMunicipios()">
                      <option value="0">Selecciona una opción</option>
                      <?php
              require_once("funciones.php");
              conectar();
              $resultado=mysql_query("select * from Estados")or die(mysql_error());
                 while($filas=mysql_fetch_array($resultado))
              {
              $Nombre=$filas["Estado"];
              $id=$filas["id"];
              ?>
                      <option value="<?php echo "$id"; ?>"><?php echo "$Nombre"; ?></option>
                  <?php
                   }
                   cerrar();
              ?>
                    </select>
                  </div>
                  <div id="divmunicipio"></div>
                </td>
              </td>
          </tr>
          <tr>
            <td>
              <b>Calle</b><br>
              <div class="input-control text"><input type="text" id="calle" ></div>
            </td>
            <td>
              <b>Número</b><br>
              <div class="input-control text"><input type="text" id="numero" required="required"></div>
            </td>
              <td>
                <b>Colonia</b><br>
                <div class="input-control text"><input type="text" id="colonia" required="required"></div>
              </td>
            </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <b>Género</b><br>
            <div class="input-control select ">
                 <select id="genero" required="required">
                 <option value="Femenino">Femenino</option>
                 <option value="Masculino">Masculino</option>
                 </select>
            </div>            
          </td>
          <td></td>
        </tr>
        <tr>
          <th colspan="3"><br><center><input type="button" class="button" value="Guardar" onclick="GuardarAspirante()"></center></th>
        </tr>
        </tbody>
    </table>

</p>
<br><br>
</center><br><br><br>
</body>
<?php include("footer.php"); ?>
</html>