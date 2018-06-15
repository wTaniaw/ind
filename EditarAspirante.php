<?php
if(isset($_REQUEST['aspirante_id'])){
$id_aspirante=$_REQUEST['aspirante_id'];
require_once("funciones.php");
$registro=ConsultarRegistro("Select * from Aspirantes where id=$id_aspirante");
$nombre=$registro["Nombre"];
$apellidop=$registro["ApellidoP"];
$apellidom=$registro["ApellidoM"];
$telefono=$registro["Telefono"];
$celular=$registro["Celular"];
$municipion=$registro["MunicipioN"];
$curp=$registro["CURP"];
$fechanacimiento=$registro["FechaNacimiento"];
$correo=$registro["Correo"];
$calle=$registro["Calle"];
$colonia=$registro["Colonia"];
$numero=$registro["Numero"];
}
?>
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

function Inscribir()
{
Cargando();
  $.post("Guardar.php?metodo=Inscribir&aspirante_id=<?php echo $id_aspirante ?>",function(data){

    if(data!="error")
    {
      MensajeB("El aspirante se inscribió correctamente");
      CerrarVentana();
      $("#ContenidoGeneral").html("");
      Abrir('Expediente.php?alumno_id='+data);
    }
    else{
    MensajeE("Ocurrió un error al inscribir el aspirante")  ;
    }
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
  var correo=$("#correo").val();
  var fecha=$("#fecha").val();
  var municipion=$("#municipion").val();
  var calle=$("#calle").val();
  var numero=$("#numero").val();
  var colonia=$("#colonia").val();
  var id_aspirante=$("#id_aspirante").val();

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
  $.post("Guardar.php?metodo=EditarAspirante&aspirante_id="+id_aspirante+"&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom+"&telefono="+telefono+"&celular="+celular+"&curp="+curp+"&correo="+correo+"&fecha="+fecha+"&municipion="+municipion+"&calle="+calle+"&numero="+numero+"&colonia="+colonia,function(data){
    ValidarGuardado(data,"El aspirante se guardó correctamente","Ocurrió un error al guardar el aspirante");
    CerrarVentana();
    Abrir('ListaAspirantes.php');
      });
}
else {
  MensajeE("Verifica los campos remarcados en rojo");
}
}


</script>
<input type="hidden" value="<?php echo $id_aspirante?>" id="id_aspirante">
    <h1>Confirmar Información de aspirante</h1><br>
    <table class="cell-hovered grid stiped table">
        <tbody>
            <tr>
                <td>
                  <b>Nombre</b><br>
                  <div class="input-control text"><input type="text" id="nombre" required="required" value="<?php echo $nombre?>"></div>
                </td>
                <td>
                  <b>Apellido paterno</b><br>
                  <div class="input-control text"><input type="text" id="apellidop" value="<?php echo $apellidop ?>"></div>
                </td>
                <td>
                  <b>Apellido materno</b><br>
                  <div class="input-control text"><input type="text" id="apellidom" value="<?php echo $apellidom ?>"></div>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Teléfono</b><br>
                  <div class="input-control text"><input type="text" id="telefono" required="required" value="<?php echo $telefono ?>"></div>
                </td>
                <td>
                  <b>Celular</b><br>
                  <div class="input-control text"><input type="text" id="celular" required="required" value="<?php echo $celular ?>"></div>
                </td>
                  <td>
                    <b>CURP</b><br>
                    <div class="input-control text"><input type="text" id="curp" required="required" value="<?php echo $curp ?>"></div>
                  </td>
                </td>
            </tr>
            <tr>
              <td>
                <b>Correo</b><br>
                <div class="input-control text "><input type="text" id="correo" required="required" value="<?php echo $correo ?>" data-role="popover" data-popover-position="bottom" data-popover-text="El correo debe tener el formato nombre@dominio.com" data-popover-background="bg-green" data-popover-color="fg-white" data-popover-mode="focus"></div>
              </td>
              <td>
                <b>Fecha nacimiento</b><br>
                <div class="input-control text " data-role="datepicker" data-scheme="darcula" data-effect='slide' data-locale='es' data-format="yyyy/mm/dd">
              <input type="text" id="fecha" required="required" value="<?php echo $fechanacimiento ?>">
              <button class="button"><span class="mif-calendar"></span></button>
              </div>
              </td>
                <td>
                  <b>Municipio nacimiento</b><br>
                  <div class="input-control select ">
                    <select id="municipion" required="required">
                      <option value="0" >Selecciona una opción</option>
                      <?php

              require_once("funciones.php");
              conectar();
              $resultado=mysql_query("select * from Municipios where Estado_id=8")or die(mysql_error());

                 while($filas=mysql_fetch_array($resultado))
              {
              $Nombre=$filas["Nombre"];
              $id=$filas["id"];
              ?>
                      <option value="<?php echo "$id"; ?>" <?php if($id==$municipion){ echo "selected";} ?> ><?php echo "$Nombre"; ?></option>
                  <?php
                   }
                   cerrar();
              ?>
                    </select>
                  </div>
                </td>
              </td>
          </tr>
          <tr>
            <td>
              <b>Calle</b><br>
              <div class="input-control text"><input type="text" id="calle" value="<?php echo $calle ?>"></div>
            </td>
            <td>
              <b>Número</b><br>
              <div class="input-control text"><input type="text" id="numero" required="required" value="<?php echo $numero ?>"></div>
            </td>
              <td>
                <b>Colonia</b><br>
                <div class="input-control text"><input type="text" id="colonia" required="required" value="<?php echo $colonia ?>"></div>
              </td>
            </td>
        </tr>
        <tr>
          <th colspan="3">
            <br>
            <input type="button" class="button success" value="Guardar" onclick="GuardarAspirante()">
            <input type="button" class="button danger" value="Inscribir" onclick="Inscribir()">
          </th>
        </tr>
        </tbody>
    </table>
