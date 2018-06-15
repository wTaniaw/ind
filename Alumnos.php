<?php
 require_once("funciones.php");
$grupo_id=$_REQUEST["grupo_id"];
$g=ConsultarRegistro("Select Grupos.*,Grados.Nombre as NombreGrado from Grupos join Grados on Grados.id=Grupos.Grado_id where Grupos.id=$grupo_id");
$carrera_id=$g["Carrera_id"];
$grupo=$g["Nombre"];
$nombregrado=$g["NombreGrado"];
$periodo_id=$g["Periodo_id"];
$grado_id=$g["Grado_id"];
?>
<script>
function GuardarHistorialDocente(id)
{
  var profesor=$("#profesor-"+id).val();
  Cargando();
    $.post("Guardar.php?metodo=GuardarHistorialDocente&profesor_id="+profesor+"&grupo_id=<?php echo $grupo_id?>&periodo_id=<?php echo $periodo_id?>&materia_id="+id,function(data){
      ValidarGuardado(data,"La materia se asignó correctamente","Ocurrió un error al asignar la materia");
      CerrarLoader();
    });
}
</script>
<h1 class="text-shadow"><span class="mif-arrow-left mif-ani-fast mif-ani-hover-horizontal sombra" style="border-radius:50%;border: 2px solid green;font-size:30px" onclick="Abrir('Carrera.php?carrera_id=<?php echo $carrera_id; ?>')"></span> Alumnos de grupo: <?php echo $grupo." ".$nombregrado ?></h1><br>
<br>
<div class="tabcontrol bordered border sombra" data-role="tabcontrol">
    <ul class="tabs">
        <li><a href="#Alumnos">Alumnos</a></li>
        <li><a href="#Profesores">Profesores</a></li>
    </ul>
    <div class="frames" style="background-color:white;">
      <div class="frame" id="Profesores" style="background-color:white;padding:20px">
          <table class="table hovered bordered sombra">
            <thead>
              <tr>
                <th>Materia</th>
                <th>Profesor</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <?php
            require_once("funciones.php");
            $listamaterias=ConsultarLista("Select Materias.Nombre,Materias.id from Planes join Materias on Materias.id=Planes.Materia_id where Grado_id=$grado_id and Carrera_id=$carrera_id");
          while($materia=mysql_fetch_array($listamaterias))
          {
            $materia_id=$materia["id"];
              echo "<tr>";
              echo "<td>".$materia['Nombre']."</td>";?>
              <td>
                <div class='input-control select'>
                  <select id="profesor-<?php echo $materia_id; ?>">
                    <option value="0">Selecciona un profesor</option>
                    <?php
                    $listaprofesores=ConsultarLista("Select * from Docentes");
                    while($profesor=mysql_fetch_array($listaprofesores))
                    {

                      $profesorasignado=ConsultarValor("Select Docente_id as valor from Historialdocente where Materia_id=$materia_id and Grupo_id=$grupo_id and Periodo_id=$periodo_id");
                    echo "<option value=".$profesor["id"];
                    $profesor_id=$profesor["id"];
                    if($profesorasignado==$profesor_id)
                    {
                      echo " selected='selected'";
                    }
                    echo ">".$profesor["Nombre"]." ".$profesor["ApellidoP"]." ".$profesor["ApellidoM"]."</option>";
                    }
                    ?>
                  </select>
                </div>
              </td>
              <td>
                <input type="button" onclick="GuardarHistorialDocente(<?php echo $materia['id'];?>)" value="Guardar" class="text-shadow sombra button success">
              </td>
              <?php
              echo "</tr>";
          }

            ?>

            <tr>
              <td></td>
            </tr>
          </table>
            </div>
            <div class="frame" id="Alumnos" style="background-color:white;padding:20px">
            <table class="table sombra bordered hovered border">
            <thead>
            <tr>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Estatus</th>
            </thead>
            <?php
            $rs=ConsultarLista("Select a.id as alumno_id,asp.Nombre,asp.ApellidoP,asp.ApellidoM, a.Estatus,a.Matricula from Historialalumnos h  join Alumnos a on a.id=h.Alumno_id join Aspirantes asp on asp.id=a.Aspirante_id where h.Grupo_id=$grupo_id and Movimiento<>'Baja'");
            while($registro=mysql_fetch_array($rs))
            {
              $matricula=$registro["Matricula"];
              $nombre=$registro["Nombre"];
              $apellidop=$registro["ApellidoP"];
              $apellidom=$registro["ApellidoM"];
              $estatus=$registro["Estatus"];
              $alumno_id=$registro["alumno_id"];
              ?>
            <tr style="cursor:pointer" onclick="Abrir('Expediente.php?alumno_id=<?php echo $alumno_id; ?>')">
              <td><?php echo $matricula; ?></td>
              <td><?php echo $nombre; ?></td>
              <td><?php echo $apellidop; ?></td>
              <td><?php echo $apellidom; ?></td>
              <td><?php echo $estatus; ?></td>
            </tr>
            <?php
            }
            ?>
            </table>
          </div>
          </div>
        </div>
