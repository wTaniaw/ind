<?php
include("header.php");
?>

<!-- /inner_content -->
<div class="about" style="background-color: #F7F9F9">
    <div class="container">
        <h3 class="heading-agileinfo">
            <hr>Contacto<span>El acceso a la docencia y las oportunidades de ser promovido y recibir reconocimiento
                dependen de mi preparación!!</span>
        </h3>
        <div class="inner_sec_grids_info_w3ls">
            <div class="col-md-4 agile_info_mail_img_info">
                <div class="address-grid">
                    <h4>Información de <span>Contacto</span></h4>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Teléfono</p><span>614 12053 55</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Mail </p><a style="color:white"
                                href="mailto:iineed@iineed.com.mx">informacion@iineed.edu.mx</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Dirección</p><span>Calle Ernesto Talavera #1208.
                                Col. Zarco. Chihuahua, Chih.</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!-- <div class="agileits_w3layouts_nav_right contact">
                        <div class="social two">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
-->
                </div>
            </div>
            <div class="col-md-8 agile_info_mail_img">

            </div>
            <div class="clearfix"> </div>
            <div class="w3layouts_mail_grid">
                <form action="pagina/enviarcorreo.php" method="post">
                    <div class="col-md-6 wthree_contact_left_grid">
                        <input type="text" name="Name" placeholder="Nombre" required="">
                        <input type="email" name="Email" placeholder="Correo" required="">
                        <input type="text" name="Telephone" placeholder="Teléfono" required="">
                        <input type="text" name="Subject" placeholder="Asunto" required="">
                    </div>
                    <div class="col-md-6 wthree_contact_left_grid">
                        <textarea name="Message" placeholder="Mensaje..." required=""></textarea>
                        <input type="submit" value="Submit">
                    </div>
                    <div class="clearfix"> </div>

                </form>
            </div>


        </div>

    </div>
</div>
<!-- //mid-services -->
<!-- /map -->
<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.196857205904!2d-106.08365829947508!3d28.623861552791016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea5cb6c1dacf69%3A0x269dabb81eb0963b!2sC.%20Ernesto%20Talavera%201208%2C%20Zarco%2C%2031020%20Chihuahua%2C%20Chih.!5e0!3m2!1ses!2smx!4v1675374151153!5m2!1ses!2smx"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
<!-- //map -->

<!-- //inner_content -->
<?php
include("footer.php");
?>