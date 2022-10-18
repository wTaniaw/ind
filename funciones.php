<?php
//error_reporting(E_ERROR | E_PARSE);
//error_reporting(-1); //Muestra todos los errores
error_reporting(1); //No muestra ningún error

function conectar()
{
	$res = mysql_connect("localhost:3307", "root", "");
	//$res = mysql_connect("localhost", "iineedsistema", "Sistema1");
	//$res=mysql_connect("localhost","root","root");
	mysql_select_db('iineed');
	mysql_query("SET NAMES 'utf8'");
	return $res;
}
function ObtenerAdministrativo($id)
{
	$link = conectar();
	$rs = mysql_query("SELECT concat(Nombre,' ',ApellidoP,' ',ApellidoM) as Nombre from Administrativos where Usuario_id=$id");
	$resultado = mysql_fetch_array($rs);
	$nombre = $resultado["Nombre"];
	mysql_close($link);
	return $nombre;
}
function ObtenerDocente($id)
{
	$link = conectar();
	$rs = mysql_query("SELECT concat(Nombre,' ',ApellidoP,' ',ApellidoM) as Nombre from Docentes where Usuario_id=$id");
	$resultado = mysql_fetch_array($rs);
	$nombre = $resultado["Nombre"];
	mysql_close($link);
	return $nombre;
}
function ObtenerAlumno($id)
{
	$link = conectar();
	$rs = mysql_query("SELECT concat(Nombre,' ',ApellidoP,' ',ApellidoM) as Nombre from Aspirantes a join Alumnos al on al.Aspirante_id=a.id  where al.Usuario_id=$id");
	$resultado = mysql_fetch_array($rs);
	$nombre = $resultado["Nombre"];
	mysql_close($link);
	return $nombre;
}
function Ejecutar($consulta)
{
	$link = conectar();
	$rs = mysql_query($consulta, $link) or die("Error en: $consulta: " . mysql_error());
	mysql_close($link);
	return $rs;
}
function ObtenerEstatus($alumno_id)
{
	/*Es necesario que en la consulta se redefina el valor consultado al nombre valor*/
	$link = conectar();
	$rs = mysql_query("Select Estatus.Nombre from Estatus join Alumnos on Estatus.id=Alumnos.Estatus_id where Alumnos.id=$alumno_id", $link) or die("Error en: $consulta: " . mysql_error());
	$resultado = mysql_fetch_array($rs);
	$nombre = $resultado["Nombre"];
	mysql_close($link);
	return $nombre;
}
function Insertar($consulta)
{
	$link = conectar();
	$rs = mysql_query($consulta, $link) or die("Error en: $consulta: " . mysql_error());
	$id = mysql_insert_id();
	mysql_close($link);
	return $id;
}

function cerrar()
{
	mysql_close();
}

function ConsultarLista($quer)
{
	$link = conectar();
	$rs = mysql_query($quer, $link) or die("Error en: $quer: " . mysql_error());
	mysql_close($link);
	return $rs;
}
function ConsultarRegistro($consulta)
{
	$link = conectar();
	$rs = mysql_query($consulta, $link) or die("Error en: $consulta: " . mysql_error());
	$resultado = mysql_fetch_array($rs);
	mysql_close($link);
	return $resultado;
}
function ObtenerDirector($uni)
{
	$parametro = ConsultarRegistro("Select * from Parametros where id=1");
	if ($uni == 1) {
		return $parametro["DirectorChihuahua"];
	} else if ($uni == 2) {
		return $parametro["DirectorJuarez"];
	}
}
function ObtenerJefe($num)
{
	$parametro = ConsultarRegistro("Select * from Parametros where id=1");
	if ($num == 1) {
		return $parametro["NombreJefe"];
	} else if ($num == 2) {
		return $parametro["PuestoJefe"];
	}
}
function ObtenerUsuario()
{
	return $_SESSION["usuario_id"];
}

function ConsultarValor($consulta)
{
	/*Es necesario que en la consulta se redefina el valor consultado al nombre valor*/
	$link = conectar();
	$rs = mysql_query($consulta, $link) or die("Error en: $consulta: " . mysql_error());
	$resultado = mysql_fetch_array($rs);
	$nombre = $resultado["valor"];
	mysql_close($link);
	return $nombre;
}
function GradoLetra($grado)
{
	switch ($grado) {
		case 1:
			return "primer";
		case 2:
			return "segundo";
		case 3:
			return "tercer";
		case 4:
			return "cuarto";
		case 5:
			return "quinto";
	}
}
function ooa($usuario_id)
{
	$valor = ConsultarValor("Select Genero as valor from Aspirantes asp join Alumnos a on asp.id=a.Aspirante_id join Usuarios u on u.id=a.Usuario_id where usuario_id=$usuario_id");
	if ($valor == "Femenino")
		return "a";
	else
		return "o";
}
function mesletra($mes)
{
	switch ($mes) {
		case 1:
			return "Enero";
		case 2:
			return "Febrero";
		case 3:
			return "Marzo";
		case 4:
			return "Abril";
		case 5:
			return "Mayo";
		case 6:
			return "Junio";
		case 7:
			return "Julio";
		case 8:
			return "Agosto";
		case 9:
			return "Septiembre";
		case 10:
			return "Octubre";
		case 11:
			return "Noviembre";
		case 12:
			return "Diciembre";
	}
}
function NombreTetramestre($grado)
{
	switch ($grado) {
		case 1:
			return "PRIMER";
		case 2:
			return "SEGUNDO";
		case 3:
			return "TERCER";
		case 4:
			return "CUARTO";
	}
}
function PeriodoActivo()
{
	$periodo = ConsultarRegistro("Select * from Periodos where Activo=1 limit 1");
	return $periodo;
}
function PeriodoMateria($alumno_id, $materia_id)
{
	$historial = ConsultarRegistro("select p.Nombre from Historialmateria h join Historialalumnos ha on ha.id=h.Historialalumnos_id  join Periodos p on p.id=ha.Periodo_id  where h.Materia_id=$materia_id and h.Alumno_id=$alumno_id and h.Activo=1");
	$periodo = $historial["Nombre"];
	$nuevoperiodo = ucfirst(strtolower(substr($periodo, 0, 3))) . '-' . ucfirst(strtolower(substr($periodo, 4, 3))) . ' ' . substr($periodo, 8, 4);
	return $nuevoperiodo;
}
function PromedioMateria($alumno_id, $materia_id)
{
	$historial = ConsultarValor("select h.id as valor from Historialmateria h join Historialalumnos ha on ha.id=h.Historialalumnos_id where h.Materia_id=$materia_id and h.Alumno_id=$alumno_id and h.Activo=1");
	if ($historial) {
		return ConsultarValor("Select Calificacion as valor from Calificaciones where Historialmateria_id=$historial order by id desc");
	}
}
function numtoletras($xcifra)
{
	$xarray = array(
		0 => "Cero",
		1 => "un", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve",
		"DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
		"Veinti", 30 => "Treinta", 40 => "Cuarenta", 50 => "Cincuenta", 60 => "Sesenta", 70 => "Setenta", 80 => "Ochenta", 90 => "Noventa",
		100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
	);
	//
	$xcifra = trim($xcifra);
	$xlength = strlen($xcifra);
	$xpos_punto = strpos($xcifra, ".");
	$xaux_int = $xcifra;
	$xdecimales = "00";
	if (!($xpos_punto === false)) {
		if ($xpos_punto == 0) {
			$xcifra = "0" . $xcifra;
			$xpos_punto = strpos($xcifra, ".");
		}
		$xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
		$xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
	}

	$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
	$xcadena = "";
	for ($xz = 0; $xz < 3; $xz++) {
		$xaux = substr($XAUX, $xz * 6, 6);
		$xi = 0;
		$xlimite = 6; // inicializo el contador de centenas xi y establezco el l�mite a 6 d�gitos en la parte entera
		$xexit = true; // bandera para controlar el ciclo del While
		while ($xexit) {
			if ($xi == $xlimite) // si ya lleg� al l�mite m�ximo de enteros
			{
				break; // termina el ciclo
			}

			$x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
			$xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres d�gitos)
			for ($xy = 1; $xy < 4; $xy++) // ciclo para revisar centenas, decenas y unidades, en ese orden
			{
				switch ($xy) {
					case 1: // checa las centenas
						if (substr($xaux, 0, 3) < 100) // si el grupo de tres d�gitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
						{
						} else {
							$xseek = $xarray[substr($xaux, 0, 3)]; // busco si la centena es n�mero redondo (100, 200, 300, 400, etc..)
							if ($xseek) {
								$xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Mill�n, Millones, Mil o nada)
								if (substr($xaux, 0, 3) == 100)
									$xcadena = " " . $xcadena . " Cien " . $xsub;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
								$xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
							} else // entra aqu� si la centena no fue numero redondo (101, 253, 120, 980, etc.)
							{
								$xseek = $xarray[substr($xaux, 0, 1) * 100]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
								$xcadena = " " . $xcadena . " " . $xseek;
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 0, 3) < 100)
						break;
					case 2: // checa las decenas (con la misma l�gica que las centenas)
						if (substr($xaux, 1, 2) < 10) {
						} else {
							$xseek = $xarray[substr($xaux, 1, 2)];
							if ($xseek) {
								$xsub = subfijo($xaux);
								if (substr($xaux, 1, 2) == 20)
									$xcadena = " " . $xcadena . " VEINTE " . $xsub;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
								$xy = 3;
							} else {
								$xseek = $xarray[substr($xaux, 1, 1) * 10];
								if (substr($xaux, 1, 1) * 10 == 20)
									$xcadena = " " . $xcadena . " " . $xseek;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " y ";
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 1, 2) < 10)
						break;
					case 3: // checa las unidades
						if (substr($xaux, 2, 1) < 1) // si la unidad es cero, ya no hace nada
						{
						} else {
							$xseek = $xarray[substr($xaux, 2, 1)]; // obtengo directamente el valor de la unidad (del uno al nueve)
							$xsub = subfijo($xaux);
							$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
						} // ENDIF (substr($xaux, 2, 1) < 1)
						break;
				} // END SWITCH
			} // END FOR
			$xi = $xi + 3;
		} // ENDDO



		// ------------------      en este caso, para M�xico se usa esta leyenda     ----------------
		$xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
		$xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
		$xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
	} // ENDFOR	($xz)
	return trim($xcadena);
} // END FUNCTION
function subfijo($xx)
{ // esta funci�n regresa un subfijo para la cifra
	$xx = trim($xx);
	$xstrlen = strlen($xx);
	if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
		$xsub = "";
	//
	if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
		$xsub = "MIL";
	//
	return $xsub;
} // END FUNCTION

function truncar($number, $digitos)
{
	$raiz = 10;
	$multiplicador = pow($raiz, $digitos);
	$resultado = ((int) ($number * $multiplicador)) / $multiplicador;
	return number_format($resultado, $digitos);
}
