<?php
session_start();
ob_start();
if(isset($_REQUEST['alumno_id'])){
$alumno_id=$_REQUEST['alumno_id'];
$usuario_id=$_SESSION["usuario_id"];
require_once("funciones.php");
$alumno=ConsultarRegistro("Select * from Alumnos where id=$alumno_id");
$usuarioalumno_id=$alumno["Usuario_id"];
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
}
$matricula=$alumno['Matricula'];
$folio=$alumno['Folio'];
$libro=$alumno['Libro'];
$ncertificado=$alumno['NCertificado'];
$id=$alumno['id'];
?>
<script>
$(document).ready(function(){
  ConvertirMayusculas("#nombre");
  ConvertirMayusculas("#apellidop");
  ConvertirMayusculas("#apellidom");
  ConvertirMayusculas("#curp");
  ConvertirMayusculas("#calle");
  ConvertirMayusculas("#numero");
  ConvertirMayusculas("#colonia");
});
function EstadoHistorial(id)
{
  $.post("Guardar.php?metodo=EstadoHistorial&historial_id="+id,function(data){
    ValidarGuardado(data,"El estado se cambió correctamente","Ocurrió un error al guardar el nuevo estado");
  });
}
function GenerarNumero(alumno_id)
{
  Cargando();
 $.post("Guardar.php?metodo=GenerarNumero&alumno_id="+alumno_id,function(data){
    if(data>0){
      $("#spancertificado").html(data);
      CerrarVentana();
      CerrarLoader();

      MensajeB("El número se guardó correctamente");
    }
    else
    {
      CerrarLoader();
      MensajeE("Ocurrió un error al generar el numero");
    }
  });
}

function CapturarBaja()
{
  var grupo=$("#grupo_baja").val();
  $.post("Guardar.php?metodo=CapturarBaja&grupo_id="+grupo,function(data){
    ValidarGuardado(data,"La baja se guardó correctamente","Ocurrió un error al guardar la baja");
    if(data="bien")
    {
        $("#span_estatus").html('<b style="color: Red">Baja</b>');
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
  $.post("Guardar.php?metodo=EditarAspirante&aspirante_id=<?php echo $aspirante_id ?>&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom+"&telefono="+telefono+"&celular="+celular+"&curp="+curp+"&correo="+correo+"&fecha="+fecha+"&municipion="+municipion+"&calle="+calle+"&numero="+numero+"&colonia="+colonia,function(data){
    ValidarGuardado(data,"El aspirante se guardó correctamente","Ocurrió un error al guardar el aspirante");
      });
}
else {
  MensajeE("Verifica los campos remarcados en rojo");
}
}

function CargarGrupos()
{
  var periodo=$("#periodo_inscribir").val();
  var carrera=$("#carrera_inscribir").val();
  Cargando();
  $("#lista_grupos_inscribir").load("Guardar.php?metodo=CargarGrupos&periodo_id="+periodo+"&carrera_id="+carrera,function(data){
    CerrarLoader();
  });
}
function EliminarMovimiento(id)
{
  Cargando();
$.post("Guardar.php?metodo=EliminarMovimiento&historial_id="+id,function(data){
    ValidarGuardado(data,"El movimiento se eliminó correctamente","Ocurrió un error al eliminar el movimiento");
    CerrarLoader();
    if(data=="bien")
    {
      $("#mov-"+id).fadeOut();
    }
      });
}

function Inscribir()
{
  var carrera=$("#carrera_inscribir").val();
  var periodo=$("#periodo_inscribir").val();
  var grupo=$("#grupo_inscribir").val();
  Cargando();
  $.post("Guardar.php?metodo=InscribirGrupo&periodo_id="+periodo+"&carrera_id="+carrera+"&grupo_id="+grupo+"&alumno_id=<?php echo $alumno_id; ?>",function(data){
    ValidarGuardado(data,"El alumno se inscribió correctamente","Ocurrió un error al inscribir al alumno");
    if(data=="bien")
    {
      Abrir("Expediente.php?alumno_id=<?php echo $alumno_id; ?>");
    }
  });
}
</script>
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
                    window.location="Escolares.php?pagina=expediente&alumno_id=<?php echo $alumno_id; ?>";
                  }

                }
            });
        });
     });
    </script>
  <center>
    <div id="respuesta"><img src="<?php echo "fotos/".$usuarioalumno_id.".jpg"; ?>" width="250px" height="250px"></div><br>
 <form method="post" id="formulario" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="hidden" value="<?php echo $usuarioalumno_id; ?>" name="usuario_id">
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
          <b>Matrícula: </b><span id="spanmatricula"><?php echo $matricula ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Capturar-Editar" onclick="Ventana('EditarMatricula.php?alumno_id=<?php echo $alumno_id;?>')" class="button primary sombra text-shadow">
          <br>
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
          <li><a href="#Grupos">Grupos</a></li>
          <li><a href="#Asistencias">Asistencias</a></li>
          <li><a href="#Inscribir">Inscribir</a></li>
          <li><a href="#Info">Info. personal</a></li>
          <li><a href="#Historial">Historial</a></li>
          <li><a href="#Bajas">Bajas</a></li>
          <li><a href="#Imprimibles">Formatos</a></li>
          <li><a href="#Titulacion">Info. certificado</a></li>
      </ul>
      <div class="frames" style="background-color:white;">
        <div class="frame" id="Titulacion" style="background-color:white;padding:20px">
        <table class="table sombra hovered bordered">
          <tr>
        <td>
          <b>Folio: </b><span id="spanfolio"><?php echo $folio ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Capturar-Editar" onclick="Ventana('EditarFolio.php?alumno_id=<?php echo $alumno_id;?>')" class="button primary sombra text-shadow">
          <br>
        </td>
      </tr>
      <tr>
        <td>
          <b>Libro: </b><span id="spanlibro"><?php echo $libro ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Capturar-Editar" onclick="Ventana('EditarLibro.php?alumno_id=<?php echo $alumno_id;?>')" class="button success sombra text-shadow">
          <br>
        </td>
      </tr>
      <tr>
        <td>
          <b>No. certificado: </b><span id="spancertificado"><?php echo $ncertificado ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Generar Número" onclick="GenerarNumero(<?php echo $alumno_id;?>)" class="button danger sombra text-shadow">
            <input type="button" value="Capturar Número" onclick="Ventana('EditarNumero.php?alumno_id=<?php echo $alumno_id;?>')" class="button warning sombra text-shadow">
          <br>
        </td>
      </tr>

    </table>
        </div>
        <div class="frame" id="Imprimibles" style="background-color:white;padding:20px">
          <a href="Constancia.php?alumno_id=<?php echo $alumno_id;?>" target="_blank" class="button text-shadow sombra primary" >Descargar Constancia</a>
          <a href="Certi.php?alumno_id=<?php echo $alumno_id;?>" target="_blank" class="button text-shadow sombra warning" >Descargar Certificado</a>
          <a href="boleta.php?alumno_id=<?php echo $alumno_id;?>" target="_blank" class="button text-shadow sombra success" >Descargar Cardex</a>
        </div>
        <div class="frame" id="Inscribir" style="background-color:white;padding:20px">
          <table>
            <tr>
              <td>
                <b> Periodo: </b>
                <div class="input-control select">
                    <select id="periodo_inscribir" onchange="CargarGrupos()">
                      <option value="0">Selecciona un periodo</option>
                      <?php
                      $periodos=ConsultarLista("Select * from Periodos");
                      while($periodo=mysql_fetch_array($periodos))
                    {
                      ?>
                      <option value="<?php echo $periodo['id']?>"><?php echo $periodo['Nombre']?></option>
                      <?php
                    }
                      ?>
                    </select>
                </div>
              </td>
              <td>
                <b> Carrera: </b>
                <div class="input-control select">
                    <select id="carrera_inscribir" onchange="CargarGrupos()">
                      <option value="0">Selecciona una carrera</option>
                      <?php
                      $carreras=ConsultarLista("Select Carreras.*,Universidades.Nombre as NombreUni from Carreras join Universidades on Universidades.id=Carreras.Universidad_id");
                      while($carrera=mysql_fetch_array($carreras))
                    {
                      ?>
                      <option value="<?php echo $carrera['id']?>"><?php echo $carrera['NombreUni']."-".$carrera['Nombre']?></option>
                      <?php
                    }
                      ?>
                    </select>
                </div>
              </td>
              <td>
                  <div id="lista_grupos_inscribir"></div>
              </td>
              <td>
<input class="button success text-shadow sombra" value="Inscribir" onclick="Inscribir()" type="button">
              </td>
            </tr>
          </table>
          <br>
        </div>
          <div class="frame" id="Grupos" style="background-color:white;padding:20px">
            <div class="accordion" data-role="accordion" style="background-color:white;" data-close-any="true">
              <?php
              $listagrupos=ConsultarLista("Select per.Nombre as NombrePeriodo,Grupos.Nombre,Grupos.id,Historialalumnos.id as hist_id,gra.Nombre as NombreGrado from Historialalumnos join Grupos on Grupos.id=Historialalumnos.Grupo_id join Grados gra on gra.id=Grupos.Grado_id join Periodos per on per.id=Historialalumnos.Periodo_id where Alumno_id=$alumno_id and Movimiento='Inscripción' order by per.FechaInicio desc");
              $registros=0;
              while($grupo=mysql_fetch_array($listagrupos))
              {
                $registros=$registros+1;
                $grupo_id=$grupo["id"];
                $historial_id=$grupo["hist_id"];
                ?>
                <div class="frame <?php if($registros==1)echo 'active';?>">
                    <div class="heading" style="font-size:20px"><?php echo $grupo["Nombre"]."  ".$grupo["NombreGrado"]."  ".$grupo["NombrePeriodo"];?></div>
                    <div class="content">

                      <table class="table hovered bordered">
                        <thead>
                          <tr>
                            <th>Materia</th>
                            <th>Calificación</th>
                            <th>Editar</th>
                            <th>Activar/Desac.</th>
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
                          <td id="<?php echo $historialmateria_id; ?>"><?php echo $materia["Nombre"];?></td>
                          <td id="tdcal-<?php echo $historialmateria_id?>"><?php echo ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc"); ?>
                          </td>
                          <td><button class="button cycle-button" onclick="Ventana('GuardarCalificacion.php?hist_id=<?php echo $historialmateria_id;?>')"><span class="mif-pencil fg-red "></span></button>
                          </td>
                          <td><label class="switch">
                            <input type="checkbox" <?php if($activo==1){
                            echo "checked";
                            }?> id="<?php echo "check-".$historialmateria_id; ?>" onchange="EstadoHistorial(<?php echo $historialmateria_id; ?>)">
                            <span class="check"></span>
                            </label></td>
                        </tr>
                        <?php
                      }
                        ?>
                      </table>
                      <br>
                      <a href="javascript:Abrir('Alumnos.php?grupo_id=<?php echo $grupo_id?>')">Ir a información de grupo</a>

                    </div>
                </div>
                <?php
                }
                ?>
            </div>
          </div>
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
                            <th>Acción</th>
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
                          <td><label class="switch">
                            <input type="checkbox" <?php if($activo==1){
                            echo "checked";
                            }?> id="<?php echo "check-".$historialmateria_id; ?>" onchange="EstadoHistorial(<?php echo $historialmateria_id; ?>)">
                            <span class="check"></span>
                            </label></td>
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
          <div class="frame" id="Info" style="background-color:white;padding:20px">
            <center>
<?php
            require_once("funciones.php");
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

            ?>

            <table class="cell-hovered stiped table">
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
                    <input type="button" class="button success text-shadow sombra" value="Guardar" onclick="GuardarAspirante()">
                  </th>
                </tr>
                </tbody>
            </table>
          </center>
          </div>
          <div class="frame" id="Historial" style="background-color:white;padding:20px">
            <table class="hovered bordered table sombra">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Movimiento</th>
                  <th>Periodo</th>
                  <th>Grupo</th>
                  <th>Grado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <?php
              $listamovimientos=ConsultarLista("Select grad.Nombre as NombreGrado,h.Fecha,h.Movimiento,p.Nombre,g.Nombre as grupo,h.id as his_id from Historialalumnos h join Periodos p on p.id=h.Periodo_id join Grupos g on g.id=h.Grupo_id join Grados grad on grad.id=g.Grado_id where Alumno_id=$alumno_id order by h.id desc");
              while($movimiento=mysql_fetch_array($listamovimientos))
              {
                echo "<tr id='mov-".$movimiento["his_id"]."'><td>".$movimiento["Fecha"]."</td><td>".$movimiento["Movimiento"]."</td><td>".$movimiento["Nombre"]."</td><td>".$movimiento["grupo"]."</td><td>".$movimiento["NombreGrado"]."</td><td>";
                echo "<input type='button' class='sombra button danger text-shadow' value='Eliminar movimiento' onclick='EliminarMovimiento(".$movimiento["his_id"].")'></td></tr>";
              }
              ?>
            </table>
          </div>
          <div class="frame" id="Bajas" style="background-color:white;padding:20px">
            <table>
              <tr>
                <td>
                  <b>Grupo: </b>
                  <div class="input-control select">
                  <select id="grupo_baja">
                  <?php
                  $listagrupos=ConsultarLista("Select Grados.Nombre as NombreGrado,Grupos.Nombre,Grupos.id,Historialalumnos.id as hist_id from Historialalumnos join Grupos on Grupos.id=Historialalumnos.Grupo_id join Grados on Grados.id=Grupos.Grado_id where Alumno_id=$alumno_id and Movimiento='Inscripción' order by Historialalumnos.Periodo_id");
                  while($grupo=mysql_fetch_array($listagrupos))
                  {
                    $grupo_nombre=$grupo["Nombre"];
                    $historial_id=$grupo["hist_id"];
                    $nombregrado=$grupo["NombreGrado"];
                    echo '<option value="'.$historial_id.'">'.$grupo_nombre." ".$nombregrado.'</option>';
                  }
                    ?>
                    </select>
                  </div>
                </td>
                <td><input type="button" value="Capturar baja" class="button danger sombra" onclick="CapturarBaja()"></td>
              </tr>
            </table>
          </div>
      </div>
  </div>

</center>
