<?php
$historial_id=$_REQUEST["historial_id"];
require_once("funciones.php");
$historial=ConsultarRegistro("Select * from Historialdocente where id =$historial_id");
$grupo_id=$historial["Grupo_id"];
$materia_id=$historial["Materia_id"];
?>
<script>
function GuardarCalificacion(id)
{
  if($("#"+id).val()!=0)
  {
    if(VerificarCantidad("#"+id,70))
    {
      if(VerificarCantidadMaximo("#"+id,100))
      {
        var calificacion=$("#"+id).val();
        $.post("Guardar.php?metodo=GuardarCalificacion&historial_id="+id+"&calificacion="+calificacion,function(data){
        ValidarGuardado(data,"La calificación se guardó correctamente","Ocurrió un error al guardar la calificació");
        if(data=="bien")
        {
          $("#accion-"+id).fadeIn();
          $("#accion-"+id).html('<span class="mif-checkmark mif-ani-hover-shuttle icon mif-ani-fast" style="color:green"></span>').delay(3000).fadeOut();
        }
        else
        {
       	  $("#"+id).val("");
          $("#accion-"+id).html('<span class="mif-cross mif-ani-hover-shuttle icon mif-ani-fast" style="color:red"></span>').delay(3000).fadeOut();
        }        
        });  
      }
      else
      {
        $("#accion-"+id).fadeIn();
        $("#"+id).val("");
        $("#accion-"+id).html('<span class="mif-cross mif-ani-hover-shuttle icon mif-ani-fast" style="color:red"></span>').delay(3000).fadeOut();
      }
    }
    else
    {
      $("#accion-"+id).fadeIn();
      $("#"+id).val("");
      $("#accion-"+id).html('<span class="mif-cross mif-ani-hover-shuttle icon mif-ani-fast" style="color:red"></span>').delay(3000).fadeOut();
    }
  }
  else {
    MensajeE("Selecciona una calificación válida");
    $("#accion-"+id).fadeIn();
    $("#"+id).val("");
    $("#accion-"+id).html('<span class="mif-cross mif-ani-hover-shuttle icon mif-ani-fast" style="color:red"></span>').delay(3000).fadeOut();
  }
}
</script>
<table class="hovered cell-hovered bordered sombra table">
          <thead>
            <tr>
              <th>Matrícula</th>
              <th>Nombre</th>
              <th>Calificación</th>
              <th>Acción</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listaalumnos=ConsultarLista("select asp.*,h.id as hist_id,a.Matricula,ha.Periodo_id as periodo_id from Historialmateria h join Alumnos a on a.id=h.Alumno_id join Aspirantes asp on asp.id=a.Aspirante_id join Historialalumnos ha on ha.id=h.Historialalumnos_id where h.Activo=1 and ha.Grupo_id=$grupo_id and Materia_id=$materia_id");
        while($alumno=mysql_fetch_array($listaalumnos))
        {
          $historialmateria_id=$alumno["hist_id"];
          $periodo_id=$alumno["periodo_id"];
          echo "<tr>";
          echo "<td>".$alumno["Matricula"]."</td>";
          echo "<td>".$alumno["Nombre"]." ".$alumno["ApellidoP"]." ".$alumno["ApellidoM"]."</td>";
          echo "<td>";
          if(ConsultarValor("Select id as valor from Periodos where Activo=1")==$periodo_id)
          {
          echo "<div class='input-control text'>";
          $cali=ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc");
          echo "<input type=number id='".$historialmateria_id."' onchange='GuardarCalificacion($historialmateria_id)' value='".$cali."'>";
          echo "</div>";
          }
          else {
          echo ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc");
          }
          echo "</td>";
          echo "<td id='accion-".$historialmateria_id."'></td>";
          echo "</tr>";
        }
        ?>
        </table>
        <a href="ReporteProfesor.php?historial_id=<?php echo $historial_id; ?>" target="_blank" class="button primary">Descargar reporte</a>
        <center><b>El reporte puede tardar unos segundos.</b></center>
