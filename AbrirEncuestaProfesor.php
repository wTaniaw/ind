<?php
require_once("funciones.php");
$encuesta_id=$_REQUEST["encuesta_id"];
$encuesta=ConsultarRegistro("Select * from EncuestaProfesor where id=$encuesta_id");
?>
<script>
	function Imprimir()
	{
		$("#encu").printArea();
	}
</script>
<h1 class="text-shadow"><span class="mif-arrow-left mif-ani-fast mif-ani-hover-horizontal sombra" style="border-radius:50%;border: 2px solid green;font-size:30px" onclick="Abrir('EncuestasProfesor.php')">
</span> Encuesta profesor <?php echo $encuesta_id ?> </h1><br>
<br>
<div style="border-radius:30px;border:2px black solid;padding:20px" id="encu">

<table class="table hovered bordered sombra">
<thead>
	<tr>
		<th colspan="2">
			DESEMPEÑO DOCENTE
		</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>1.- El programa es pertinente para mi formación y está organizado conforme a los propósitos de la Asignatura</td>
		<td>
			<?php echo $encuesta['p1']; ?>
		</td>
		</tr>
		<tr>
		<td>2.- Los contenidos y las actividades de aprendizaje permiten que me involucre en mi propio aprendizaje de manera activa y profunda. </td>
		<td>
			<?php echo $encuesta['p2']; ?>
		</td>
		</tr>
		<tr>
		<td>3.- La metodología utilizada me permitió desarrollar competencias docentes.</td>
		<td>
			<?php echo $encuesta['p3']; ?>
		</td>
		</tr>
		<tr>
		<td>4.- Recibí retroalimentación de mis evidencias de aprendizaje de modo que mi evaluación fue formativa.</td>
		<td>
			<?php echo $encuesta['p4']; ?>
		</td>
		</tr>
		<tr>
		<td>5.- Hay correspondencia entre los propósitos del curso y el tipo de evaluación aplicada.</td>
		<td>
			<?php echo $encuesta['p5']; ?>
		</td>
		</tr>
		<tr>
		<td>6.- La devolución de evidencias de aprendizaje (pruebas cortas, ensayos, trabajos) fue oportuna y favoreció mi aprendizaje</td>
		<td>
			<?php echo $encuesta['p6']; ?>
		</td>
		</tr>
		<tr>
		<td>7.- El profesor o profesora muestra experiencia profesional y la vincula con la temática del curso.</td>
		<td>
			<?php echo $encuesta['p7']; ?>
		</td>
		</tr>
		<tr>
		<td>8.- El profesor o profesora siempre empieza la clase a la hora establecida.</td>
		<td>
		<?php echo $encuesta['p8']; ?>
		</td>
		</tr>
		<tr>
		<td>9.- El profesor o profesora siempre finaliza la clase a la hora establecida.</td>
		<td>
			<?php echo $encuesta['p9']; ?>
		</td>
		</tr>
		<tr>
		<td>10.- El profesor o profesora siempre repone las clases cuando por algún motivo se pierde una sesión o parte de ella</td>
		<td>
			<?php echo $encuesta['p10']; ?>
		</td>
		</tr>
		<tr>
		<td>11.- Las normas y lineamientos generales para la asistencia, comportamiento, participación y actividades quedan claras, no hay contradicciones.</td>
		<td>
			<?php echo $encuesta['p11']; ?>
		</td>
		</tr>
		<tr>
		<th colspan="2">Cuáles de las siguientes actividades de aprendizaje se desarrollaron en esta asignatura:</th>
		</tr>
		<tr>
		<td>12.- Adquisición y organización de información mediante diversas técnicas de estudio</td>
		<td>
			<?php echo $encuesta['p12']; ?>
		</td>
		</tr>
		<tr>
		<td>13.- Interpretación y contrastación de información (cuadros, mapas, ensayos)</td>
		<td>
			<?php echo $encuesta['p13']; ?>
		</td>
		</tr>
		<tr>
		<td>14.- Hacer inferencias y extraer conclusiones por escrito</td>
		<td>
			<?php echo $encuesta['p14']; ?>
		</td>
		</tr>
		<tr>
		<td>15.- Comprensión y organización de información por escrito</td>
		<td>
			<?php echo $encuesta['p15']; ?>
		</td>
		</tr>
		<tr>
		<td>16.- Utiliza técnicas de aprendizaje cooperativo (equipos, aprendizaje por proyectos, aprendizaje por problemas, análisis de casos- pueden ser de la tesina)</td>
		<td>
			<?php echo $encuesta['p16']; ?>
		</td>
		</tr>
		<tr>
		<td>17.-  Prácticas o ejercicios de planeación didáctica</td>
		<td>
			<?php echo $encuesta['p17']; ?>
		</td>
		</tr>
		<tr>
		<td>18.- Avance en la redacción de mi tesina</td>
		<td>
			<?php echo $encuesta['p18']; ?>
		</td>
		</tr>
		<tr>
		<td>19.- Avance en la planeación y estrategias didácticas de mi tesina</td>
		<td>
			<?php echo $encuesta['p19']; ?>
		</td>
		</tr>
		<tr>
		<td colspan="2"></td>
	</tr>
</tbody>
<thead>
<tr>
<th colspan="2">AUTOEVALUACIÓN DEL ESTUDIANTE</th>
</tr>
</thead>
		<tr>
		<td>20.- Usted realizó todas las actividades y trabajos solicitados en el curso.</td>
		<td>
			<?php echo $encuesta['p20']; ?>
		</td>
		</tr>
		<tr>
		<td>21.- Usted asistió puntualmente a todas las sesiones de este curso. </td>
		<td>
			<?php echo $encuesta['p21']; ?>
		</td>
		</tr>
		<tr>
		<td>22.- Usted fue respetuoso con su  profesor o profesora y compañeros.</td>
		<td>
			<?php echo $encuesta['p22']; ?>
		</td>
		</tr>
		<tr>
		<td>23.- Su participación  en las clases contribuyó a enriquecer el curso.</td>
		<td>
			<?php echo $encuesta['p23']; ?>
		</td>
		</tr>
		<tr>
		<td>24.- En la escala de 1 a 10, cómo calificaría su desempeño como estudiante en este curso.</td>
		<td>
			<?php echo $encuesta['p24']; ?>
		</td>
		</tr>
		<tr>
		<td>25.- Si desea realizar propuestas o recomendaciones que contribuyan a mejorar el desempeño docente, utilice este espacio:</td>
		<td>
			<?php echo $encuesta['p25']; ?>
		</td>
		</tr>
</table>

	</div><br>
	<input type="button" class="button primary large shadow text-shadow" value="Imprimir" onclick="Imprimir()">

