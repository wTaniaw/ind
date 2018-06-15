<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">

        <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico">
        <title>IINEED Escuesta de evaluación del desempeño docente.</title>
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
<?php
require_once("funciones.php");
$historial_id=$_REQUEST["historial_id"];
$alumno_id=$_REQUEST["alumno_id"];
$p1=$_REQUEST["1"];
$p2=$_REQUEST["2"];
$p3=$_REQUEST["3"];
$p4=$_REQUEST["4"];
$p5=$_REQUEST["5"];
$p6=$_REQUEST["6"];
$p7=$_REQUEST["7"];
$p8=$_REQUEST["8"];
$p9=$_REQUEST["9"];
$p10=$_REQUEST["10"];
$p11=$_REQUEST["11"];
$p12=$_REQUEST["12"];
$p13=$_REQUEST["13"];
$p14=$_REQUEST["14"];
$p15=$_REQUEST["15"];
$p16=$_REQUEST["16"];
$p17=$_REQUEST["17"];
$p18=$_REQUEST["18"];
$p19=$_REQUEST["19"];
$p20=$_REQUEST["20"];
$p21=$_REQUEST["21"];
$p22=$_REQUEST["22"];
$p23=$_REQUEST["23"];
$p24=$_REQUEST["24"];
$p25=$_REQUEST["25"];

conectar();
$resultado=mysql_query("insert into EncuestaProfesor values(0,
	$p1,
	$p2,
	$p3,
	$p4,
	$p5,
	$p6,
	$p7,
	$p8,
	$p9,
	$p10,
	$p11,
	$p12,
	$p13,
	$p14,
	$p15,
	$p16,
	$p17,
	$p18,
	$p19,
	$p20,
	$p21,
	$p22,
	$p23,
	$p24,
	'$p25',
	$alumno_id,
	$historial_id,
	now())");
if($resultado)
{
?>
  	<div style="border-radius:30px;border:2px black solid;padding:20px">
  	<center>
	<h3><img src="img/logo3.png" width="300px" ></h3><br>
	<h1><span style="color:green" class="mif-checkmark"></span> Gracias por tu tiempo! <br></h1>
	<h3><a href="Alumno.php"><span class="mif-arrow-left mif-ani-horizontal mif-ani-fast"></span> Regresar al sistema</a></h3>
	</center>
  	</div>
<?php
}else
{
	?>
  	<div style="border-radius:30px;border:2px black solid;padding:20px">
  	<center>
	<h2><img src="img/logo3.png" width="300px" ></h2><br>
	<h1><span style="color:red" class="mif-cancel"></span> Nuestros servidores están saturados inténtalo de nuevo más tarde.</h1>
	</center>
  	</div>
  <?php
}
cerrar();
?>
</html>