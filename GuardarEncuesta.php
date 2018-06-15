<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">

        <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico">
        <title>IINEED Escuesta de factibilidad</title>
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
$tipoescuela=$_REQUEST["tipoescuela"];
$maestria=$_REQUEST["maestria"];
$titulado=$_REQUEST["titulado"];
$sexo=$_REQUEST["sexo"];
$edad=$_REQUEST["edad"];
$seguir=$_REQUEST["seguir"];
$tipoescuelafuturo=$_REQUEST["tipoescuelafuturo"];
$doctorado=$_REQUEST["doctorado"];
if($doctorado=='Otro' || $_REQUEST["otrodoctorado"]!='')
{
$doctorado=$_REQUEST["otrodoctorado"];
}
$porque=$_REQUEST["porque"];
$motivo1=$_REQUEST["motivo1"];
$motivo2=$_REQUEST["motivo2"];
$motivo3=$_REQUEST["motivo3"];
$motivo4=$_REQUEST["motivo4"];
$motivo5=$_REQUEST["motivo5"];
$motivo6=$_REQUEST["motivo6"];
$motivo7=$_REQUEST["motivo7"];
$motivo8=$_REQUEST["motivo8"];
$motivo9=$_REQUEST["motivo9"];
$motivo10=$_REQUEST["motivo10"];
$motivo11=$_REQUEST["motivo11"];
$motivo12=$_REQUEST["motivo12"];
$motivo13=$_REQUEST["motivo13"];
$motivo14=$_REQUEST["motivo14"];
$motivo15=$_REQUEST["motivo15"];
$motivo16=$_REQUEST["motivo16"];
$motivo17=$_REQUEST["motivo17"];
$importantecursar1=$_REQUEST["importantecursar1"];
$importantecursar2=$_REQUEST["importantecursar2"];
$importantecursar3=$_REQUEST["importantecursar3"];
$importantecursar4=$_REQUEST["importantecursar4"];
$importantecursar5=$_REQUEST["importantecursar5"];
$importantecursar6=$_REQUEST["importantecursar6"];
$importantecursar7=$_REQUEST["importantecursar7"];
$radica1=$_REQUEST["radica1"];
$radica2=$_REQUEST["radica2"];
$radica3=$_REQUEST["radica3"];
$radica4=$_REQUEST["radica4"];
$radica5=$_REQUEST["radica5"];
$eje1=$_REQUEST["eje1"];
$eje2=$_REQUEST["eje2"];
$eje3=$_REQUEST["eje3"];
$eje4=$_REQUEST["eje4"];
conectar();
$resultado=mysql_query("insert into Encuesta values(0,'$tipoescuela','$maestria','$titulado','$sexo','$edad','$seguir','$tipoescuelafuturo',
	'$doctorado',
	'$porque',
	'$motivo1',
	'$motivo2',
	'$motivo3',
	'$motivo4',
	'$motivo5',
	'$motivo6',
	'$motivo7',
	'$motivo8',
	'$motivo9',
	'$motivo10',
	'$motivo11',
	'$motivo12',
	'$motivo13',
	'$motivo14',
	'$motivo15',
	'$motivo16',
	'$motivo17',
	'$importantecursar1',
	'$importantecursar2',
	'$importantecursar3',
	'$importantecursar4',
	'$importantecursar5',
	'$importantecursar6',
	'$importantecursar7',
	'$radica1',
	'$radica2',
	'$radica3',
	'$radica4',
	'$radica5',
	'$eje1',
	'$eje2',
	'$eje3',
	'$eje4',
	now())");

if($resultado)
{
?>
  	<div style="border-radius:30px;border:2px black solid;padding:20px">
  	<center>
	<h3><img src="img/logo3.png" width="300px" ></h3><br>
	<h1><span style="color:green" class="mif-checkmark"></span> Gracias por tu tiempo!</h1>
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