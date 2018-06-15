<?php
session_start();
ob_start();

$alumno_id=$_SESSION['alumno_id'];
$usuario_id=$_SESSION['usuario_id'];
require_once("funciones.php");
$alumno=ConsultarRegistro("Select * from Alumnos where id=$alumno_id");
$estatus=$alumno["Estatus"];
$aspirante_id=$alumno["Aspirante_id"];
$registro=ConsultarRegistro("Select * from Aspirantes where id=$aspirante_id");
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
$matricula=$alumno['Matricula'];
$id=$alumno['id'];
?>

<center>
 <h1 class="text-shadow">Expediente</h1><br>
  <table class="table bordered hovered sombra" >
      <tr>
        <td rowspan="8">
          <script>
     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                  if(datos=="tamaño")
                  {
                    MensajeE("El tamaño máximo de la fotografía es de 2MB");
                  }
                  else if(datos=="extension")
                  {
                    MensajeE("La fotografía debe tener extensión .jpg");
                  }
                  else
                  {
                    MensajeB("La fotografía se guardó correctamente");
                    $("#respuesta").html("");
                    $("#respuesta").html(datos);
                    window.location="Alumno.php?pagina=expediente&alumno_id=<?php echo $alumno_id; ?>";
                  }

                }
            });
        });
     });
    </script>
  <center>
    <div id="respuesta"><img src="<?php echo "fotos/".$usuario_id.".jpg"; ?>" width="250px" height="250px" onerror="this.src='/img/Administrator.png';"></div><br>
 <form method="post" id="formulario" enctype="multipart/form-data">
    <div class="input-control file" data-role="input">
    <input type="file" name="file">
    <input type="hidden" value="<?php echo $usuario_id; ?>" name="usuario_id">
    <button class="button"><span class="mif-folder"></span></button>
</div>
<center><input type="button" value="Cambiar contraseña" class="button sombra text-shadow success" onclick="Ventana('CambiarContrasena.php');"></center>
 </form>
          <br></center>
        </td>
        <td>
          <b>Nombre: </b><?php echo $nombre.' '.$apellidop.' '.$apellidom?><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>CURP: </b><?php echo $curp ?><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Matrícula: </b><?php echo $matricula ?><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Estatus alumno: </b><span id="span_estatus">
            <?php if($estatus=='Regular'){
            echo "<b style='color: green'>".$estatus."</b>";
          }else{
             echo "<b style='color: red'>baja</b>";}
             ?>
             </span><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Teléfono: </b><?php echo $telefono ?><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Celular: </b><?php echo $celular ?><br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Correo: </b><?php echo $correo ?><br>
        </td>
      </tr>
<tr >
</tr>
  </table>
<br>
  <div class="tabcontrol bordered border sombra" data-role="tabcontrol">
      <ul class="tabs">
          <li><a href="#Calificaciones">Calificaciones</a></li>
          <li><a href="#Asistencias">Asistencias</a></li>
      </ul>
      <div class="frames" style="background-color:white;">
        <div class="frame" id="Asistencias" style="background-color:white;padding:20px">
          <div class="accordion" data-role="accordion" style="background-color:white;" data-close-any="true">
              <?php
              $listagrupos=ConsultarLista("Select Grupos.Nombre,Grupos.id,Historialalumnos.id as hist_id,gra.Nombre as NombreGrado from Historialalumnos join Grupos on Grupos.id=Historialalumnos.Grupo_id join Grados gra on gra.id=Grupos.Grado_id join Periodos per on per.id=Historialalumnos.Periodo_id where Alumno_id=$alumno_id and Movimiento='Inscripción' order by per.FechaInicio desc");
              $registros=0;
              while($grupo=mysql_fetch_array($listagrupos))
              {
                $registros=$registros+1;
                $grupo_id=$grupo["id"];
                $historial_id=$grupo["hist_id"];
                ?>
                <div class="frame <?php if($registros==1)echo 'active';?>">
                    <div class="heading" style="font-size:20px"><?php echo $grupo["Nombre"]."  ".$grupo["NombreGrado"];?></div>
                    <div class="content">
                      <table class="table hovered bordered">
                        <thead>
                          <tr>
                            <th>Materia</th>
                            <th>Asistencias</th>
                            <th>Faltas</th>
                          </tr>
                        </thead>
                        <?php
                        $listamaterias=ConsultarLista("Select h.id,m.Nombre,h.Activo from Historialmateria h join Materias m on h.Materia_id=m.id where Alumno_id=$alumno_id and Historialalumnos_id=$historial_id");
                        while($materia=mysql_fetch_array($listamaterias))
                      {
                        $historialmateria_id=$materia["id"];
                        $activo=$materia["Activo"];
                        ?>
                        <tr>
                          <td><?php echo $materia["Nombre"]?></td>
                          <td><?php echo ConsultarValor("Select count(*) as valor from Asistencias where Asistencia=1 and Historialmateria_id=$historialmateria_id"); ?></td>
                          <td><?php echo ConsultarValor("Select count(*) as valor from Asistencias where Asistencia=0 and Historialmateria_id=$historialmateria_id"); ?></td>
                        </tr>
                        <?php
                      }
                        ?>
                      </table>
                      <br>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

        </div>
          <div class="frame" id="Calificaciones" style="background-color:white;padding:20px">
            <div class="accordion" data-role="accordion" style="background-color:white;" data-close-any="true">
              <?php
              $listagrupos2=ConsultarLista("Select Grupos.Nombre,Grupos.id,Historialalumnos.id as hist_id,gra.Nombre as NombreGrado from Historialalumnos join Grupos on Grupos.id=Historialalumnos.Grupo_id join Grados gra on gra.id=Grupos.Grado_id join Periodos per on per.id=Historialalumnos.Periodo_id where Alumno_id=$alumno_id and Movimiento='Inscripción' order by per.FechaInicio desc");
              $registros2=0;
              while($grupo=mysql_fetch_array($listagrupos2))
              {
                $registros2=$registros2+1;
                $grupo_id=$grupo["id"];
                $historial_id=$grupo["hist_id"];
                ?>
                <div class="frame <?php if($registros2==1)echo 'active';?>">
                    <div class="heading" style="font-size:20px"><?php echo $grupo["Nombre"]."  ".$grupo["NombreGrado"];?></div>
                    <div class="content">

                      <table class="table hovered bordered">
                        <thead>
                          <tr>
                            <th>Materia</th>
                            <th>Calificación</th>
                          </tr>
                        </thead>
                        <?php
                        $listamaterias=ConsultarLista("Select h.id,m.Nombre,h.Activo from Historialmateria h join Materias m on h.Materia_id=m.id where Alumno_id=$alumno_id and Historialalumnos_id=$historial_id");
                        while($materia=mysql_fetch_array($listamaterias))
                      {
                        $historialmateria_id=$materia["id"];
                        $activo=$materia["Activo"];
                        ?>
                        <tr>
                          <td><?php echo $materia["Nombre"]?></td>
                          <td><?php echo ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc"); ?></td>
                        </tr>
                        <?php
                      }
                        ?>
                      </table>
                      <br>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
          </div>
      </div>
  </div>
</center>
