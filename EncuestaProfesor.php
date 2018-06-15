	<?php
session_start();
ob_start();
$alumno_id=$_SESSION['alumno_id'];
$usuario_id=$_SESSION['usuario_id'];
require_once("funciones.php");
		$periodo=PeriodoActivo();
		$periodo_id=$periodo["id"];
              $grupo=ConsultarRegistro("Select Grupos.Nombre,Grupos.id,Historialalumnos.id as hist_id,gra.Nombre as NombreGrado from Historialalumnos join Grupos on Grupos.id=Historialalumnos.Grupo_id join Grados gra on gra.id=Grupos.Grado_id join Periodos per on per.id=Historialalumnos.Periodo_id where Alumno_id=$alumno_id and Movimiento='Inscripción' and per.id=$periodo_id order by per.FechaInicio desc");
$ha_id=$grupo['hist_id'];
if($ha_id!=null)
{
$grupo_id=$grupo['id'];
$listamaterias=ConsultarLista("Select h.id,ma.id as mat_id,ma.Nombre from Historialmateria h join Materias ma on h.Materia_id=ma.id where Alumno_id=$alumno_id and Historialalumnos_id=$ha_id");
echo '<h1 class="text-shadow">EVALUACIÓN DE LA ASIGNATURA</h1>';
echo '<h3 class="text-shadow" style="color: green">PERCEPCIÓN DE LOS ESTUDIANTES</h3><br>';
echo "<form action ='GuardarEncuestaProfesor.php?alumno_id=$alumno_id' method='post'>";
echo "<b>Selecciona la materia y profesor que deseas evaluar</b><br><br>";
echo '<div class="input-control select full-size">';
echo '<select name="historial_id">';
//$nummaterias=mysql_num_rows($listamaterias);
$materiasfaltantes=0;
while($materia=mysql_fetch_array($listamaterias))
{
       $materianombre=$materia['Nombre'];
       $materia_id=$materia['mat_id'];
       $profesor=ConsultarRegistro("Select concat(Nombre,' ',ApellidoP,' ',ApellidoM) as nombreprofesor,h.id as hd_id from Historialdocente h join Docentes d on d.id=h.Docente_id where Grupo_id=$grupo_id and Materia_id=$materia_id");
       $historial_id=$materia['id'];
       $historialdocente_id=$profesor['hd_id'];
       $profesornombre=$profesor['nombreprofesor'];
       $yacontestoencuesta=ConsultarValor("Select count(*) as valor from EncuestaProfesor where alumno_id=$alumno_id and historial_id=$historialdocente_id");
       if($yacontestoencuesta<1)
       {
       	$materiasfaltantes++;
  	echo "<option value='$historialdocente_id'";
  	echo ">$materianombre"." | ".$profesornombre."</option>";
  	}
}
echo "</select>";
echo '</div>';

if ($materiasfaltantes>0)
{
?>
<br><br><br><b>Estimado(a) estudiante:</b> <br>
	Esta evaluación tiene como propósito identificar las áreas de oportunidad para la mejora continua de nuestros posgrados con el fin de proponer mejoras. <br>El cuestionario es anónimo y la información suministrada es confidencial.<br>
¡Muchas gracias por su colaboración!
<br><br><br><b style="color:green">Instrucciones: Valore los siguientes aspectos de actividades de enseñanza aprendizaje en este curso,  utilizando una escala de 1 a 10.</b>
<br><b style="color:blue">10  es una apreciación "completamente de acuerdo" con el enunciado y 1 "completamente en desacuerdo".</b>
<br><br><br>
<table class="table hovered bordered sombra">
<thead>
	<tr>
		<th colspan="2">
			ACTIVIDADES DE ENSEÑANZA APRENDIZAJE
		</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>1.- El programa es pertinente para mi formación y está organizado conforme a los propósitos de la Asignatura.</td>
		<td>
			<div class="input-control select">
			<select name="1">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>2.- Los contenidos y las actividades de aprendizaje permiten que me involucre en mi propio aprendizaje de manera activa y profunda.  </td>
		<td>
			<div class="input-control select">
			<select name="2">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>3.- La metodología utilizada me permitió desarrollar competencias docentes.</td>
		<td>
			<div class="input-control select">
			<select name="3">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>4.- Recibí retroalimentación de mis evidencias de aprendizaje de modo que mi evaluación fue formativa.</td>
		<td>
			<div class="input-control select">
			<select name="4">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>5.- Hay correspondencia entre los propósitos del curso y el tipo de evaluación aplicada.</td>
		<td>
			<div class="input-control select">
			<select name="5">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>

		<tr>
		<td>6.- La devolución de evidencias de aprendizaje (pruebas cortas, ensayos, trabajos) fue oportuna y favoreció mi aprendizaje.</td>
		<td>
			<div class="input-control select">
			<select name="6">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>7.- El profesor o profesora muestra experiencia profesional y la vincula con la temática del curso.</td>
		<td>
			<div class="input-control select">
			<select name="7">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>

		<tr>
		<td>8.-  El profesor o profesora siempre empieza la clase a la hora establecida.</td>
		<td>
			<div class="input-control select">
			<select name="8">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>9.- El profesor o profesora siempre finaliza la clase a la hora establecida.</td>
		<td>
			<div class="input-control select">
			<select name="9">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>10.- El profesor o profesora siempre repone las clases cuando por algún motivo se pierde una sesión o parte de ella.</td>
		<td>
			<div class="input-control select">
			<select name="10">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>11.- Las normas y lineamientos generales para la asistencia, comportamiento, participación y actividades quedan claras, no hay contradicciones.</td>
		<td>
			<div class="input-control select">
			<select name="11">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<thead>
		<tr>
		<th colspan="2">	Cuáles de las siguientes actividades de aprendizaje se desarrollaron en esta asignatura:</th>
		</tr>
		</thead>
		<tr>
		<td>12.- Adquisición y organización de información mediante diversas técnicas de estudio.</td>
		<td>
			<div class="input-control select">
			<select name="12">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>13.- Interpretación y contrastación de información (cuadros, mapas, ensayos)</td>
		<td>
			<div class="input-control select">
			<select name="13">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>14.- Hacer inferencias y extraer conclusiones por escrito</td>
		<td>
			<div class="input-control select">
			<select name="14">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>15.- Comprensión y organización de información por escrito</td>
		<td>
			<div class="input-control select">
			<select name="15">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>16.- Utiliza técnicas de aprendizaje cooperativo (equipos, aprendizaje por proyectos, aprendizaje por problemas, análisis de casos- pueden ser de la tesina) </td>
		<td>
			<div class="input-control select">
			<select name="16">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>17.- Prácticas o ejercicios de planeación didáctica</td>
		<td>
			<div class="input-control select">
			<select name="17">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>18.- Avance en la redacción de mi tesina</td>
		<td>
			<div class="input-control select">
			<select name="18">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
		</tr>
		<tr>
		<td>19.- Avance en la planeación y estrategias didácticas de mi tesina</td>
		<td>
			<div class="input-control select">
			<select name="19">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
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
			<div class="input-control select">
			<select name="20">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>21.- Usted asistió puntualmente a todas las lecciones de este curso. </td>
		<td>
			<div class="input-control select">
			<select name="21">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>22.- Usted fue respetuoso con su  profesor o profesora y compañeros.</td>
		<td>
			<div class="input-control select">
			<select name="22">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>23.- Su participación  en las clases contribuyó a enriquecer el curso.</td>
		<td>
			<div class="input-control select">
			<select name="23">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>24.- En la escala de 1 a 10, cómo calificaría su desempeño como estudiante en este curso.</td>
		<td>
			<div class="input-control select">
			<select name="24">
			<option value="10">10</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
			<option value="4">4</option>
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select>
			</div>
		</td>
	</tr>
	<tr>
	<td>
		25.- Si desea realizar propuestas o recomendaciones que contribuyan a mejorar el desempeño docente, utilice este espacio:
	</td>
		<td colspan="2">
			<textarea name="25" class="full-size"></textarea>
		</td>
	</tr>
</table>
<center><input type="submit" value="Guardar encuesta" class="button large success"></center>
</form>
<?php

}
else
{
	echo "<br><h2 style='color: green'>Ya has contestado todas tus encuestas, gracias.</h2>";
}
}
else{
	echo "<h1>No tienes materias activas en el cuatrimestre actual.</h1>";

}
?>
