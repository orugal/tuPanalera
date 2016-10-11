 <?php
  global $core;
  global $id;
  global $funciones;
  $opciones_secundario = $core->listarMenuPrincipal();
  ?>
  <?php if($id == 1){ ?>
  <!-- Section: contact -->
    <section id="contact" class="home-section text-center bgBlue" style="color:#fff">
    <div class="heading-contact">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-offset-2">
          
          <div class="section-heading">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
          <h2 style="color:#fff">Ponte en contacto con nosotros</h2>
          </div>
          <p class="wow lightSpeedIn" data-wow-delay="0.3s">Déja tu información y pronto te estaremos contactando.</p>
          </div>
          
        </div>
      </div>
      </div>
    </div>
    <div class="container-fluid ">

    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <div class="form-wrapper marginbot-50">
                <form id="contact-form" ng-submit="enviaFormContacto()">
                <div class="row">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" ng-click="desactivaError()" class="form-control" name="nombre" id="nombre" ng-model="nombre" placeholder="Escribe tu nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Correo electrónico</label>
                                <input type="email" ng-click="desactivaError()" class="form-control" id="mail" name="mail" ng-model="mail" placeholder="Tu correo electrónico" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Teléfono</label>
                                <input type="number" ng-click="desactivaError()" class="form-control" id="telefono" name="telefono" ng-model="telefono" placeholder="Tu número telefónico" />
                        </div>
          
             
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea ng-click="desactivaError()" id="mensaje" name="mensaje" ng-model="mensaje" class="form-control" rows="9" cols="25" placeholder="Escribe tu mensaje aquí"></textarea>
                        </div>
                <div class="form-group">
                           <div class="alert alert-danger" ng-show='divError'>
                  <strong>Atenci&oacute;n!</strong><br>{{msgError}}.
               </div>
                        </div>
           
                        <button type="submit" class="btn btn-skin btn-block" id="btnContactUs">Enviar Mensaje</button>
       
                </div>
                </form>
        
            </div>
     <!-- <div class="text-center">
          <?php if($home[0]['telefono2'] != ""){?>
            <p class="lead"><i class="fa fa-phone"></i> Llámanos 
            <a href="tel:<?php echo $home[0]['telefono2']?>" onclick="_gaq.push(['_trackEvent', 'Mobile', 'Llamada'])"><?php echo $home[0]['telefono2']?></a>
            </p><br>
          <?php }?> 
          <?php echo $home[0]['horarios']?><br>
          <a title="sigue a The Cupcakes Store en Instagram" href="https://www.instagram.com/thcupcakesstore/" target="_blank"><img src="<?php echo _DOMINIO ?>images/diseno/instagram.png" /></a>
          <a title="sigue a The Cupcakes Store en Twitter" href="https://twitter.com/thcupcakesstore/" target="_blank"><img src="<?php echo _DOMINIO ?>images/diseno/twitter.png" /></a>
          <a title="sigue a The Cupcakes Store en Facebook" href="https://www.facebook.com/thcupcakesstore/" target="_blank"><img src="<?php echo _DOMINIO ?>images/diseno/facebook.png" /></a><br><br>
          

      </div>-->
        </div>

    </div>  

    </div>
  </section>

  <?php } ?>
<footer style="color:#444 !important;background: #f5f5f5">
    <div class="container">
      <div class="row"
>        <div class="col-md-2 col-lg-2">
          <img src="<?php echo _DOMINIO ?>images/diseno/logoPie.png" width="100%" class="visible-lg visible-md">
          <center><img src="<?php echo _DOMINIO ?>images/diseno/logoPie.png" width="50%" class="visible-sm-block visible-xs "></center>
        </div>

        <div class="col-md-4 col-lg-4 text-left visible-lg visible-md"  style="color:#000" >
          <p><strong><?php echo _NOMBRE_EMPRESA?></strong><br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
          <?php echo $home[0]['direccion']?><br>
          <a style="color:#000"  href="tel:<?php echo $home[0]['telefono']?>" onclick="_gaq.push(['_trackEvent', 'Mobile', 'Llamada'])"><?php echo $home[0]['telefono']?></a><br>
          <i><?php echo $home[0]['mail']?></i><br>
          <span class="small">&copy;Copyright <?php echo date("Y")?> - 
          Desarrollado por <a href="https://twitter.com/orugal" target="_blank" style="color:#000">@orugal</a></span><br>

          <img src="<?php echo _DOMINIO?>images/diseno/facebook.png" width="10%" style="margin:2% 0% 0 0"/>
          <img src="<?php echo _DOMINIO?>images/diseno/instagram.png" width="10%" style="margin:2% 0% 0 0"/>
          </p>
        </div>

        <div class="col-md-6 col-lg-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.5715698497124!2d-74.05608948477966!3d4.670205396607674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9af4b6a67c6b%3A0x353d24addceeeee8!2sCentro+De+Visado+Uk!5e0!3m2!1ses!2sco!4v1476226646739" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>


        <div class="col-md-10 col-lg-10 text-center visible-sm-block visible-xs"  style="color:#000" >
          <p><strong><?php echo _NOMBRE_EMPRESA?></strong><br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
          <?php echo $home[0]['direccion']?><br>
          <a style="color:#000"  href="tel:<?php echo $home[0]['telefono']?>" onclick="_gaq.push(['_trackEvent', 'Mobile', 'Llamada'])"><?php echo $home[0]['telefono']?></a><br>
          <i><?php echo $home[0]['mail']?></i><br>
          <span class="small">&copy;Copyright <?php echo date("Y")?><br>
          Desarrollado por <a href="https://twitter.com/orugal" target="_blank" style="color:#000">@orugal</a></span>
          </p>
        </div>

      </div>  
    </div>
  </footer>