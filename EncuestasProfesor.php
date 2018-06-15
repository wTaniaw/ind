
<script>
$(document).ready(function(){
  TablaDinamicaDefault("#tablaencuestas");
});
function AbrirEncuesta(id)
{
  Abrir("AbrirEncuestaProfesor.php?encuesta_id="+id);
}
</script>
<center>

<h1 class="text-shadow">Encuestas evaluación docente</h1>
<br>
        <table class="hovered cell-hovered bordere sombra table" id="tablaencuestas">
          <thead>
            <tr>
            <th>Clave</th>
              <th>Alumno</th>
              <th>Profesor</th>
              <th>Fecha</th>
              <th>Acción</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listaencuestas=ConsultarLista("select  e.id,concat(asp.Nombre,' ',asp.ApellidoP,' ',asp.ApellidoM) as NombreAlumno,concat(d.Nombre,' ',d.ApellidoP,' ',d.ApellidoM) as NombreProfesor,e.Fecha  from EncuestaProfesor e join Historialdocente h on h.id=e.historial_id join Alumnos a on a.id=e.alumno_id join Aspirantes asp on asp.id=a.Aspirante_id join Docentes d on d.id=h.Docente_id");
        while($encuesta=mysql_fetch_array($listaencuestas))
        {
          $encuesta_id=$encuesta["id"];
          echo "<tr>";
          echo "<td>".$encuesta["id"]."</td>";
          echo "<td>".$encuesta["NombreAlumno"]."</td>";
          echo "<td>".$encuesta["NombreProfesor"]."</td>";
          echo "<td>".$encuesta["Fecha"]."</td>";
          echo "<td><input type='button' class='button primary' value='Abrir información' onclick='AbrirEncuesta(".$encuesta_id.")'></td>";
          echo "</tr>";
        }
        ?>
        </table>
        <br><br>
    </div>
</div>
</center>
