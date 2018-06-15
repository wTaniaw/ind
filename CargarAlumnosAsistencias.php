<?php
$historial_id=$_REQUEST["historial_id"];
$fecha=$_REQUEST["fecha"];

require_once("funciones.php");
$historial=ConsultarRegistro("Select * from Historialdocente where id =$historial_id");
$grupo_id=$historial["Grupo_id"];
$materia_id=$historial["Materia_id"];
?>
<script>
function GuardarAsistencia(id)
{
var asistencia=$('input:radio[name=asistencia-'+id+']:checked').val();
    $.post("Guardar.php?metodo=GuardarAsistencia&historial_id="+id+"&asistencia="+asistencia+"&fecha=<?php echo $fecha; ?>",function(data){
      ValidarGuardado(data,"La asistencia se guardó correctamente","Ocurrió un error al guardar la asistencia");
    });
}
</script>
<table class="hovered cell-hovered bordere sombra table">
          <thead>
            <tr>
              <th>Matrícula</th>
              <th>Nombre</th>
              <th>Asistencia</th>
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
            echo '<label class="input-control radio small-check">';
            echo '<input type="radio" name="asistencia-'.$historialmateria_id.'" onchange="GuardarAsistencia('.$historialmateria_id.')" value=1';
            if(ConsultarValor("Select Asistencia as valor from Asistencias where Historialmateria_id=$historialmateria_id and Fecha='$fecha' order by id desc")=="1")
            {
              echo " checked";
            }
            echo '>';
            echo '<span class="check"></span>';
            echo '<span class="caption">A</span>';
            echo '</label>';
            echo "&nbsp;";
            echo "&nbsp;";
            echo "&nbsp;";
            echo '<label class="input-control radio small-check">';
            echo '<input type="radio" name="asistencia-'.$historialmateria_id.'" onchange="GuardarAsistencia('.$historialmateria_id.')" value=0';
            if(ConsultarValor("Select Asistencia as valor from Asistencias where Historialmateria_id=$historialmateria_id and Fecha='$fecha' order by id desc")=="0")
            {
              echo " checked";
            }
            echo '>';
            echo '<span class="check"></span>';
            echo '<span class="caption">F</span>';
            echo '</label>';
          }
          else {
            //echo ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc");
          }
          echo "</td>";
          echo "</tr>";
        }
        ?>
        </table>
