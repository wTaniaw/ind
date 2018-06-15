<?php
 require_once("funciones.php");
?>
<!DOCTYPE html>
<!-- saved from url=(0030)http://metroui.org/appbar.html -->
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">

        <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico">
        <title>IINEED Encuesta de factibilidad</title>
        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/metro-responsive.css" rel="stylesheet">
        <link href="css/metro-schemes.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/docs.js"></script>
        <script src="js/ga.js"></script>
        <style type="text/css">
        	html{padding-left: 50px;padding-right: 50px;padding-top: 20px;background-color: #FFFFFF}
        </style>
        </head>

<center>
<h3><img src="img/logo3.png" width="300px" ></h3>

<p>
	Este cuestionario tiene como propósito indagar el interés de los egresados de las maestrías por cursar el DOCTORADO EN GESTIÓN Y EVALUCIÓN. <br>Para ello te agradecemos participes contestando las preguntas de la siguiente Encuesta
</p>
</center>
<br>
<form action="GuardarEncuesta.php" method="post" data-role="validator" data-show-required-state="false" data-hint-mode="line" data-hint-background="bg-red" data-hint-color="fg-white" data-hide-error="10000" novalidate="novalidate">
<div style="border-radius:30px;border:2px black solid;padding:20px">
<b style="color: #0B2161">Tipo de escuela donde estudió su maestría</b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="tipoescuela" value="Pública">
	    <span class="check"></span>
	    <span class="caption">Pública</span>
	</label>

	<label class="input-control radio small-check">
	    <input type="radio" name="tipoescuela" value="Privada">
	    <span class="check"></span>
	    <span class="caption">Privada</span>
	</label>

	<br><br>

	<b style="color: #0B2161">Nombre de la Maestría cursada:</b><br>
	<div class="input-control text" data-role="input" style="width:50%">
    	<input type="text" name="maestria" >
    	<button class="button helper-button clear"><span class="mif-cross"></span></button>
	</div>

	<br><br>

	<b style="color: #0B2161">¿Estás titulado?</b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="titulado" value="Si">
	    <span class="check"></span>
	    <span class="caption">Si</span>
	</label>

	<label class="input-control radio small-check">
	    <input type="radio" name="titulado" value="No">
	    <span class="check"></span>
	    <span class="caption">No</span>
	</label>

	<br><br>

	<b style="color: #0B2161">Sexo</b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="sexo" value="Femenino">
	    <span class="check"></span>
	    <span class="caption">Femenino</span>
	</label>

	<label class="input-control radio small-check">
	    <input type="radio" name="sexo" value="Masculino">
	    <span class="check"></span>
	    <span class="caption">Masculino</span>
	</label>

	<br><br>

	<b style="color: #0B2161">Edad</b><br>
	<div class="input-control text" data-role="input">
       <input type="text" name="edad" data-validate-func="number" placeholder="" data-validate-arg="" data-validate-hint="La edad debe ser un valor numérico" style="padding-right: 5px;">
       <span class="input-state-error mif-warning" style="right: 8px;"></span>
       <span class="input-state-success mif-checkmark" style="right: 8px;"></span>
       </div> años

       <br><br>

	<b style="color: #0B2161">¿Desearías seguir estudiando después de terminar la Maestría? </b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="seguir" value="Si">
	    <span class="check"></span>
	    <span class="caption">Si</span>
	</label>

	<label class="input-control radio small-check">
	    <input type="radio" name="seguir" value="No">
	    <span class="check"></span>
	    <span class="caption">No</span>
	</label>

	<br><br>

	<b style="color: #0B2161">En qué tipo de institución te gustaría estudiar: </b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="tipoescuelafuturo" value="Pública">
	    <span class="check"></span>
	    <span class="caption">Pública</span>
	</label>

	<label class="input-control radio small-check">
	    <input type="radio" name="tipoescuelafuturo" value="Privada">
	    <span class="check"></span>
	    <span class="caption">Privada</span>
	</label>

	<br><br>

	<b style="color: #0B2161">¿Qué doctorado te gustaría estudiar?</b><br>
	<label class="input-control radio small-check">
	    <input type="radio" name="doctorado" value="Doctorado en gestión y evaluación educativa">
	    <span class="check"></span>
	    <span class="caption">Doctorado en gestión y evaluación educativa</span>
	</label>
	<br>
	<label class="input-control radio small-check">
	    <input type="radio" name="doctorado" value="Otro">
	    <span class="check"></span>
	    <span class="caption">Otro</span>
	</label>
	<div class="input-control text">
		<input type="text" name="otrodoctorado">
	</div>
	<br><br>
	<b style="color: #0B2161">¿Por qué?</b><br>
	<div class="input-control textarea">
    	<textarea name="porque" cols="100"></textarea>
	</div>
	<br><br>
	<b style="color: #0B2161">¿Por qué motivo te gustaría estudiar el doctorado</b><br>
	<table class="table hovered bordered border">
		<tr>
			<th></th>
			<th>Si</th>
			<th>No</th>
		</tr>
		<tr>
			<td>Para favorecer mi  desarrollo personal</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo1" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo1" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para favorecer mi desarrollo profesional</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo2" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo2" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para aprender a elaborar planes de mejora educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo3" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo3" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>

		<tr>
			<td>Para conocer modelos de evaluación de instituciones educativas</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo4" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo4" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para conocer y fortalecer mis competencias directivas</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo5" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo5" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para aprender a promover el cambio educativo en el plantel</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo6" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo6" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para aprender a manejar y resolver conflictos</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo7" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo7" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para dar seguimiento y evaluar los planes educativos</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo8" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo8" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para saber cómo convertir a mi escuela en una organización que aprende</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo9" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo9" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para identificar las características de los modelos de administración educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo10" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo10" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para saber cuáles son las tendencias internacionales de evaluación educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo11" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo11" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para identificar las diferencias entre la gestión estratégica y la administración tradicional</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo12" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo12" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para identificar las características de los distintos tipos de liderazgos en las escuelas</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo13" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo13" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para utilizar distintos enfoques y estrategias de evaluación en el aula</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo14" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo14" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para aprender a elaborar proyectos de evaluación educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo15" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo15" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para conocer y utilizar los métodos de evaluación de programas</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo16" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo16" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
		<tr>
			<td>Para mejorar la convivencia y la inclusión en el centro escolar</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo17" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="motivo17" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
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
				<div class="input-control select">
   				<select name="importantecursar1">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Se cuenta con más elementos para comprender los enfoques y metodología de los planes y programas de estudio</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar2">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Para participar en distintas funciones docentes (asesor técnico pedagógico, tutor, capacitar, dar conferencias)</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar3">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Para contar con las competencias que demanda la Reforma Educativa</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar4">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Para contribuir a la mejora de la educación en este país</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar5">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Para aprender a generar evidencias de la mejora (informes, planes de mejora, planes de intervención,etc)</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar6">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Para responder con eficacia a las evaluaciones del servicio profesional docente</td>
			<td>
				<div class="input-control select">
   				<select name="importantecursar7">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
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
				<div class="input-control select">
   				<select name="radica1">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Los docentes son  el factor principal de la educación en todo el mundo</td>
			<td>
				<div class="input-control select">
   				<select name="radica2">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Los profesores lideran el cambio en el sector educativo</td>
			<td>
				<div class="input-control select">
   				<select name="radica3">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Los docentes adquieren una conciencia crítica del sistema educativo y de las políticas educativas</td>
			<td>
				<div class="input-control select">
   				<select name="radica4">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>Demuestran y adquieren identidad cultural y autonomía de gremio </td>
			<td>
				<div class="input-control select">
   				<select name="radica5">
        			<option>5</option>
        			<option>4</option>
        			<option>3</option>
        			<option>2</option>
        			<option>1</option>
    				</select>
				</div>
			</td>
		</tr>
	</table>

	<br><br>



	<b style="color: #0B2161">Cual eje del programa del doctorado es más importante</b><br>
	<table class="table hovered bordered border">
		<tr>
			<th></th>
			<th>Si</th>
			<th>No</th>
		</tr>
		<tr>
			<td>Innovación y mejora educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje1" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje1" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>

		<tr>
			<td>Métodos y enfoques de evaluación educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje2" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje2" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>

		<tr>
			<td>Tendencias y reformas educativas</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje3" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje3" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>

		<tr>
			<td>Modelos de administración y gestión educativa</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje4" value="Si">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
			<td>
				<label class="input-control radio small-check">
	    			<input type="radio" name="eje4" value="No">
	    			<span class="check"></span>
	    			<span class="caption"></span>
				</label>
			</td>
		</tr>
	</table>

	<center><br><input type="submit" class="button large primary" value="Enviar encuesta"></center>
	</div>
</form>
<br><br><br>

</html>

