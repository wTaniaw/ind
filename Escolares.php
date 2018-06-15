<?php
session_start();
ob_start();

if(!isset($_SESSION["usuario"]))
{
  header('Location: index.php');
}
$usuario=$_SESSION["usuario"];
$usuario_id=$_SESSION["usuario_id"];
$tipo=$_SESSION["tipo"];
$administrativo=$_SESSION["administrativo"];
if($tipo=="Escolares")
{

?>
<!DOCTYPE html>
<html><head lang="en"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
        <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">
        <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico">
        <title>IINEED Sistema Escolar</title>
        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/metro-responsive.css" rel="stylesheet">
        <link href="css/metro-schemes.css" rel="stylesheet">
        <link href="css/PrintArea.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/jquery.PrintArea.js"></script>

        <script src="js/func.js"></script>
        <script>
            $(function () {
              $(document).bind('keydown',function(e){
                  if ( e.which == 27 ) {
                              CerrarVentana();
                };
              });
                $("#sidebar-2").hover(function () {
                    $("#sidebar-2").toggleClass('compact');
                });
            });

        </script>
        <link rel="js/prettify.css">
        <style>
            .menun:hover
            {
                background-color: #00356A;
                color: white;
            }
            .menur:hover
            {
                background-color: orangered;color: white;
            }

        </style>

    </head>
    <body>
        <header class="app-bar fixed-top" data-role="appbar">
            <div class="container">
                <a href="index.php" class="app-bar-element branding"><img src="img/logo.png" style="height: 55px;width: 153px; display: inline-block; margin-right: 10px;margin-top: 0px"></a>
                <a class="app-bar-element" href="Escolares.php">Inicio</a>
                <ul class="app-bar-menu small-dropdown" style="">
                     <li data-flexorderorigin="1" data-flexorder="2">
                        <a href="#" class="dropdown-toggle">Aspirantes</a>
                            <ul class="d-menu" data-role="dropdown" data-no-close="false">
                            <li>
                                <a href="javascript:Ventana('RegistroAspirante.php')" class="">Registrar aspirante</a>
                            </li>
                            <li>
                                <a href="javascript:Abrir('ListaAspirantes.php')" class="">Consulta de aspirantes</a>
                            </li>
                        </ul>
                    </li>
                    <li data-flexorderorigin="2" data-flexorder="3">
                        <a href="#" class="dropdown-toggle">Accesos</a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="false">
                            <li><a href="https://moodle.org/?lang=es">Moodle</a></li>
                            <li><a href="https://www.edmodo.com/">Edmodo</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="app-bar-element" href="javascript:Ventana('Contacto.php')">Contacto</a>
                <a class="app-bar-element">
                    <span id="toggle-tiles-dropdown" class="mif-apps mif-2x"></span>
                    <div class="app-bar-drop-container"
                         data-role="dropdown"
                         data-toggle-element="#toggle-tiles-dropdown"
                         data-no-close="false" style="width: 324px;">
                        <div class="tile-container bg-white">
                            <div class="tile-small bg-cyan">
                                <div class="tile-content iconic">
                                    <span class="icon mif-onedrive"></span>
                                </div>
                            </div>
                            <div class="tile-small bg-yellow">
                                <div class="tile-content iconic">
                                    <span class="icon mif-google"></span>
                                </div>
                            </div>
                            <div class="tile-small bg-red">
                                <div class="tile-content iconic">
                                    <span class="icon mif-facebook"></span>
                                </div>
                            </div>
                            <div class="tile-small bg-green">
                                <div class="tile-content iconic">
                                    <span class="icon mif-twitter"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="app-bar-element place-right">
                    <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> <?php echo $usuario ?></a>
                    <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true" style="display: none;">
                        <div class="padding20" style="width:200px">
                                <center>
                                  <h4 class="text-light"><?php echo $tipo ?></h4>

                              </center>
                                <center><img src="fotos/<?php echo $usuario_id.'.jpg' ?>" width="120px" height="120px" onerror="this.src='/img/Administrator.png';">
<br><h5 class="text-light"><?php echo $administrativo ?></h5>
                                </center>
                                      <center><a class="button danger" href="cerrarsesion.php">Salir</a></center>
                        </div>
                    </div>
                </div>
                <span class="app-bar-pull"></span>
            </div>
        </header>
        <div class="container page-content">
            <br><br><br><br><br>
            <ul class="sidebar bg-dark compact left-side fixed-left" id="sidebar-2" style="opacity: 1; display: block; left: 0px;position:fixed;border:7px solid #1D1D1D;">
                <li><a href="javascript:Abrir('MiCuentaEscolares.php')" class="menun">
                        <span class="mif-user mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Mi perfil</span>
                        <span class="counter"></span>
                    </a></li>
                <li><a href="javascript:Abrir('Configuraciones.php')" class="menun">
                        <span class="mif-cog mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title" style="">Configuraciones</span>
                    </a>
                </li>

                <li><a href="javascript:Abrir('Reportes.php')" class="menun">
                        <span class="mif-file-text mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Reportes</span>
                    </a>
                </li>
                <li><a href="javascript:Abrir('BuscarAlumno.php')" class="menun">
                        <span class="mif-search mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Buscar alumno</span>
                    </a></li>
                <li><a href="javascript:Abrir('Estructura.php')" class="menun">
                        <span class="mif-tree mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Estructura</span>
                        <span class="counter"></span>
                    </a></li>
                <li><a href="javascript:Abrir('Profesores.php')" class="menun">
                        <span class="mif-clipboard mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Profesores</span>
                        <span class="counter"></span>
                    </a></li>
                <li><a href="javascript:Abrir('Administrativos.php')" class="menun">
                        <span class="mif-user-check mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Administrativos</span>
                        <span class="counter"></span>
                    </a></li>
                <li><a href="javascript:Abrir('Publicaciones.php')" class="menun">
                        <span class="mif-display mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Publicaciones</span>
                        <span class="counter"></span>
                    </a></li>
                    <li><a href="javascript:Abrir('ListaEncuestas.php')" class="menun">
                        <span class="mif-stack mif-ani-hover-shuttle icon mif-ani-fast"></span>
                        <span class="title">Encuestas</span>
                        <span class="counter"></span>
                    </a></li>

                            </ul>
<center><div id="ContenidoGeneral">

  <br><br>
<div class="presenter sombra" data-role="presenter" data-height="300" data-easing="swing" data-duration="200" data-timeout="200" data-scene-timeout="3000">
      <div class="scene">
<?php
require_once("funciones.php");
$listpublicaciones=ConsultarLista("Select * from Publicaciones where Activo=1");
  while($publi=mysql_fetch_array($listpublicaciones))
{
  ?>
          <div class="act <?php echo $publi['ColorFondo']; ?> fg-white">
              <img src="<?php echo $publi['Imagen']; ?>" class="actor" data-position="40,10" style="height: 200px;width: 170px;margin-left: 30px">
              <h1 class="actor" data-position="20,300" data-effect="random"><?php echo $publi['Titulo']; ?></h1>
              <p class="actor" data-position="120,300" data-effect="random"><?php echo $publi['Texto']; ?></p>
              <?php
              $ColorBoton=$publi["ColorBoton"];
              if($ColorBoton!="sinboton"){?>
              <a class="actor button primary " data-effect="random" data-position="190,300"  href="<?php echo $publi['Link']; ?>"><?php echo $publi['TextoBoton']; ?></a>
              <?php }?>
          </div>
          <?php
        }
        ?>
      </div>
  </div>

</div></center>
<div data-role="dialog" id="VentanaGeneral" class="padding20 dialog sombra" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 555.5px; top: 38px;">

</div>
<div data-role="dialog" id="Loader" class="dialog success" data-close-button="false" data-overlay="false" data-width="150" data-height="150" style="height: auto;background-color:transparent;box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);" data-type="success"></div>
<br><br>
</div>
            <br>
            <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>            <br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <footer style="background-color: #eef7ff" width="100%">
            <center>
                <div class="container">
                    <div class="padding20">
                        <div class="grid">
                            <div class="row cells12" width="100%">
                                Calle Priv. Lomita<br>
                                #1613<br>
                                Col. Mirador<br>
                                Chihuahua, Chih. Mex.<br>
                                <br>
                                <b style="color: #193868">Tel. 614 415 50 89<br>
                                    Cel. 614 291 89 85</b>
                            </div>
                        </div>
                    </div>
                    <div class="align-center padding20 text-small">
                        Copyright 2012-2015 <a href="#">iineed</a>
                    </div>
                </div>
            </center>
        </footer>
    </body></html>
<?php }else{
echo "<h1><center>No tienes acceso</center></h1>";
}?>
<script>
<?php
    if(isset($_REQUEST["pagina"]))
    {
        $pagina=$_REQUEST["pagina"];
        if($pagina=="expediente")
        {
            $alumno_id=$_REQUEST["alumno_id"];
            ?>
            Abrir("Expediente.php?alumno_id=<?php echo $alumno_id; ?>");
            <?php
        }
        else if($pagina=="cuenta")
        {
            ?>
            Abrir("MiCuentaEscolares.php");
            <?php
        }
        else if($pagina=="publicaciones")
        {
            ?>
            Abrir("Publicaciones.php");
            <?php
        }
    }
    ?>
</script>