<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Control de Joyas</title>
    <meta name="viewport" content="user-scalable=no,initial-scale = 1.0,maximum-scale = 1.0">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/topcoat-mobile-dark.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/brackets.css">
    <link rel='stylesheet' type='text/css' href='fonts/icomatic.css'>
<!-- Include the script for fallback support -->
    <script type='text/javascript' src='fonts/icomatic.js'></script>
    
    <!--[if lt IE 9]>

    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>
  <body class="dark">
    <div id="wrapper">
      <div class="max-width">
        <div id="sideNav">
          <nav class="site">
            <ul>
              <li><a href="#">Plata JGCA</a></li>
              <li class="selected"><a href="http://topcoat.io/topcoat"><img src="images/usuario.jpg"></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a><br><br><br></li>
            </ul>
          </nav>
          <div id="pageNav">
            <ul>
              <li><a href="javascript:Existencia()">Existencias</a></li>
              <li><a href="javascript:Vendidas()">Vendidas</a></li>
              <li><a href="#button">Pagadas</a></li>
              <li><a href="#button">Regresadas</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div id="site">
        <header id="main-header">
          <div class="max-width">
            <hgroup>
              <h1><a href="#">Plata JGCA</a></h1>
              <p>Control de movimientos</p>
            </hgroup>
            <a id="slide-menu-button" class="topcoat-icon-button--large--quiet"><span class="topcoat-icon--large topcoat-icon--menu-stack"></span></a>
          </div>
        </header>
        <div id="content" class="max-width">
        
          <div id="contenidodiv"></div><br><br><br><br><br><br><br><br><br>
        </div>
        <footer></footer>
      </div>
    </div>
    <script src="js/rainbow-custom.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<script type="text/javascript">
function Existencia()
{
  $("#contenidodiv").load("Existencia.php");
}
function Vendidas()
{
  $("#contenidodiv").load("Vendidas.php");
}
function Pagadas()
{
  $("#contenidodiv").load("Pagadas.php");
}
function Regresadas()
{
  $("#contenidodiv").load("Regresadas.php");
}
function AgregarJoya()
{
  $("#contenidodiv").load("AgregarJoya.php");
}
function Historial(id)
{
  $("#contenidodiv").load("Historial.php?id="+id);
}
$(document).ready(function(){
Existencia();
});
</script>