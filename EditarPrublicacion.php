<?php
require_once("funciones.php");
$publicacion_id=$_REQUEST["publicacion_id"];
$profesor=ConsultarRegistro("Select * from Docentes where id=$profesor_id");
?>
<script>
$(document).ready(function(){
    ConvertirMayusculas("#nombre2");
    ConvertirMayusculas("#apellidop2");

});
function EditarPublicacion()
{
  {
    var titulo=$("#titulo").val();
    var texto=$("#texto").val();
    var textoboton=$("#textoboton").val();
    var colorboton=$('input:radio[name=colorboton]:checked').val()
    var imagen=$('input:radio[name=imagen]:checked').val()
    var colorfondo=$('input:radio[name=colorfondo]:checked').val()
    var link=$("#link").val();
    VerificarInput("#titulo");
    VerificarInput("#texto");
    if(
    VerificarInput("#titulo")&&
    VerificarInput("#texto")
  )
  {
    Cargando();
    $.post("Guardar.php?metodo=EditarPublicacion&titulo="+titulo+"&texto="+texto+"&textoboton="+textoboton+"&link="+link+"&colorboton="+colorboton+"&imagen="+imagen+"&colorfondo="+colorfondo,function(data){
      ValidarGuardado(data,"La publicación se guardó correctamente","Ocurrió un error al guardar la publicación");
      Abrir("Publicaciones.php");
      CerrarLoader();
      });
  }
  else {
    MensajeE("Verifica los campos remarcados en rojo");
  }
}

</script>
<h1>Información de profesor</h1><br>

<table class="cell-hovered stiped table">
    <tbody>
        <tr>
            <td>
              <b>Nombre</b><br>
              <div class="input-control text"><input value="<?php echo $profesor['Nombre']; ?>" type="text" id="nombre2" required="required"></div>
            </td>
            <td>
              <b>Apellido paterno</b><br>
              <div class="input-control text"><input type="text" id="apellidop2" value="<?php echo $profesor['ApellidoP']; ?>"></div>
            </td>
            <td>
              <b>Apellido materno</b><br>
              <div class="input-control text"><input type="text" id="apellidom2" value="<?php echo $profesor['ApellidoM']; ?>"></div>
            </td>
          </tr>
          <tr>
            <td>
              <b>Teléfono</b><br>
              <div class="input-control text"><input type="text" id="telefono2" required="required" value="<?php echo $profesor['Telefono']; ?>"></div>
            </td>
            <td>
              <b>Celular</b><br>
              <div class="input-control text"><input type="text" id="celular2" required="required" value="<?php echo $profesor['Celular']; ?>"></div>
            </td>
              <td>
                <b>CURP</b><br>
                <div class="input-control text"><input type="text" id="curp2" required="required" value="<?php echo $profesor['CURP']; ?>"></div>
              </td>
            </td>
        </tr>
        <tr>
          <td>
            <b>Correo</b><br>
            <div class="input-control text "><input type="text" id="correo2" required="required" value="<?php echo $profesor['Correo']; ?>" data-role="popover" data-popover-position="bottom" data-popover-text="El correo debe tener el formato nombre@dominio.com" data-popover-background="bg-green" data-popover-color="fg-white" data-popover-mode="focus"></div>
          </td>
          <td>
            <b>Fecha nacimiento</b><br>
            <div class="input-control text " data-role="datepicker" data-scheme="darcula" data-effect='slide' data-locale='es' data-format="yyyy/mm/dd">
          <input type="text" id="fecha2" required="required" value="<?php echo $profesor['FechaNacimiento']; ?>">
          <button class="button"><span class="mif-calendar"></span></button>
          </div>
          </td>
          </td>
          <tr>
          <td>
            <b>Dirección</b><br>
            <div class="input-control text "><input type="text" id="direccion2" required="required" value="<?php echo $profesor['Direccion']; ?>"></div>
          </td>
          <td>
            <b>Usuario</b><br>
            <?php
            $usuario_id=$profesor["Usuario_id"];
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
      <th colspan="3"><br><input type="button" class="button success" value="Guardar" onclick="EditarProfesor()"></th>
    </tr>
    </tbody>
</table>
