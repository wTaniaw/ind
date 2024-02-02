<?php
include "header.php";
?>
<br>
<script>
    $(document).ready(function() {
  
        $("#contacto").removeClass("grey-text");
        $("#contacto").addClass("blue-text text-darken-4");
        const slider = $('.slider');
        let slideIndex = 0;

        function showSlides() {
            slideIndex++;
            if (slideIndex >= slider.children().length) {
            slideIndex = 0;
            }

            const translateValue = -slideIndex * 100 + '%';
            slider.css('transform', 'translateX(' + translateValue + ')');
        }

        function nextSlide() {
            showSlides();
        }

        function prevSlide() {
            slideIndex--;
            if (slideIndex < 0) {
            slideIndex = slider.children().length - 1;
            }

            const translateValue = -slideIndex * 100 + '%';
            slider.css('transform', 'translateX(' + translateValue + ')');
        }

        $('.prev').on('click', prevSlide);
        $('.next').on('click', nextSlide);

        setInterval(showSlides, 5000); // Cambia de slide cada 3 segundos
    });
    
     

    
</script>
<style>
    /* Estilos personalizados */
    .slider-container {
      width: 100%;
      overflow: hidden;
      position: relative;
    }

    .slider {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      box-sizing: border-box;
      text-align: center;
      position: relative;
    }

    .slide img {
      max-height: 200px; /* Altura máxima de la imagen según tu preferencia */
      margin: 0 auto;
      display: block;
    }

    .slide .caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      background-color: white;
      color: #fff; /* Color del texto */
      padding: 10px;
    }
    .slider-nav {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
    }

    .slider-nav button {
      background: none;
      border: none;
      font-size: 20px;
      color: black;
      cursor: pointer;
    }
  </style>
<?php
if (isset($_GET["status"])) {
?>
    <div class="blue darken-4 white-text center-align p-4">Tu mensaje se ha enviado correctamente, nos pondremos en contacto contigo a la brevedad</div>
<?php
}
?> 
<div class="divsection">
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
            </form>
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
                
<div class="divsection" id="testimonios">
    <div class="row section " style="padding:50px">
        <div class="col m12  s12 center-align">
            <h3><b>Testimonios</b></h3>
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide center-align">
                            <img src="img/testimonio1.jpg" alt="Slide 1" class=" circle">
                            <div class="caption">
                                <p class="black-text">Estoy muy agradecida con esta institución, siempre me sentí acompañada en el proceso de aprendizaje, que quedo con los aprendizajes y experiencias adquiridas en este tiempo, me voy satisfecha y contenta, espero que esta institución siga creciendo para seguir formando profesionistas responsables y comprometidos con la sociedad.</p>
                                <h5><b class="amber-text text-darken-3">MPE. Cynthia Susana Torres Míreles</b></h5>
                                <span class="blue-text">Psicología Educativa</span>
                            </div>
                        </div>
                        <div class="slide center-align">
                            <img src="img/testimonio2.jpg" alt="Slide 1" class=" circle">
                            <div class="caption">
                                <p class="black-text">Muy agradecida y satisfecha con los aprendizajes que obtuve a lo largo de la maestría, me motiva a seguir preparándome y capacitándome en mi carrera. Agradecida con todo el personal docente del instituto por los aportes brindados de calidad.</p>
                                <h5><b class="amber-text text-darken-3">MPE. Laura Alejandra Nájera Moran</b></h5>
                                <span class="blue-text">Psicología Educativa</span>
                            </div>
                        </div>
                        <div class="slide center-align">
                            <img src="img/testimonio3.jpg" alt="Slide 1" class=" circle">
                            <div class="caption">
                                <p class="black-text">Me siento muy agradecida con la institución por ofrecer educación de calidad. Gracias por brindarnos la oportunidad de crecer académica y profesionalmente. Los llevo en mi corazón.</p>
                                <h5><b class="amber-text text-darken-3">MPE. Anamim Chávez O.</b></h5>
                                <span class="blue-text">Psicología Educativa</span>
                            </div>
                        </div>
                        <div class="slide center-align">
                            <img src="img/testimonio4.jpg" alt="Slide 1" class=" circle">
                            <div class="caption">
                                <p class="black-text">Gracias por su apoyo y consideración por la experiencia y enseñanzas en la formación personal y profesional, agradezco el seguimiento para cumplir con el objetivo de este grupo de maestros. Gracias IINEED</p>
                                <h5><b class="amber-text text-darken-3">MD. Paul Loya</b></h5>
                                <span class="blue-text">Docencia: Área Competencias Profesionales</span>
                            </div>
                        </div>
                        <div class="slide center-align">
                            <img src="img/testimonio5.jpg" alt="Slide 1" class=" circle">
                            <div class="caption">
                                <p class="black-text">Agradezco a IINEED Chihuahua por su ardua labor en pro de la Educación llevando esta linda encomienda de capacitar a la docencia en herramientas que brindarán a las generaciones de estudiantes sembrando en sí, esa semilla de seres humanos más comprometidos y con visión de un País cada día mejor. Con cariño, admiración y respeto para siempre su alumna egresada. </p>
                                <h5><b class="amber-text text-darken-3">MPE. Alma Gloria Gutierrez Ruiz</b></h5>
                                <span class="blue-text">Psicología Educativa</span>
                            </div>
                        </div>
                    </div>
                    <div class="slider-nav">
                        <button class="prev">❮</button>
                        <button class="next">❯</button>
                    </div>
                </div>
            </div>
        <div>
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