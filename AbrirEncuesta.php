<?php
require_once("funciones.php");
$encuesta_id=$_REQUEST["encuesta_id"];
$encuesta=ConsultarRegistro("Select * from Encuesta where id=$encuesta_id");
?>
<script>
	function Imprimir()
	{
		$("#encu").printArea();
	}
</script>
<h1 class="text-shadow"><span class="mif-arrow-left mif-ani-fast mif-ani-hover-horizontal sombra" style="border-radius:50%;border: 2px solid green;font-size:30px" onclick="Abrir('Encuestas.php')">
</span> Encuesta <?php echo $encuesta_id ?> </h1><br>
<br>
<div style="border-radius:30px;border:2px black solid;padding:20px" id="encu">
<b style="color: #0B2161">Tipo de escuela donde estudio estudió su maestría</b><br>
	<b><?php echo $encuesta['tipoescuela'] ?></b>
	<br><br>
	<b style="color: #0B2161">Nombre de la Maestría cursada:</b><br>
	<b><?php echo $encuesta['maestria'] ?></b>
	<br><br>
	<b style="color: #0B2161">¿Estás titulado?</b><br>
	<b><?php echo $encuesta['titulado'] ?></b>
	<br><br>
	<b style="color: #0B2161">Sexo</b><br>
	<b><?php echo $encuesta['sexo'] ?></b>
	<br><br>
	<b style="color: #0B2161">Edad</b><br>
	<b><?php echo $encuesta['edad'] ?> años.</b>
       <br><br>
	<b style="color: #0B2161">¿Desearías seguir estudiando después de terminar la Maestría? </b><br>
	<b><?php echo $encuesta['seguir'] ?></b>
	<br><br>
	<b style="color: #0B2161">En qué tipo de institución te gustaría estudiar: </b><br>
	<b><?php echo $encuesta['tipoescuelafuturo'] ?></b>
	<br><br>
	<b style="color: #0B2161">¿Qué doctorado te gustaría estudiar?</b><br>
	<b><?php echo $encuesta['doctorado'] ?></b>
	<br><br>
	<b style="color: #0B2161">¿Por qué?</b><br>
	<b><?php echo $encuesta['porque'] ?></b>
	<br><br>
	<b style="color: #0B2161">¿Por qué motivo te gustaría estudiar el doctorado</b><br>
	<table class="table hovered bordered border">
		<tr>
			<td>Para favorecer mi  desarrollo personal</td>
			<td>
				<b><?php echo $encuesta['motivo1'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para favorecer mi desarrollo profesional</td>

			<td>
			<b><?php echo $encuesta['motivo2'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para aprender a elaborar planes de mejora educativa</td>

			<td>
			<b><?php echo $encuesta['motivo3'] ?></b>
			</td>
		</tr>

		<tr>
			<td>Para conocer modelos de evaluación de instituciones educativas</td>

			<td>
			<b><?php echo $encuesta['motivo4'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para conocer y fortalecer mis competencias directivas</td>

			<td>
			<b><?php echo $encuesta['motivo5'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para aprender a promover el cambio educativo en el plantel</td>

			<td>
			<b><?php echo $encuesta['motivo6'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para aprender a manejar y resolver conflictos</td>

			<td>
			<b><?php echo $encuesta['motivo7'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para dar seguimiento y evaluar los planes educativos</td>

			<td>
			<b><?php echo $encuesta['motivo8'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para saber cómo convertir a mi escuela en una organización que aprende</td>
			<td>
				<b><?php echo $encuesta['motivo9'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para identificar las características de los modelos de administración educativa</td>
			<td>
				<b><?php echo $encuesta['motivo10'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para saber cuáles son las tendencias internacionales de evaluación educativa</td>
			<td>
				<b><?php echo $encuesta['motivo11'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para identificar las diferencias entre la gestión estratégica y la administración tradicional</td>
			<td>
				<b><?php echo $encuesta['motivo12'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para identificar las características de los distintos tipos de liderazgos en las escuelas</td>
			<td>
			<b><?php echo $encuesta['motivo13'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para utilizar distintos enfoques y estrategias de evaluación en el aula</td>
			<td>
			<b><?php echo $encuesta['motivo14'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para aprender a elaborar proyectos de evaluación educativa</td>
			<td>
			<b><?php echo $encuesta['motivo15'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para conocer y utilizar los métodos de evaluación de programas</td>
			<td>
				<b><?php echo $encuesta['motivo16'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para mejorar la convivencia y la inclusión en el centro escolar</td>
			<td>
				<b><?php echo $encuesta['motivo17'] ?></b>
			</td>
		</tr>
	</table>

	<br><br>

	<b style="color: #0B2161">Porque es importante cursar un doctorado </b><br><br>
	<table class="table hovered bordered border">
		<tr>
			<th>Totalmente <br>de Acuerdo</th>
			<th>Parcialmente <br>de Acuerdo</th>
			<th>Ni de Acuerdo <br>ni en Desacuerdo</th>
			<th>Parcialmente <br>en Desacuerdo</th>
			<th>Totalmente <br>en Desacuerdo</th>
		</tr>
		<tr>
			<td style="text-align:center">5</td>
			<td style="text-align:center">4</td>
			<td style="text-align:center">3</td>
			<td style="text-align:center">2</td>
			<td style="text-align:center">1</td>
		</tr>
	</table>

	<table class="table hovered bordered border">
		<tr>
			<td>Porque la demandas a los profesionales de la educación es cada vez mayor</td>
			<td>
				<b><?php echo $encuesta['importantecursar1'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Se cuenta con más elementos para comprender los enfoques y metodología de los planes y programas de estudio</td>
			<td>
				<b><?php echo $encuesta['importantecursar2'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para participar en distintas funciones docentes (asesor técnico pedagógico, tutor, capacitar, dar conferencias)</td>
			<td>
				<b><?php echo $encuesta['importantecursar3'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para contar con las competencias que demanda la Reforma Educativa</td>
			<td>
				<b><?php echo $encuesta['importantecursar4'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para contribuir a la mejora de la educación en este país</td>
			<td>
				<b><?php echo $encuesta['importantecursar5'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para aprender a generar evidencias de la mejora (informes, planes de mejora, planes de intervención,etc)</td>
			<td>
				<b><?php echo $encuesta['importantecursar6'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Para responder con eficacia a las evaluaciones del servicio profesional docente</td>
			<td>
			<b><?php echo $encuesta['importantecursar7'] ?></b>
			</td>
		</tr>
	</table>

	<br><br>

	<b style="color: #0B2161">La importancia de que los docentes de todos los niveles cursen estudios de doctorado radica en: </b><br><br>
	<table class="table hovered bordered border">
		<tr>
			<th>Totalmente <br>de Acuerdo</th>
			<th>Parcialmente <br>de Acuerdo</th>
			<th>Ni de Acuerdo <br>ni en Desacuerdo</th>
			<th>Parcialmente <br>en Desacuerdo</th>
			<th>Totalmente <br>en Desacuerdo</th>
		</tr>
		<tr>
			<td style="text-align:center">5</td>
			<td style="text-align:center">4</td>
			<td style="text-align:center">3</td>
			<td style="text-align:center">2</td>
			<td style="text-align:center">1</td>
		</tr>
	</table>

	<table class="table hovered bordered border">
		<tr>
			<td>Los profesores adquieren un nivel óptimo de desempeño docente</td>
			<td>
				<b><?php echo $encuesta['radica1'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Los docentes son  el factor principal de la educación en todo el mundo</td>
			<td>
				<b><?php echo $encuesta['radica2'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Los profesores lideran el cambio en el sector educativo</td>
			<td>
				<b><?php echo $encuesta['radica3'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Los docentes adquieren una conciencia crítica del sistema educativo y de las políticas educativas</td>
			<td>
				<b><?php echo $encuesta['radica4'] ?></b>
			</td>
		</tr>
		<tr>
			<td>Demuestran y adquieren identidad cultural y autonomía de gremio </td>
			<td>
				<b><?php echo $encuesta['radica5'] ?></b>
			</td>
		</tr>
	</table>

	<br><br>



	<b style="color: #0B2161">Cual eje del programa del doctorado es más importante</b><br>
	<table class="table hovered bordered border">

		<tr>
			<td>Innovación y mejora educativa</td>
			<td>
				<b><?php echo $encuesta['eje1'] ?></b>
			</td>
		</tr>

		<tr>
			<td>Métodos y enfoques de evaluación educativa</td>
			<td>
			<b><?php echo $encuesta['eje2'] ?></b>
			</td>
		</tr>

		<tr>
			<td>Tendencias y reformas educativas</td>
			<td>
				<b><?php echo $encuesta['eje3'] ?></b>
			</td>
		</tr>

		<tr>
			<td>Modelos de administración y gestión educativa</td>
			<td>
				<b><?php echo $encuesta['eje4'] ?></b>
			</td>
		</tr>
	</table>

	</div>
	<input type="button" class="button primary large shadow text-shadow" value="Imprimir" onclick="Imprimir()">

