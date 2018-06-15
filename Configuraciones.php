<script>
function GuardarPeriodoActivo()
{
  var periodo=$("#periodo_activo").val();
  Cargando();
  $.post("Guardar.php?metodo=GuardarPeriodoActivo&periodo_id="+periodo,function(data){
    ValidarGuardado(data,"El periodo se guardó correctamente","Ocurrió un error al guardar el periodo");
    CerrarLoader();
  });
}
function GuardarDirectores()
{
  var periodo=$("#periodo_activo").val();
  var directorchihuahua=$("#directorchihuahua").val();
  var directorjuarez=$("#directorjuarez").val();
  Cargando();
  $.post("Guardar.php?metodo=GuardarDirectores&directorchihuahua="+directorchihuahua+"&directorjuarez="+directorjuarez,function(data){
    ValidarGuardado(data,"Los directores de guardaron correctamente","Ocurrió un error al guardar los directores");
    CerrarLoader();
  });
}
function CrearPeriodo()
{
  var periodo=$("#periodo").val();
  var anio=$("#anio").val();
  if(VerificarCantidad("#anio",2000))
    {
      if(VerificarCantidadMaximo("#anio",2200))
      {
        Cargando();
        $.post("Guardar.php?metodo=GuardarNuevoPeriodo&periodo="+periodo+"&anio="+anio,function(data){
          ValidarGuardado(data,"El periodo se guardó correctamente","Ocurrió un error al guardar el periodo");
          CerrarLoader();
          Abrir("Configuraciones.php");
        });
      }
    }
}
</script>
<br><h1>Configuraciones</h1>

<table class="bordered hovered hovered-cell sombra table">
  <thead>
    <tr><th><h4 style="color:darkblue">Periodo activo</h4></th></tr>
    <tr>
      <th>
            <?php
            require_once("funciones.php");
            $periodoactivo=ConsultarValor("Select id as valor from Periodos where Activo =1");
            $periodos=ConsultarLista("Select * from Periodos");
            echo '<div class="input-control select">';
            echo '<select id="periodo_activo">';
            while($periodo=mysql_fetch_array($periodos))
            {
              $nombreperiodo=$periodo["Nombre"];
              $idperiodo=$periodo["id"];
              echo "<option value='$idperiodo'";
              if($periodoactivo==$idperiodo)
              {
                  echo "selected";
              }
              echo ">$nombreperiodo</option>";
            }
            echo "</select>";
            echo '</div>';
            ?>
          <input type="button" class="hovered bordered hovered sombra text-shadow success" value="Guardar" onclick="GuardarPeriodoActivo()">
    </tr>
    <tr><th><h4 style="color:darkblue">Crear periodo</h4></th></tr>
    <tr>
      <th>
            <b>Periodo: </b><div class="input-control select">
            <select id="periodo">
            <option value='ENE-ABR-'>ENE-ABR</option>
            <option value='MAY-AGO-'>MAY-AGO</option>
            <option value='SEP-DIC-'>SEP-DIC</option>
            </select>
            </div>
            <b>Año: </b><div class="input-control select">
              <input type="number" max="2200" min="2000" id="anio">
            </div>
          <input type="button" class="hovered bordered hovered sombra text-shadow success" value="Guardar" onclick="CrearPeriodo()">
    </tr>
    <tr><th><h4 style="color:darkblue">Director(a) por unidad</h4></th></tr>
    <tr>
      <th>
        <?php 
$parametros=ConsultarRegistro("Select * from Parametros where id=1");
$dchihuahua=$parametros["DirectorChihuahua"];
$djuarez=$parametros["DirectorJuarez"];
        ?>
            <b>Chihuahua: </b>
            <div class="input-control text">
              <input type="text" id="directorchihuahua" value="<?php echo $dchihuahua ?>" style="width:400px">
            </div>
            <br>
            <b>Juárez: </b>
            <div class="input-control text">
              <input type="text" id="directorjuarez" value="<?php echo $djuarez ?>" style="width:400px">
            </div>
          <br>  
          <input type="button" class="hovered bordered hovered sombra text-shadow success" value="Guardar" onclick="GuardarDirectores()">
    </tr>
  </thead>
</table>
