<?php
//error_reporting(E_ALL);
require('fpdf/fpdf.php');
header("Content-Type: text/html; charset=iso-8859-1");
$alumno_id = $_REQUEST["alumno_id"];
require_once("funciones.php");
$alumno=ConsultarRegistro("Select * from Alumnos where id =$alumno_id");
$folio=$alumno["Folio"];
$libro=$alumno["Libro"];
$ncertificado=$alumno["NCertificado"];
$nombre = ConsultarValor("Select concat(ApellidoP,' ',ApellidoM,' ',Nombre) as valor from Alumnos join Aspirantes on Aspirantes.id=Alumnos.Aspirante_id where Alumnos.id=$alumno_id");
$carreraa = ConsultarValor("Select c.Nombre as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");

$carrera_id = ConsultarValor("Select c.id as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$universidad_id = ConsultarValor("Select u.id as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Universidades u on u.id=c.Universidad_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$carrera=str_replace("Í","I",$carreraa);
$carrera=str_replace("Á","A",$carrera);
$carrera=str_replace("É","E",$carrera);
$carrera=str_replace("Ó","O",$carrera);
$carrera=str_replace("Ú","U",$carrera);
$listatetramestres = ConsultarLista("Select * from Planes where Carrera_id=$carrera_id group by Grado_id order by Grado_id Asc");
$mes=date("n");
$mesletra=mesletra($mes);
$dia=date("j");
$ano=date("Y");
$pdf = new FPDF();
$pdf->AddFont('Timess', '', 'cambria.php');
$pdf->AddFont('TimesB', 'B', 'cambriab.php');
$pdf->AddFont('Comprimida', '', 'Times NR Condensed.php');
$pdf->AddFont('bell', 'B', 'BELLB.php');
$pdf->AddFont('belln', '', 'BELL.php');

$pdf->AddPage('P', 'Legal');
//$pdf->Cell(60,10,'Texto',borde,salto de linea,'C');
$pdf->SetFont('Timess', '', 16);
$pdf->Image('img/logo2.png', 6, 24, 49);
$pdf->Ln(8);
$pdf->Cell(205, 20, utf8_decode('GOBIERNO  DEL  ESTADO  DE  CHIHUAHUA'), 0, 0, 'C');

$pdf->Ln(6);

$pdf->SetFont('Timess', '', 12);
$pdf->Cell(205, 20, utf8_decode('SECRETARIA DE EDUCACION Y DEPORTE '), 0, 0, 'C');

$pdf->Ln(10);

$pdf->SetFont('Timess', '', 14);
$pdf->Cell(205, 20, 'CERTIFICADO DE ESTUDIOS', 0, 0, 'C');

$pdf->Ln(15);

$pdf->Cell(34, 10, '', 0, 0, 'C');
$pdf->SetFont('Timess', '', 8);
$pdf->Cell(8, 10, 'EL', 0, 0, 'R');
$pdf->SetFont('TimesB', 'B', 10);
$pdf->Cell(200, 10, ' "INSTITUTO  INTERDISCIPLINARIO  DE  ESTUDIOS  EDUCATIVOS  Y  ORGANIZACIONALES" ', 0, 0, 'L');

$pdf->Ln(4);

$pdf->Cell(45, 10, '', 0, 0, 'C');
$pdf->SetFont('TimesB', 'BU', 10);
$pdf->Cell(11, 10, 'CERTIFICA', 0, 0, 'R');
$pdf->SetFont('Timess', '', 8);
if($universidad_id==2)
{
$pdf->Cell(200, 10, utf8_decode('CON  ACUERDO  DEL  EJECUTIVO  ESTATAL   DE  RECONOCIMIENTO  DE   VALIDEZ   OFICIAL  N°608/2014,'), 0, 0, 'L');    
}
else{
if($carrera=="MAESTRIA EN GESTION DE POLITICAS PUBLICAS")
{
$pdf->Cell(200, 10, utf8_decode('CON  ACUERDO  DEL  EJECUTIVO  ESTATAL   DE  RECONOCIMIENTO  DE   VALIDEZ   OFICIAL  N°707/2013,'), 0, 0, 'L');
}
else
{
$pdf->Cell(200, 10, 'CON  ACUERDO  DEL  EJECUTIVO  ESTATAL   DE  RECONOCIMIENTO  DE   VALIDEZ  OFICIAL  No  006/2009,', 0, 0, 'L');
}
}
$pdf->Ln(4);

$pdf->SetFont('Timess', '', 8);
$pdf->Cell(37, 10, '', 0, 0, 'C');
if($universidad_id==2)
{
$pdf->Cell(200, 10, utf8_decode('FIRMADO EL 4 DE SEPTIEMBRE DE 2016 Y  PUBLICADO EN ________________________ No._________ DEL GOBIERNO DEL ESTADO'), 0, 0, 'L');
}
else{
if($carrera=="MAESTRIA EN GESTION DE POLITICAS PUBLICAS")
{
$pdf->Cell(200, 10, utf8_decode('FIRMADO EL 5 DE JULIO DE 2013 Y  PUBLICADO EN _________________________________ No._________ DEL GOBIERNO DEL ESTADO'), 0, 0, 'L');
}
else
{
$pdf->Cell(200, 10, utf8_decode('FIRMADO EL  4  DE  NOVIEMBRE DE  2009 Y  PUBLICADO EN EL  PERIODICO  OFICIAL  No.94 DEL GOBIERNO DEL ESTADO'), 0, 0, 'L');
}
}
$pdf->Ln(4);

$pdf->SetFont('Timess', '', 8);
$pdf->Cell(37, 10, '', 0, 0, 'C');
if($universidad_id==2)
{
$pdf->Cell(200, 10, 'DE  CHIHUAHUA EL  ________________________________, CON CLAVE  08PSU5050U,  QUE  DE  ACUERDO A LOS  REGISTROS EN EL', 0, 0, 'L');
}
else{
if($carrera=="MAESTRIA EN GESTION DE POLITICAS PUBLICAS")
{
$pdf->Cell(200, 10, 'DE  CHIHUAHUA EL  ________________________________, CON CLAVE  08PSU5015O,  QUE  DE  ACUERDO A LOS  REGISTROS EN EL', 0, 0, 'L');
}
else
{
$pdf->Cell(200, 10, 'DE  CHIHUAHUA EL  25 DE NOVIEMBRE DE 2009, CON CLAVE  08PSU5015O,  QUE  DE  ACUERDO A LOS  REGISTROS EN EL', 0, 0, 'L');
}
}
$pdf->Ln(4);

$pdf->SetFont('Timess', '', 8);
$pdf->Cell(37, 10, '', 0, 0, 'C');
$pdf->Cell(200, 10, utf8_decode('ARCHIVO DE CONTROL   ESCOLAR DE  LA  INSTITUCION, EL (LA)  ALUMNO (A)  CUYO  NOMBRE  Y  FOTOGRAIA  APARECE '), 0, 0, 'L');

$pdf->Ln(4);

$pdf->Cell(37, 10, '', 0, 0, 'C');
$pdf->Cell(200, 10, utf8_decode('EN  ESTE   DOCUMENTO,  APROBO  LAS  ASIGNATURAS   CON  LAS  CALIFICACIONES   CORRESPONDIENTES  AL  PLAN   DE'), 0, 0, 'L');

$pdf->Ln(4);



$pdf->Cell(37, 10, '', 0, 0, 'C');
$pdf->Cell(200, 10, utf8_decode('ESTUDIOS  QUE  A  CONTINUACION   SE   EXPRESAN:'), 0, 0, 'L');


$pdf->Ln(7);

$pdf->SetFont('Timess', '', 10);
$pdf->Cell(37, 20, '', 0, 0, 'C');
$pdf->Cell(36, 20, 'NOMBRE DEL ALUMNO:   ', 0, 0, 'L');
$pdf->SetFont('TimesB', 'B', 11);
$pdf->Cell(2, 20, ' ', 0, 0, 'C');
$pdf->Cell(100, 20, utf8_decode($nombre), 0, 0, 'L');

$pdf->Ln(10);

$pdf->SetFont('TimesB', 'B', 12);
$pdf->Cell(5, 20, '', 0, 0, 'C');
$pdf->Cell(200, 20, ' ' . utf8_decode($carrera) . ' ', 0, 0, 'C');

$pdf->Ln(15);

$pdf->Cell(22, 20, '', 1, 0, 'C');

$pdf->Cell(15, 20, '', 0, 0, 'C');
$pdf->SetFont('bell', 'B', 8);
$pdf->Cell(20, 10, 'CLAVE', TBL, 0, 'C');
$pdf->Cell(42, 10, 'ASIGNATURAS', TBL, 0, 'C');
$pdf->Cell(20, 10, 'FECHA', 1, 0, 'C');
$pdf->Cell(26, 5, 'CALIFICACIONES', T, 0, 'C');
$pdf->Cell(15, 5, 'No DE', LT, 0, 'C');
$pdf->Cell(20, 5, 'OBSERVA', LTR, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(119, 5, '', 0, 0, 'C');
$pdf->SetFont('belln', '', 8);
$pdf->Cell(12, 5, 'No', TLB, 0, 'C');
$pdf->Cell(14, 5, 'LETRA', 1, 0, 'C');
$pdf->SetFont('bell', 'B', 8);
$pdf->Cell(15, 5, 'CREDITOS', B, 0, 'C');
$pdf->Cell(20, 5, 'CIONES', LBR, 0, 'C');

$pdf->Ln(5);
$contador = 0;
while ($cuatri = mysql_fetch_array($listatetramestres)) {
    $grado_id = $cuatri["Grado_id"];
    $nomtetra = NombreTetramestre($grado_id);
    $pdf->Cell(37, 5, '', 0, 0, 'C');
    $pdf->SetFont('bell', 'B', 8);
    $pdf->Cell(20, 5, '', L, 0, 'C');
    $pdf->Cell(42, 5, $nomtetra . ' TETRAMESTRE', TLR, 0, 'C');
    $pdf->Cell(20, 5, '', 'R', 0, 'C');
    $pdf->Cell(12, 5, '', 'R', 0, 'C');
    $pdf->Cell(14, 5, '', 'R', 0, 'C');
    $pdf->Cell(15, 5, '', 'R', 0, 'C');
    $pdf->Cell(20, 5, '', 'R', 0, 'C');
    $pdf->Ln(5);
    $listamaterias = ConsultarLista("Select m.* from Planes p join Materias m on m.id=p.Materia_id  join Grados g on g.id=p.Grado_id where p.Grado_id=$grado_id and p.Carrera_id=$carrera_id order by p.id");
    $cont = 0;
    while ($materia = mysql_fetch_array($listamaterias)) {
        $materianombre = $materia["Nombre"];
        $materia_id = $materia["id"];
        $clave = $materia["Clave"];
        $periodomateria = PeriodoMateria($alumno_id, $materia_id);
        $promediomateria = PromedioMateria($alumno_id, $materia_id);
        $suma=$suma+$promediomateria;
        $contador=$contador+1;
        $pdf->Cell(37, 8, '', 0, 0, 'C');
        $pdf->SetFont('bell', 'B', 8);
        $pdf->Cell(20, 9, $clave, 'TLRB', 0, 'C');
        $y = $pdf->GetY();
        $x = $pdf->GetX();
        $nletras=strlen(utf8_decode(' ' . $materianombre));
        $renglones=$nletras/20;
        if (strlen(utf8_decode(' ' . $materianombre)) > 30) {
            $pdf->MultiCell(42, 3, utf8_decode(' ' . $materianombre), T, 'C', 0);
        } else {
            $pdf->Cell(42, 9, utf8_decode(' ' . $materianombre), 'T', 0, 'C');
        }
        $pdf->SetXY($x, $y);
        $pdf->Cell(42, 9, '', 'B', 0, 'C');
        $pdf->SetXY($x + 42, $y);
        $pdf->SetFont('bell', 'B', 8);
        $pdf->Cell(20, 9, $periodomateria, 1, 0, 'C');
        $pdf->SetFont('bell', 'B', 8);
        $pdf->Cell(12, 9, $promediomateria, 1, 0, 'C');

        $y = $pdf->GetY();
        $x = $pdf->GetX();
        $pdf->SetFont('bell', 'B', 8);
        if (strlen(numtoletras($promediomateria)) > 10) {
            $pdf->MultiCell(14, 4, numtoletras($promediomateria), 'T', 'C', 0);
        } else {
            $pdf->Cell(14, 9, numtoletras($promediomateria), 'T', 0, 'C');
        }

        $pdf->SetXY($x, $y);
        $pdf->Cell(14, 9, '', 'B', 0, 'C');
        $pdf->SetXY($x + 14, $y);



        $pdf->Cell(15, 9, '5', 1, 0, 'C');
        $pdf->Cell(20, 9, '', 1, 0, 'C');
        $pdf->Ln(9);
    }
}

$pdf->SetXY(13, 187);
$pdf->Cell(25, 16, '', 1, 0, 'C');

$promediofinal= intval($suma/$contador);

$pdf->SetXY(12, 183);
$pdf->SetFont('belln', '', 10);
$pdf->Cell(25, 16, 'PROMEDIO', 0, 0, 'C');

$pdf->SetXY(12, 191);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 16, $promediofinal, 0, 0, 'C');

$pdf->SetXY(12, 203);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'REGISTRADO', 0, 0, 'C');

$pdf->SetXY(12, 206);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'LIBRO No', 0, 0, 'C');

$pdf->SetXY(12, 214);
$pdf->SetFont('Times', 'B', 8);
$pdf->Cell(25, 16,$libro, 0, 0, 'C');

$pdf->SetXY(12, 215);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'____', 0, 0, 'C');

$pdf->SetXY(12, 225);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'CON FOLIO', 0, 0, 'C');

$pdf->SetXY(12, 235);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'____', 0, 0, 'C');


$pdf->SetXY(12, 234);
$pdf->SetFont('Times', 'B', 8);
$pdf->Cell(25, 16,$folio, 0, 0, 'C');

$pdf->SetXY(12, 244);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,utf8_decode('COTEJO'), 0, 0, 'C');

$pdf->SetXY(12, 253);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'____', 0, 0, 'C');

$pdf->SetXY(12, 263);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,utf8_decode('FECHA'), 0, 0, 'C');


$pdf->SetXY(12, 272);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,'___________', 0, 0, 'C');

$pdf->SetXY(12, 271);
$pdf->SetFont('TimesB', 'B', 8);
$pdf->Cell(25, 16,$dia.'/'.$mes.'/'.$ano, 0, 0, 'C');

$pdf->SetXY(12, 282);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,utf8_decode('CERTIFICADO'), 0, 0, 'C');

$pdf->SetXY(12, 291);
$pdf->SetFont('Times', '', 8);
$pdf->Cell(25, 16,utf8_decode('N° '.$ncertificado), 0, 0, 'C');

$pdf->SetXY(46, 280);
$pdf->SetFont('Times', '', 10);
$pdf->MultiCell(200, 6,utf8_decode('La escala de calificaciones es de 60 (sesenta) a 100 (cien). La calificación mínima aprobatoria es de 80
(ochenta)'), 0, 'L', 0);

$pdf->SetXY(46, 290);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(45, 6,utf8_decode('El presente certificado ampara'), 0, 0, 'L');

$pdf->SetXY(89, 290);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6,utf8_decode('_80_'), 0, 0, 'L');

$pdf->SetXY(97, 290);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6,utf8_decode('créditos que corresponden a'), 0, 0, 'L');

$pdf->SetXY(138, 290);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6,utf8_decode('_16_'), 0, 0, 'L');

$pdf->SetXY(146, 290);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6,utf8_decode('asignaturas que integran el plan'), 0, 0, 'L');

$pdf->SetXY(46, 294);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6,utf8_decode('de estudios de la'), 0, 0, 'L');

$pdf->SetXY(70, 294);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, ' ' . utf8_decode($carrera) . '. ', 0, 0, 'L');

$pdf->SetXY(46, 299);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6, 'Se expide el presente en ciudad Chihuahua, Chih. a los ', 0, 0, 'L');

$pdf->SetXY(125,299);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, $dia, 0, 0, 'L');

$pdf->SetXY(129, 299);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6, utf8_decode(' días del mes de '), 0, 0, 'L');

$pdf->SetXY(153, 299);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, $mesletra, 0, 0, 'L');

$pdf->SetXY(166, 299);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(25, 6, utf8_decode(' de '), 0, 0, 'L');

$pdf->SetXY(171, 299);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, ' '.$ano.'.', 0, 0, 'L');

$pdf->SetXY(46, 303);
$pdf->SetFont('Times', '', 10);

if($carrera=="MAESTRIA EN DOCENCIA, AREA COMPETENCIAS PROFESIONALES" && $universidad_id==1)
{
$pdf->Cell(25, 6, utf8_decode('CLAVE D. G. P. INSTITUCION EDUCATIVA 080196 Y CLAVE D. G. P. DE CARRERA 244538.'), 0, 0, 'L');    
}
else if($carrera=="MAESTRIA EN PSICOLOGIA EDUCATIVA" && $universidad_id==1)
{
$pdf->Cell(25, 6, utf8_decode('CLAVE D. G. P. INSTITUCION EDUCATIVA 080196 Y CLAVE D. G. P. DE CARRERA 231525.'), 0, 0, 'L');    
}
$pdf->SetXY(60, 310);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(25, 6, utf8_decode('LA DIRECTORA'), 0, 0, 'L');

$pdf->SetXY(119, 310);
$pdf->SetFont('Timess', '', 9);
$pdf->MultiCell(65, 3, utf8_decode('C. JEFE DEL DEPARTAMENTO DE
CERTIFICACIÓN E INCORPORACIÓN DE LA
SECRETARIA DE EDUCACION Y
DEPORTE'), 0, 'C',0);



$pdf->SetXY(40, 325);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(25, 6, '   _____________________________________               ____________________________________ ', 0, 0, 'L');

$pdf->SetXY(40, 329);
$pdf->SetFont('Times', '', 10);
$director=ObtenerDirector($universidad_id);
//$pdf->Cell(25, 6, utf8_decode('MTRA. VELIA ESPERANZA TERRAZAS BACA            LIC. ELVIRA HERNANDEZ MUÑOZ  '), 0, 0, 'L');
$pdf->Cell(25, 6, utf8_decode($director.'            LIC. ELVIRA HERNANDEZ MUÑOZ  '), 0, 0, 'L');

$pdf->Output();
?>
