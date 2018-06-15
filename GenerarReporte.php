<?php
$periodo_id=$_REQUEST["periodo_id"];
?>
<script>
$(document).ready(function(){
  TablaDinamicaDefault("#alumnos");
});
</script>
<table id="alumnos" class="hovered cell-hovered bordere sombra table">
          <thead>
            <tr>
              <th>Matrícula</th>
              <th>Nombre</th>
              <th>Grupo</th>
              <th>Carrera</th>
              <th>Universidad</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listaalumnos=ConsultarLista("select asp.*,
          h.id as hist_id,
          a.Matricula,
          g.Nombre as NombreGrupo,
          c.Nombre as NombreCarrera, 
          u.Nombre as NombreUniversidad 
          from Historialalumnos h 
          join Alumnos a on a.id=h.Alumno_id 
          join Aspirantes asp on asp.id=a.Aspirante_id 
          join Grupos g on g.id=h.Grupo_id
          join Carreras c on c.id=g.Carrera_id
          join Universidades u on u.id=c.Universidad_id
          where h.Periodo_id=$periodo_id");
        while($alumno=mysql_fetch_array($listaalumnos))
        {
          echo "<tr>";
          echo "<td>".$alumno["Matricula"]."</td>";
          echo "<td>".$alumno["Nombre"]." ".$alumno["ApellidoP"]." ".$alumno["ApellidoM"]."</td>";
          echo "<td>".$alumno["NombreGrupo"]."</td>";
          echo "<td>".$alumno["NombreCarrera"]."</td>";
          echo "<td>".$alumno["NombreUniversidad"]."</td>";
          echo "</tr>";
        }
        ?>
        </table>
