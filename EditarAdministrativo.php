<?php
require_once("funciones.php");
$administrativo_id=$_REQUEST["administrativo_id"];
$administrativo=ConsultarRegistro("Select * from Administrativos where id=$administrativo_id");
?>
<script>
$(document).ready(function(){
  $("#nombre2").focus();
    ConvertirMayusculas("#nombre2");
    ConvertirMayusculas("#apellidop2");
    ConvertirMayusculas("#apellidom2");
    ConvertirMayusculas("#curp2");
    ConvertirMayusculas("#direccion2");
});
function EditarAdministrativo()
{
  var nombre=$("#nombre2").val();
  var apellidop=$("#apellidop2").val();
  var apellidom=$("#apellidom2").val();
  var telefono=$("#telefono2").val();
  var celular=$("#celular2").val();
  var curp=$("#curp2").val();
  var correo=$("#correo2").val();
  var fecha=$("#fecha2").val();
  var usuario=$("#usuario2").val();
  var contra=$("#contra2").val();
  var direccion=$("#direccion2").val();

  VerificarInput("#nombre2");
  VerificarInput("#apellidop2");
  VerificarInput("#apellidom2");
  VerificarInput("#telefono2");
  VerificarInput("#celular2");
  VerificarNumLetras("#curp2",18);
  VerificarCorreo("#correo2");
  VerificarInput("#fecha2");
  VerificarInput("#usuario2");
  VerificarInput("#contra2");
  VerificarInput("#direccion2");
  if(
  VerificarInput("#nombre2")&&
  VerificarInput("#apellidop2")&&
  VerificarInput("#apellidom2")&&
  VerificarInput("#telefono2")&&
  VerificarInput("#celular2")&&
  VerificarNumLetras("#curp2",18)&&
  VerificarCorreo("#correo2")&&
  VerificarInput("#fecha2")&&
  VerificarInput("#direccion2")&&
  VerificarInput("#contra2")&&
  VerificarInput("#usuario2")
)
{
  Cargando();
  $.post("Guardar.php?metodo=EditarAdministrativo&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom+"&telefono="+telefono+"&celular="+celular+"&curp="+curp+"&correo="+correo+"&fecha="+fecha+"&direccion="+direccion+"&usuario="+usuario+"&contra="+contra+"&administrativo_id=<?php echo $administrativo_id;?>",function(data){
    ValidarGuardado(data,"El administrativo se guardó correctamente","Ocurrió un error al guardar el administrativo");
    Abrir("Administrativos.php");
    CerrarVentana();
    CerrarLoader();
      });
}
else {
  MensajeE("Verifica los campos remarcados en rojo");
}
}

</script>
<h1>Información de administrativo</h1><br>

<table class="cell-hovered stiped table">
    <tbody>
        <tr>
            <td>
              <b>Nombre</b><br>
              <div class="input-control text"><input value="<?php echo $administrativo['Nombre']; ?>" type="text" id="nombre2" required="required"></div>
            </td>
            <td>
              <b>Apellido paterno</b><br>
              <div class="input-control text"><input type="text" id="apellidop2" value="<?php echo $administrativo['ApellidoP']; ?>"></div>
            </td>
            <td>
              <b>Apellido materno</b><br>
              <div class="input-control text"><input type="text" id="apellidom2" value="<?php echo $administrativo['ApellidoM']; ?>"></div>
            </td>
          </tr>
          <tr>
            <td>
              <b>Teléfono</b><br>
              <div class="input-control text"><input type="text" id="telefono2" required="required" value="<?php echo $administrativo['Telefono']; ?>"></div>
            </td>
            <td>
              <b>Celular</b><br>
              <div class="input-control text"><input type="text" id="celular2" required="required" value="<?php echo $administrativo['Celular']; ?>"></div>
            </td>
              <td>
                <b>CURP</b><br>
                <div class="input-control text"><input type="text" id="curp2" required="required" value="<?php echo $administrativo['CURP']; ?>"></div>
              </td>
            </td>
        </tr>
        <tr>
          <td>
            <b>Correo</b><br>
            <div class="input-control text "><input type="text" id="correo2" required="required" value="<?php echo $administrativo['Correo']; ?>" data-role="popover" data-popover-position="bottom" data-popover-text="El correo debe tener el formato nombre@dominio.com" data-popover-background="bg-green" data-popover-color="fg-white" data-popover-mode="focus"></div>
          </td>
          <td>
            <b>Fecha nacimiento</b><br>
            <div class="input-control text " data-role="datepicker" data-scheme="darcula" data-effect='slide' data-locale='es' data-format="yyyy/mm/dd">
          <input type="text" id="fecha2" required="required" value="<?php echo $administrativo['FechaNacimiento']; ?>">
          <button class="button"><span class="mif-calendar"></span></button>
          </div>
          </td>
          </td>
          <tr>
          <td>
            <b>Dirección</b><br>
            <div class="input-control text "><input type="text" id="direccion2" required="required" value="<?php echo $administrativo['Direccion']; ?>"></div>
          </td>
          <td>
            <b>Usuario</b><br>
            <?php
            $usuario_id=$administrativo["Usuario_id"];
             $usuario=ConsultarRegistro("Select * from Usuarios where id=$usuario_id");
             $nomusuario=$usuario["Nombre"];
             $contra=$usuario["Contrasena"];
            ?>
            <div class="input-control text "><input type="text" id="usuario2" required="required" value="<?php echo $nomusuario; ?>"></div>
          </td>
          <td>
            <b>Contraseña</b><br>
            <div class="input-control text "><input type="text" id="contra2" required="required" value="<?php echo $contra; ?>"></div>
          </td>
      </tr>
    <tr>
      <th colspan="3"><br><input type="button" class="button success" value="Guardar" onclick="EditarAdministrativo()"></th>
    </tr>
    </tbody>
</table>
