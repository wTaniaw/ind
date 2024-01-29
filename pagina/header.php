<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css--> <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content center-align">
        <h4 class="amber-text text-darken-3">Información de Inscripciones</h4>
        <p style="font-size:1.2em">Envía un correo a <b class="blue-text text-darken-4">informacion@iineed.edu.mx</b> indicando cual es el posgrado o diplomado en el que tienes interés y tu información de contacto<br>
            <br>O puedes enviar un WhatsApp al número <b class="blue-text text-darken-4">614 12053 55</b>.<br><br><br>
            Nos comunicaremos contigo a la brevedad
        </p>
    </div>
</div>
    <nav>
        <div class="nav-wrapper white navbar-fixed z-depth-0">
            <a href="index.php" class="brand-logo black-text p-4 hide-on-med-and-up">
                <img src="img/logo.png" width="200px">
            </a>
            <a href="index.php" class="brand-logo black-text p-4 hide-on-small-only " style="margin-left:10%">
                <img src="img/logo.png" width="200px">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down p-4 " style="margin-right:10%">
                <li><a href="posgrados.php" class="grey-text" id="posgrados">Posgrados</a></li>
                <li><a href="diplomados.php" class="grey-text" id="diplomados">Diplomados</a></li>
                <li><a href="contacto.php" class="grey-text" id="contacto">Contacto</a></li>
                <li><a href="https://iineed.edu.mx/blog/" class="grey-text">Blog</a></li>
                <li>
                    <a href="https://iineed.edu.mx/aula/login/index.php" class="btn white-text blue darken-4">
                        Aula Virtual
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html" class="black-text">Posgrados</a></li>
        <li><a href="badges.html" class="black-text">Diplomados</a></li>
        <li><a href="collapsible.html" class="black-text">Contacto</a></li>
        <li><a href="mobile.html" class="black-text">Blog</a></li>
    </ul>