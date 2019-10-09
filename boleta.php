<?php
require('fpdf/fpdf.php');
header("Content-Type: text/html; charset=iso-8859-1");
$alumno_id = $_REQUEST["alumno_id"];
require_once("funciones.php");
$alumno=ConsultarRegistro("Select * from Alumnos where id =$alumno_id");
$matricula=$alumno['Matricula'];
$nombre = ConsultarValor("Select concat(ApellidoP,' ',ApellidoM,' ',Nombre) as valor from Alumnos join Aspirantes on Aspirantes.id=Alumnos.Aspirante_id where Alumnos.id=$alumno_id");
$carrera = ConsultarValor("Select c.Nombre as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$carrera_id = ConsultarValor("Select c.id as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
$listatetramestres = ConsultarLista("Select * from Planes where Carrera_id=$carrera_id group by Grado_id order by Grado_id Asc");
$materiasplan = ConsultarLista("Select m.* from Planes p join Materias m on m.id=p.Materia_id  join Grados g on g.id=p.Grado_id where p.Carrera_id=$carrera_id order by p.id");
$contaprobadas=0;
    while ($materia = mysql_fetch_array($materiasplan)) {
        $mat_id=$materia['id'];
        $promediomat = PromedioMateria($alumno_id, $mat_id);
        if($promediomat!="" && $promediomat>7)
        {
            $contaprobadas++;
        }
    }
$mes=date("n");
$mesletra=mesletra($mes);
$dia=date("j");
$ano=date("Y");
$pdf = new FPDF();
$pdf->AddFont('Timess', '', 'cambria.php');
$pdf->AddFont('TimesB', 'B', 'cambriab.php');
$pdf->AddFont('Comprimida', '', 'Times NR Condensed.php');

$pdf->AddPage('P', 'Letter');
//$pdf->Cell(60,10,'Texto',borde,salto de linea,'CLR alineacion');
$pdf->SetFont('Timess', '', 16);

$pdf->Image('img/logo2.png', 75, 7, 60);

$pdf->SetFont('Timess', '', 14);
$pdf->SetXY(140, 30);
$pdf->Cell(25, 16, 'CLAVE CT  08PSU5015O', 0, 0, 'L');
$pdf->SetXY(140, 38);
$pdf->SetFont('TimesB', 'B', 11);
$pdf->Cell(25, 16,"FECHA: ".$dia.'/'.$mes.'/'.$ano, 0, 0, 'L');

$pdf->SetXY(10, 55);
$pdf->Cell(42, 6, utf8_decode('Matrícula:'), 1, 0, 'L');
$pdf->Cell(28, 6, $matricula, 1, 0, 'L');
$pdf->Cell(42, 6, utf8_decode('Nombre:'), 1, 0, 'L');
$pdf->Cell(78, 6,utf8_decode($nombre), 1, 0, 'L');

$pdf->SetXY(10, 61);
$pdf->Cell(42, 6, utf8_decode('Créditos aprobados:'), 1, 0, 'L');
$pdf->Cell(28, 6, $contaprobadas*5, 1, 0, 'L');
$pdf->Cell(42, 6, utf8_decode('Créditos por aprobar:'), 1, 0, 'L');
$pdf->Cell(78, 6,80-($contaprobadas*5), 1, 0, 'L');

$pdf->SetXY(10, 67);
$pdf->Cell(42, 6, utf8_decode('Materias acreditadas:'), 1, 0, 'L');
$pdf->Cell(28, 6, $contaprobadas, 1, 0, 'L');
$pdf->Cell(42, 6, utf8_decode('Ciclos:'), 1, 0, 'L');
$pdf->Cell(78, 6,'ciclos', 1, 0, 'L');

$pdf->Ln(8);
$periodoactivo=PeriodoActivo();
$nombreperiodoactivo=$periodoactivo['Nombre'];
$pdf->Cell(200, 7, 'CICLO ESCOLAR '.utf8_decode( $nombreperiodoactivo), 0, 0, 'C');


$pdf->Ln(7);

$pdf->SetFont('TimesB', 'B', 12);
$pdf->Cell(200, 7, ' ' . utf8_decode($carrera) . ' ', 0, 0, 'C');

$pdf->Ln(8);
$pdf->Cell(200, 7, 'RVOE: SEC- 006/2009', 0, 0, 'C');

$pdf->Ln(7);

$pdf->SetXY(10, 100);
$pdf->SetFont('TimesB', 'B', 8);
$pdf->SetFillColor(140, 161, 210);
$pdf->Cell(20, 10, 'CLAVE', 1, 0, 'C',1);
$pdf->SetFillColor(140, 161, 210);
$pdf->Cell(130, 10, 'ASIGNATURA', 1, 0, 'C',1);
$pdf->SetFillColor(140, 161, 210);
$pdf->Cell(26, 10, 'CALIFICACION', 1, 0, 'C',1);
$pdf->Cell(15, 10, 'CREDITOS', 1, 0, 'C',1);
$pdf->Ln(10);

while ($cuatri = mysql_fetch_array($listatetramestres)) {
    $grado_id = $cuatri["Grado_id"];
    $nomtetra = NombreTetramestre($grado_id);
    $pdf->SetFont('TimesB', 'B', 8);
switch ($grado_id) {
        case 1:
        $pdf->SetFillColor(156, 223, 188);        
        break;
        case 2:
        $pdf->SetFillColor(139, 154, 202);        
        break;
        case 3:
        $pdf->SetFillColor(172, 255, 250);        
        break;
        case 4:
        $pdf->SetFillColor(153, 232, 148); 
        break;       
}

    $pdf->Cell(191, 5, 'CICLO '.$grado_id, 1, 0, 'C',1);
    $pdf->Ln(5);
    
    $listamaterias = ConsultarLista("Select m.* from Planes p join Materias m on m.id=p.Materia_id  join Grados g on g.id=p.Grado_id where p.Grado_id=$grado_id and p.Carrera_id=$carrera_id order by p.id");

    
    while ($materia = mysql_fetch_array($listamaterias)) {
        $materianombre = $materia["Nombre"];
        $materia_id = $materia["id"];
        $clave = $materia["Clave"];
        $periodomateria = PeriodoMateria($alumno_id, $materia_id);
        $promediomateria = PromedioMateria($alumno_id, $materia_id);
        $suma=$suma+$promediomateria;
        
        $pdf->SetFont('Comprimida', '', 8);
        $pdf->Cell(20, 6, $clave, 'TLRB', 0, 'C');
        $pdf->Cell(130, 6, utf8_decode('   ' . $materianombre), 1, 0, 'L');
        
        
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(26, 6, $promediomateria, 1, 0, 'C');
        $pdf->Cell(15, 6, '5', 1, 0, 'C');
    
        $pdf->Ln(6);

    }
}
        $pdf->Cell(20, 6, '', 0, 0, 'C');
        $pdf->Cell(130, 6, 'Total', 1, 0, 'L');
        $pdf->Cell(26, 6, '', 1, 0, 'C');
        $pdf->Cell(15, 6, $contaprobadas*5, 1, 0, 'C');
        
    
        $pdf->Ln(6);


$pdf->SetXY(10, 241);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(200, 6, '____________________________________', 0, 0, 'C');
$pdf->Ln(6);
$pdf->Cell(200, 6, utf8_decode('DIRECTORA'), 0, 0, 'C');
$pdf->Ln(6);
$pdf->Cell(200, 6, utf8_decode('M.E. VELIA ESPERANZA TERRAZAS BACA'), 0, 0, 'C');

$pdf->Output();
?>
