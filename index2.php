<!DOCTYPE html>
<!-- saved from url=(0030)http://metroui.org/appbar.html -->
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
        <link href="css/jquery-ui.css" rel="stylesheet">
        <link href="css/jquery-ui-min.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/metro-responsive.css" rel="stylesheet">
        <link href="css/metro-schemes.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/docs.js"></script>
        <script src="js/ga.js"></script>
        <script>
            function showDialog(id) {
                dialog.open();
            }
            $(function () {
                $("#sidebar-2").hover(function () {
                    $("#sidebar-2").toggleClass('compact');
                });
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
                <a href="index.html" class="app-bar-element branding"><img src="img/logo.png" style="height: 50px;width: 140px; display: inline-block; margin-right: 10px;margin-top: 0px"></a>
                <a class="app-bar-element" href="#">Inicio</a>
                <ul class="app-bar-menu small-dropdown" style="">
                    <li data-flexorderorigin="1" data-flexorder="2">
                        <a href="#" class="dropdown-toggle">Aspirantes</a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">

                            <li>
                                <a href="javascript:showDialog('#registro')" class="">Registrar aspirante</a>
                            </li>
                            <li>
                                <a href="http://metroui.org/appbar.html#" class="">Consulta de aspirantes</a>

                            </li>

                        </ul>
                    </li>

                    <li data-flexorderorigin="2" data-flexorder="3">
                        <a href="#" class="dropdown-toggle">Accesos</a>
                        <ul class="d-menu" data-role="dropdown" data-no-close="true">
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
                    <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Iniciar sesi�n</a>
                    <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true" style="display: none;">
                        <div class="padding20">
                            <form>
                                <h4 class="text-light">Ingreso al sistema</h4>
                                <div class="input-control modern text iconic">
                                    <input type="text">
                                    <span class="label">Usuario</span>
                                    <span class="informer">Teclea tu usuario</span>
                                    <span class="placeholder">Usuario</span>
                                    <span class="icon mif-user"></span>
                                </div>

                                <div class="input-control modern password iconic" data-role="input">
                                    <input type="password">
                                    <span class="label">Contrase�a</span>
                                    <span class="informer">Teclea tu contrase�a</span>
                                    <span class="placeholder">Contrase�a</span>
                                    <span class="icon mif-lock"></span>
                                    <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                                </div>
                                <br><br>



                                <div class="form-actions">
                                    <button class="button">Acceder</button>
                                    <button class="button link">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <span class="app-bar-pull"></span>
            </div>
        </header>

        <div class="container page-content">

            <br><br><br><br><br><br><br>
            <div class="presenter" data-role="presenter" data-height="300" data-easing="swing" data-duration="200" data-timeout="200" data-scene-timeout="3000">
                <div class="scene">
                    <div class="act bg-darkEmerald fg-white">
                        <img src="img/Administrator.png" class="actor" data-position="40,10" style="height: 200px;width: 170px;margin-left: 30px">
                        <h1 class="actor" data-position="50,300" data-effect="random">Captura de calificaciones</h1>
                        <p class="actor" data-position="100,300" data-effect="random">Del 25 de diciembre al 29 de diciembre de 2016</p>
                        <a class="actor button primary " data-effect="random" data-position="180,300"  href="http://bizspark.com">Descargar formato de entrega</a>
                    </div>
                    <div class="act bg-darkMagenta fg-white">
                        <img src="img/Caution.png" class="actor" data-position="40,10" style="height: 200px;width: 170px;margin-left: 30px">
                        <h1 class="actor" data-position="50,300" >Suspenci�n de clases</h1>
                        <p class="actor" data-position="100,300" >El grupo SD35 no tendr� clase el d�a 25 de marzo.</p>
                        <a class="actor button success" data-position="180,300" href="http://www.jetbrains.com/phpstorm/">Abrir m�s informaci�n</a>

                    </div>
                    <div class="act bg-darkBlue fg-white">
                        <img src="img/Contact.png" class="actor" data-position="40,10" style="height: 200px;width: 170px;margin-left: 30px">
                        <h1 class="actor" data-position="50,300" >Entrega de papeler�a</h1>
                        <p class="actor" data-position="100,300" >El �ltimo d�a para entregar papeler�a para los alumnos de nuevo ingreso es el 35 de marzo de 2016.</p>
                        <a class="actor button success" data-position="180,300" href="http://www.jetbrains.com/phpstorm/">Descargar lista</a>
                    </div>
                </div>
            </div>



            <br>
            <br><br>
            <div data-role="dialog" id="registro" class="padding20 dialog" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true" style="width: auto; height: auto; visibility: visible; left: 555.5px; top: 38px;">
                <h1>Registro de aspirantes</h1>
                <p>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="input-control text success">
                        <div class="input-control modern password iconic" data-role="input">
                                    <input type="text">
                                    <span class="label">Nombre</span>
                                    <span class="informer">Teclea tu nombre</span>
                                    <span class="placeholder">Nombre(s)</span>
                                    <span class="icon mif-user"></span>

                                </div>
                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                </p>
                <span class="dialog-close-button"></span></div>

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
