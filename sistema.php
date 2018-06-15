<?php

session_start();
ob_start();

if(isset($_SESSION["tipo"]))
{

    $tipo=$_SESSION["tipo"];
    if($tipo=="Escolares")
    {
        ?><script>location.href="Escolares.php"</script><?php
    }
    else if($tipo=="Alumno")
    {
        ?><script>location.href="Alumno.php"</script><?php
    }
    else if($tipo=="Docente")
    {
        ?><script>location.href="Docente.php"</script><?php

    }
}
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
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/func.js"></script>
        <script src="js/docs.js"></script>
        <script src="js/ga.js"></script>
        <script>


            $(function ()
            {
              $(document).bind('keydown',function(e){
                  if ( e.which == 27 ) {
                              CerrarVentana();
                };
              });
                <?php if(isset($_REQUEST["r"])){
                ?>
                $.Notify({
                caption: 'Error',
                content: 'Usuario y/o contraseña incorrectos',
                type: 'alert'
                });
                <?php
            }
                ?>

            });


        </script>
        <link rel="js/prettify.css">
        <style>
            .menun:hover
            {
                background-color: orangered;color: white;
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
                <a class="app-bar-element" href="#">Inicio</a>
                <ul class="app-bar-menu small-dropdown" style="">
                    <li data-flexorderorigin="1" data-flexorder="2">
                        <a href="#" class="dropdown-toggle">Aspirantes</a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="false">
                            <li>
                                <a href="javascript:Ventana('RegistroAspirante.php')" class="">Registrar aspirante</a>
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
                <a class="app-bar-element" href="#">Contacto</a>
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
                    <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Iniciar sesión</a>
                    <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true" style="display: none;" id="DropLogin">
                        <div class="padding20">
                            <form action="ValidarUsuario.php" method="post">
                                <h4 class="text-light">Ingreso al sistema</h4>
                                <div class="input-control modern text iconic">
                                    <input type="text" name="user">
                                    <span class="label">Usuario</span>
                                    <span class="informer">Teclea tu usuario</span>
                                    <span class="placeholder">Usuario</span>
                                    <span class="icon mif-user"></span>
                                </div><br>
                                <div class="input-control modern password iconic" data-role="input">
                                    <input type="password" name="pass">
                                    <span class="label">Contraseña</span>
                                    <span class="informer">Teclea tu contraseña</span>
                                    <span class="placeholder">Contraseña</span>
                                    <span class="icon mif-lock"></span>
                                    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                                </div>
                                <br><br>
                                <div class="form-actions">
                                    <center><button class="button success" type="submit">Acceder</button>
                                    <button class="button primary" type="button" onclick="alert('En construcción')">Recuperar</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <span class="app-bar-pull"></span>
            </div>
        </header>

        <div class="container page-content">
<div data-role="dialog" id="VentanaGeneral" class="padding20 dialog " data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 555.5px; top: 38px;"></div>
<div data-role="dialog" id="Loader" class="dialog success" data-close-button="false" data-overlay="false" data-width="150" data-height="150" style="height: auto;background-color:transparent;box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);" data-type="success"></div>
            <br><br><br><br><br><br><br><br><br>
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



            <br>
            <br><br>


        </div>
<br><br><br><br>
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
