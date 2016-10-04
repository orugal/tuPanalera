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
<footer style="color:#444 !important;background: #fff">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <p>&copy;Copyright <?php echo date("Y")?>. <?php echo _NOMBRE_EMPRESA?><br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
          <i><?php echo $home[0]['mail']?></i><br>
          <?php echo $home[0]['direccion']?>
          </p>
        </div>
      </div>  
    </div>
  </footer>