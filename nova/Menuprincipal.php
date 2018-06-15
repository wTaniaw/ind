    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>IINEED | Instituto Interdiciplinario de Estudios Educativos y Organizacionales</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
<script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- Required javascript files for Slider -->
<script src="js/jquery.ba-cond.min.js"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">

</head>
    <header class="navbar navbar-fixed-top">

        <div class="navbar-inner" >
            <div class="container" >
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" >
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="pull-left" href="index.php"><img src="/images/logo.png" id="logo"></a>
                <div class="nav-collapse collapse pull-right" >
                    <ul class="nav">
                    <br>
                    <li><a href="index.php">Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posgrados <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="md.php">MD</a></li>
                                <li><a href="mpe.php">MPE</a></li>
                                <li><a href="mgpp.php">MGPP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Capacitación <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="diplomadocompetencia.php">Diplomado en competencia docente</a></li>
                                <li><a href="diplomadoinstituciones.php">Diplomado en instituciones educativas</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultoría <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="certificaciones.php">Certificaciones</a></li>
                            </ul>
                        </li>
                        <li><a href="contacto2.php">Contacto</a></li>
                        <li><a href="nosotros.php">Nosotros</a></li>
                        <?php
session_start();
ob_start();
if(isset($_SESSION["tipo"]))
{
    $tipo=$_SESSION["tipo"];
    if($tipo=="Escolares")
    {
        $usuario=$_SESSION["usuario"];
        ?>
            <li class="login">
             <a href="Escolares.php">| <i class="icon-lock"></i> <?php echo $usuario?></a>
            </li>
        <?php
    }
    else if($tipo=="Alumno")
    {
        $usuario=$_SESSION["usuario"];
        ?>
            <li class="login">
             <a href="Alumno.php">| <i class="icon-lock"></i> <?php echo $usuario?></a>
            </li>
        <?php
    }
    else if($tipo=="Docente")
    {
        $usuario=$_SESSION["usuario"];
        ?>
        <li class="login">
         <a href="Docente.php">| <i class="icon-lock"></i> <?php echo $usuario?></a>
        </li>
        <?php
    }
}
else
{
    ?>
            <li class="login">
            <a data-toggle="modal" href="#loginForm">| <i class="icon-lock"></i> Acceso</a>
            </li>
<?php
}
?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <br>
    </header>