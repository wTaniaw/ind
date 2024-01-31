<?php
include "header.php";
?>
<br>
<script>
    $(document).ready(function() {
        $("#contacto").removeClass("grey-text");
        $("#contacto").addClass("blue-text text-darken-4");
    });
</script>
<?php
if (isset($_GET["status"])) {
?>
    <div class="blue darken-4 white-text center-align p-4">Tu mensaje se ha enviado correctamente, nos pondremos en contacto contigo a la brevedad</div>
<?php
}
?> <div class="divsection">
    <div class="row section">
        <div class="col m6 s12  left-align">
            <form action="enviarcorreo.php" method="get" id="formcontacto">
                <input type="text" name="asunto" placeholder="Asunto" required="">
                <input type="text" name="nombre" placeholder="Nombre" required="">
                <input type="email" name="correo" placeholder="Correo" required="">
                <textarea name="mensaje" placeholder="Mensaje..." required="" style="border-radius:10px;height:8em"></textarea>
                <div class="amber darken-4 white-text center-align col m12 s12 z-depth-5 waves-effect waves-light modal-trigger" onclick="$('#formcontacto').submit()" style="padding:10px;border-radius:10px">
                    <h6>Enviar</h6>
                </div>
        </div>
        <div class="col m6 s12">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.196857205904!2d-106.08365829947508!3d28.623861552791016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea5cb6c1dacf69%3A0x269dabb81eb0963b!2sC.%20Ernesto%20Talavera%201208%2C%20Zarco%2C%2031020%20Chihuahua%2C%20Chih.!5e0!3m2!1ses!2smx!4v1675374151153!5m2!1ses!2smx" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="divsection">
    <div class="row section blue darken-4 blue-text text-lighten-5" style="padding:50px">
        <div class="col m2 offset-m1 s12 center-align">
            <small>
                <img src="img/facebook.png"><br>
                iineed posgrados
            </small>
        </div>
        <div class="col m2 s12 center-align">
            <small>
                <img src="img/facebook.png"><br>
                iineed iineed
            </small>
        </div>
        <div class="col m2  s12 center-align">
            <small>
                <img src="img/facebook.png"><br>
                Calle Ernesto Talavera 1208<br>
                Colonia Zarco, Chihuahua, Chih.
            </small>
        </div>
        <div class="col m2  s12 center-align">
            <small>
                <img src="img/facebook.png"><br>
                informacion@iineed.edu.mx
            </small>
        </div>
        <div class="col m2  s12 center-align">
            <small>
                <img src="img/facebook.png"><br>
                (614) 1205355
            </small>
        </div>
    </div>
</div>
<div class="divsection">
    <div class="row section " style="padding:50px">
        <div class="col m12  s12 center-align">
            <h3><b>Testimonios</b></h3>
            <p>Yo egresé de la maestría en Docencia; área competencias profesionales. Aprendí a seleccionar y utilizar nuevas técnicas didáctivas para favorecer el desarrollo de competencias. Conocí distintos modelos de aprendizaje centrados en el alumno como el aprendizaje por proyectos, por problemas y por casos. Me preparé para los examenes de ingreso y permanencia en el servicio profesional docente.</p>
            <br>
            <b class="blue-text">Docencia. Área competencias profesionales</b>
        </div>
    </div>
</div>

<div class="divsection">
    <div class="row section blue lighten-5 black-text" style="padding:50px">
        <div class="col m12  s12 center-align" style="padding:50px">
            <h5><b class="blue-text text-darken-4">IINEED Es una institución educativa con CCT 08DPSU5050 que desde 2008 imparte programas de posgrado, acreditados por la Secretaría de Educación y Deporte y por la Dirección General de Profesores de la SEP. Además, está acreditada como organismo Evaluador(OAE) por el Consejo para la Evaluación de la Educación Tipo Medio Superior (COPEEMS)</b></h5>

        </div>
    </div>
</div>
<?php
include "footer.php";
?>