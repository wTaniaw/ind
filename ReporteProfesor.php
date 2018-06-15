<?php require_once("dompdf/dompdf_config.inc.php");
$historial_id=$_REQUEST["historial_id"];
require_once("funciones.php");
$historial=ConsultarRegistro("Select hd.*,concat(do.ApellidoP,' ',do.ApellidoM,' ',do.Nombre) as nombreprofe,c.Nombre as carrera, m.Nombre as materia from Historialdocente hd join Grupos g on g.id=hd.Grupo_id join Carreras c on c.id=g.Carrera_id join Materias m on m.id=hd.Materia_id join Docentes do on do.id=hd.Docente_id where hd.id =$historial_id");
$grupo_id=$historial["Grupo_id"];
$materia_id=$historial["Materia_id"];
$carrera=$historial["carrera"];
$materia=$historial["materia"];
$nombreprofe=$historial["nombreprofe"];

$mes=date("n");
$mesletra=mesletra($mes);
$dia=date("j");
$ano=date("Y");
$numdias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$codigoHTML='
<html>
    <style>
    html{
        font-family: Sans-serif,"Times New Roman", Times, serif;
        padding: 30px 30px;
        text-align:center;
    }
     td,th {
   border: 1px solid black;
    }
    </style>
    <head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <center>
        <img src="img/logo2.png" width="270px" height="90px">
        <br><br><br>
        <strong>INSTITUTO INTERDISCIPLINARIO DE ESTUDIOS EDUCATIVOS Y ORGANIZACIONALES<br>
        <br>'.utf8_decode($carrera).'
        </strong><br><br><b>MATERIA: '.utf8_decode($materia).'
        </b><br><br><br><br>Del     1   de  '.$mesletra.'    al  '.$numdias.'  de  '.$mesletra.'    '.$ano.'

        <br><br><br>
        <table class="" style="padding-left:20%">
            <thead class="">
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Calificaci&oacute;n</th>
                </tr>
            </thead>';
            $listaalumnos=ConsultarLista("select asp.*,h.id as hist_id,a.Matricula,ha.Periodo_id as periodo_id from Historialmateria h join Alumnos a on a.id=h.Alumno_id join Aspirantes asp on asp.id=a.Aspirante_id join Historialalumnos ha on ha.id=h.Historialalumnos_id where h.Activo=1 and ha.Grupo_id=$grupo_id and Materia_id=$materia_id");
            $cont=1;
        while($alumno=mysql_fetch_array($listaalumnos))
        {
          $historialmateria_id=$alumno["hist_id"];
          $periodo_id=$alumno["periodo_id"];
            $codigoHTML=$codigoHTML.'<tr>';
        $codigoHTML=$codigoHTML.'<td>'.$cont.'</td>';
                  $codigoHTML=$codigoHTML.'<td>'.utf8_decode($alumno["Nombre"]).' '.utf8_decode($alumno["ApellidoP"]).' '.utf8_decode($alumno["ApellidoM"]).'</td>';
          $codigoHTML=$codigoHTML.'<td>';
        $codigoHTML=$codigoHTML.ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historialmateria_id order by id desc");
        $codigoHTML=$codigoHTML.'</td>';
          $codigoHTML=$codigoHTML.'</tr>';
          $cont++;
        }
        $codigoHTML=$codigoHTML.'</table></center>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chihuahua, Chih., '.$dia.' de '.$mesletra.' de '.$ano.'<br><br><br><br>

         _____________________________
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         _____________________________<br><br>&nbsp;&nbsp;&nbsp;
         '.utf8_decode($nombreprofe).'
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          MTRA. VELIA ESPERANZA TERRAZAS BACA<br><br>

Catedr&aacute;tico
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Directora

        </html>';

          $codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("EntregaCalificaciones.pdf");
?>
