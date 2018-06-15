<?php require_once("dompdf/dompdf_config.inc.php");
$alumno_id=$_REQUEST["alumno_id"];
require_once("funciones.php");
$nombre=ConsultarValor("Select concat(Nombre,' ',ApellidoP,' ',ApellidoM) as valor from Alumnos join Aspirantes on Aspirantes.id=Alumnos.Aspirante_id where Alumnos.id=$alumno_id");
$carrerauniversidad=ConsultarRegistro("Select c.Nombre as carreranombre,u.Nombre as nombreuniversidad,u.id as universidad_id from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id join Universidades u on u.id=c.Universidad_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$carrera=$carrerauniversidad['carreranombre'];
$universidad_id=$carrerauniversidad['universidad_id'];
$ciudad=utf8_decode($carrerauniversidad['nombreuniversidad']);
$grado_id=ConsultarValor("Select g.Grado_id as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$periodo=ConsultarValor("Select p.Nombre as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$gradoletra=GradoLetra(3);
$usuario_id=ConsultarValor("select Usuario_id as valor from Alumnos where id=$alumno_id");
$genero=ooa($usuario_id); 
$mes=date("n");
$mesletra=mesletra($mes);
$dia=date("j");
$ano=date("Y");
$director=ObtenerDirector($universidad_id);
$interesado=" de la";
if($genero=="o")
{
	$interesado=" del";
}
if($universidad_id==2)
{
	$clave="08PSU5050U";
}
else if($universidad_id==1)
{
	$clave="08PSU5015O";
}
$codigoHTML='<html><style>html{
    font-family: Sans-serif,"Times New Roman", Times, serif;
}
</style>
<head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table style="margin:50px 50px;font-size:17px">
<tr>
	<td><img src="img/logo2.png" width="270px" height="90px"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$ciudad. ', Chih. '.$dia.' de '.$mesletra.' de '.$ano.'<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia.<br><br>
<br><br><strong>
A QUIEN CORRESPONDA:<br>
P R E S E N T E. 
</strong><br><br>
El<strong> Instituto Interdisciplinario de Estudios Educativos y Organizacionales,</strong>  <br>
(CLAVE CT  '.$clave.') hace constar que l'.$genero.'<br><br><br>
<center><strong>C. ';
$codigoHTML=$codigoHTML.utf8_decode($nombre);
$codigoHTML=$codigoHTML.'</strong><br><br></center><br><br>
es alumna regular de esta instituci&oacute;n en l'.$genero.' ';
$codigoHTML=$codigoHTML.utf8_decode($carrera);
$codigoHTML=$codigoHTML.' (RVOE: SEC- 006/2009), est&aacute; inscrit'.$genero.' en el ';
$codigoHTML=$codigoHTML.$gradoletra;
$codigoHTML=$codigoHTML.' tetramestre del ciclo escolar  ';
$codigoHTML=$codigoHTML.$periodo;
$codigoHTML=$codigoHTML.'.<br><br>
A petici&oacute;n'.$interesado.' interesad'.$genero.' y para los efectos  que haya lugar, se extiende la presente en la Ciudad de '.$ciudad.', Chih,  el '.$dia.' de '.$mesletra.' del a&ntilde;o en curso.
<br><br><br><br><center>
<strong>A T E N T A M E N T E
<br><br><br><br><br><br>
';
$codigoHTML=$codigoHTML.$director.'
<br>
DIRECTORA
</strong>
</center>
</td>
</tr>
</table></html>';
          $codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Constancia-$nombre.pdf");
?>
