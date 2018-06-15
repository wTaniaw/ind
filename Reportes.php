<script>
  function CargarAlumnos()
  {
    var periodo=$("#periodo_id").val();
    $.get("GenerarReporte.php?periodo_id="+periodo,function(data){
      $("#divalumnos").html(data);
    });

  }
</script>
<center>
 <h1 class="text-shadow">Alumnos</h1><br>
<table class="hovered cell-hovered bordere sombra table">
  <tr>
    <th>
      Selecciona el periodo
    </th>
    <th>
      Acción
    </th>
  </tr>
  <tr>
    <td>
      <?php
            require_once("funciones.php");
            $periodoactivo=ConsultarValor("Select id as valor from Periodos where Activo =1");
            $periodos=ConsultarLista("Select * from Periodos");
            echo '<div class="input-control select">';
            echo '<select id="periodo_id">';
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
    </td>
    <td>
      <input type="button" value="Cargar alumnos" class="button sombra text-shadow success" onclick="CargarAlumnos()">
    </td>
  </tr>
</table>

<br>
<div id="divalumnos"></div>
</center>