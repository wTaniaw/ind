<script>
$(document).ready(function(){
  $("#nombre").focus();
  TablaDinamicaDefault("#tablaadministrativos");
    ConvertirMayusculas("#nombre");
    ConvertirMayusculas("#apellidop");
    ConvertirMayusculas("#apellidom");
    ConvertirMayusculas("#curp");
    ConvertirMayusculas("#direccion");
});
function GuardarAdministrativo()
{
  var nombre=$("#nombre").val();
  var apellidop=$("#apellidop").val();
  var apellidom=$("#apellidom").val();
  var telefono=$("#telefono").val();
  var celular=$("#celular").val();
  var curp=$("#curp").val();
  var correo=$("#correo").val();
  var fecha=$("#fecha").val();
  var usuario=$("#usuario").val();
  var contra=$("#contra").val();
  var direccion=$("#direccion").val();

  VerificarInput("#nombre");
  VerificarInput("#apellidop");
  VerificarInput("#apellidom");
  VerificarInput("#telefono");
  VerificarInput("#celular");
  VerificarNumLetras("#curp",18);
  VerificarCorreo("#correo");
  VerificarInput("#fecha");
  VerificarInput("#usuario");
  VerificarInput("#contra");
  VerificarInput("#direccion");
  if(
  VerificarInput("#nombre")&&
  VerificarInput("#apellidop")&&
  VerificarInput("#apellidom")&&
  VerificarInput("#telefono")&&
  VerificarInput("#celular")&&
  VerificarNumLetras("#curp",18)&&
  VerificarCorreo("#correo")&&
  VerificarInput("#fecha")&&
  VerificarInput("#direccion")&&
  VerificarInput("#contra")&&
  VerificarInput("#usuario")
)
{
  Cargando();
  $.post("Guardar.php?metodo=GuardarAdministrativo&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom+"&telefono="+telefono+"&celular="+celular+"&curp="+curp+"&correo="+correo+"&fecha="+fecha+"&direccion="+direccion+"&usuario="+usuario+"&contra="+contra,function(data){
    ValidarGuardado(data,"El Administrativo se guardó correctamente","Ocurrió un error al guardar el Administrativo");
    Abrir("Administrativos.php");
    CerrarLoader();
      });
}
else {
  MensajeE("Verifica los campos remarcados en rojo");
}
}
function AbrirAdministrativo(id)
{
  Ventana("EditarAdministrativo.php?administrativo_id="+id);
}

</script>
<center>
<h1 class="text-shadow">Administrativos</h1>
<div class="tabcontrol bordered border sombra" data-role="tabcontrol">
    <ul class="tabs">
        <li><a href="#Nuevo">Capturar nuevo</a></li>
        <li><a href="#Busqueda">Búsqueda</a></li>
    </ul>
    <div class="frames" style="background-color:white;">
      <div class="frame" id="Nuevo" style="background-color:white;padding:20px">

            <table class="cell-hovered stiped table">
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
                      <input type="text" id="fecha" required="required">
                      <button class="button"><span class="mif-calendar"></span></button>
                      </div>
                      </td>
                      </td>
                      <tr>
                      <td>
                        <b>Dirección</b><br>
                        <div class="input-control text "><input type="text" id="direccion" required="required" ></div>
                      </td>
                      <td>
                        <b>Usuario</b><br>
                        <div class="input-control text "><input type="text" id="usuario" required="required"></div>
                      </td>
                      <td>
                        <b>Contraseña</b><br>
                        <div class="input-control text "><input type="text" id="contra" required="required"></div>
                      </td>
                  </tr>
                <tr>
                  <th colspan="3"><br><input type="button" class="button success" value="Guardar" onclick="GuardarAdministrativo()"></th>
                </tr>
                </tbody>
            </table>

      </div>
      <div class="frame" id="Busqueda" style="background-color:white;padding:20px">
        <table class="hovered cell-hovered bordere sombra table" id="tablaadministrativos">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Accion</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listaadministrativos=ConsultarLista("select * from Administrativos");
        while($administrativo=mysql_fetch_array($listaadministrativos))
        {
          $administrativo_id=$administrativo["id"];
          echo "<tr>";
          echo "<td>".$administrativo["Nombre"]." ".$administrativo["ApellidoP"]." ".$administrativo["ApellidoM"]."</td>";
          echo "<td>".$administrativo["Correo"]."</td>";
          echo "<td><input type='button' class='button primary' value='Abrir información' onclick='AbrirAdministrativo(".$administrativo_id.")'></td>";
          echo "</tr>";
        }
        ?>
        </table>
        <br><br>
            </div>
    </div>
</div>
</center>
