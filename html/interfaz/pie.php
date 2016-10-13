 <?php
  global $core;
  global $id;
  global $funciones;
  $opciones_secundario = $core->listarMenuPrincipal();
  ?>
  <?php if($id == 1){ ?>
  <!-- Section: contact -->
    <section id="contact" class="home-section text-center bgNinos" style="color:#fff;padding:5%">
    <div class="heading-contact">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-offset-2">
          
        </div>
      </div>
      </div>
    </div>
    <div class="container-fluid ">

    <div class="row">
    
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8">
            <div class="form-wrapper" style="background: transparent;color:#fff !important;padding:0">
                <form id="contact-form" ng-submit="enviaFormContacto()">
                <div class="row">

                      <div class="col-lg-12 col-md-12" style="padding:0"> 
          
                        <div class="section-heading">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <h2 style="color:#fff;font-family: 'Roboto'">Ponte en contacto con nosotros</h2>
                        </div>
                        <p class="wow lightSpeedIn" data-wow-delay="0.3s">Déja tu información y pronto te estaremos contactando.</p>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6"> 
                        <div class="form-group">
                            <label for="name" style="color:#fff !important">
                                Nombre</label>
                            <input type="text" ng-click="desactivaError()" class="form-control" name="nombre" id="nombre" ng-model="nombre" placeholder="Escribe tu nombre"/>
                        </div>
                      </div>  
                      <div class="col-lg-6 col-md-6"> 
                        <div class="form-group">
                            <label for="email" style="color:#fff !important">
                                Correo electrónico</label>
                                <input type="email" ng-click="desactivaError()" class="form-control" id="mail" name="mail" ng-model="mail" placeholder="Tu correo electrónico" />
                        </div>
                      </div>  

                      <div class="col-lg-6 col-md-6"> 
                        <div class="form-group">
                            <label for="email" style="color:#fff !important">
                                Teléfono</label>
                                <input type="number" ng-click="desactivaError()" class="form-control" id="telefono" name="telefono" ng-model="telefono" placeholder="Tu número telefónico" />
                        </div>
                      </div>  
                      
                      <div class="col-lg-6 col-md-6"> 
                        <div class="form-group">
                            <label for="name" style="color:#fff !important">
                                Mensaje</label>
                            <input type="text" ng-click="desactivaError()" id="mensaje" name="mensaje" ng-model="mensaje" class="form-control" cols="10" placeholder="Escribe tu mensaje aquí">
                        </div>
                      </div>
                      
                      <div class="col-lg-12 col-md-12">   
                        <div class="form-group">
                          <div class="alert alert-danger" ng-show='divError'>
                          <strong>Atenci&oacute;n!</strong><br>{{msgError}}.
                       </div>
                        </div>
           
                        <center><button type="submit" class="btn  btn-danger" id="btnContactUs">Enviar Mensaje</button></center>
                      </div>  
       
                </div>
                </form>
        
            </div>
        </div>
        <div class="col-lg-2 col-md-2"></div>

    </div>  

    </div>
  </section>

  <?php } ?>
<footer style="color:#444 !important;background: #f5f5f5">
    <div class="container">
      <div class="row">        

      <div class="col-md-12 col-lg-12 visible-sm-block visible-xs " class="padding:0;background:#999">
          <div class="row">
                <div class="col-md-12 col-lg-12 text-left" class="padding:0">
                  <center><strong>P&aacute;ginas amigas</strong></center><br>
                </div>
                <?php $cont2=0;foreach($amigas as $ami){?>
                  <div class="col-sm-6 col-xs-6" class="padding:0">
                  <?php if($ami['link'] != ""){?><a href="<?php echo $ami['link']?>" title="<?php echo $ami['titulo']?>" target="_blank"><?php }?>
                   <center> <img  style="border-radius: 5px" src="<?php echo _DOMINIO?>images/<?php echo $ami['imagen']?>" width="100%"/></center>
                  <?php if($ami['link'] != ""){?></a><?php }?>
                  </div>
              <?php $cont2++;}?>
          </div>
              
        </div>

        <div class="col-md-2 col-lg-2">
          <img src="<?php echo _DOMINIO ?>images/diseno/logoPie.png" width="100%" class="visible-lg visible-md">
          <center><img src="<?php echo _DOMINIO ?>images/diseno/logoPie.png" width="50%" class="visible-sm-block visible-xs "></center><br>
        </div>

        <div class="col-md-4 col-lg-4 text-left visible-lg visible-md"  style="color:#000" >
          <p><strong><?php echo _NOMBRE_EMPRESA?></strong><br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
          <?php echo $home[0]['direccion']?><br>
          <a style="color:#000"  href="tel:<?php echo $home[0]['telefono']?>" onclick="_gaq.push(['_trackEvent', 'Mobile', 'Llamada'])"><?php echo $home[0]['telefono']?></a><br>
          <i><?php echo $home[0]['mail']?></i><br>
          <span class="small">&copy;Copyright <?php echo date("Y")?> - 
          Desarrollado por <a href="https://twitter.com/orugal" target="_blank" style="color:#000">@orugal</a></span><br>

          <a href="https://www.facebook.com/tupanalera.com.co/" target="_blank" title="S&iacute;guenos en Facebook"><img src="<?php echo _DOMINIO?>images/diseno/facebook.png" width="10%" style="margin:2% 0% 0 0"/></a>
          <a href="https://www.instagram.com/tupanalera/" target="_blank" title="S&iacute;guenos en Instagram"><img src="<?php echo _DOMINIO?>images/diseno/instagram.png" width="10%" style="margin:2% 0% 0 0"/></a>
          </p>
        </div>

        <div class="col-md-6 col-lg-6 visible-lg visible-md" class="padding:0">
          <div class="row">
                <div class="col-md-12 col-lg-12 text-left" class="padding:0">
                  <strong>P&aacute;ginas amigas</strong><br>
                </div>
                <?php $cont2=0;foreach($amigas as $ami){?>
                  <div class="col-md-4 col-lg-4" class="padding:0">
                  <?php if($ami['link'] != ""){?><a href="<?php echo $ami['link']?>" title="<?php echo $ami['titulo']?>" target="_blank"><?php }?>
                   <center> <img  style="border-radius: 5px" src="<?php echo _DOMINIO?>images/<?php echo $ami['imagen']?>" width="100%"/></center>
                  <?php if($ami['link'] != ""){?></a><?php }?>
                  </div>
              <?php $cont2++;}?>
          </div>
              
        </div>


        <div class="col-md-10 col-lg-10 text-center visible-sm-block visible-xs"  style="color:#000" >
          <p><strong><?php echo _NOMBRE_EMPRESA?></strong><br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
          <?php echo $home[0]['direccion']?><br>
          <a style="color:#000"  href="tel:<?php echo $home[0]['telefono']?>" onclick="_gaq.push(['_trackEvent', 'Mobile', 'Llamada'])"><?php echo $home[0]['telefono']?></a><br>
          <i><?php echo $home[0]['mail']?></i><br>
          <span class="small">&copy;Copyright <?php echo date("Y")?><br>
          Desarrollado por <a href="https://twitter.com/orugal" target="_blank" style="color:#000">@orugal</a></span>
          </p>
          <center>
            <a href="https://www.facebook.com/tupanalera.com.co/" target="_blank" title="S&iacute;guenos en Facebook"><img src="<?php echo _DOMINIO?>images/diseno/facebook.png" width="20%" style="margin:2% 0% 0 0"/></a>
            <a href="https://www.instagram.com/tupanalera/" target="_blank" title="S&iacute;guenos en Instagram"><img src="<?php echo _DOMINIO?>images/diseno/instagram.png" width="20%" style="margin:2% 0% 0 0"/></a>
          </center>
        </div>

      </div>  
    </div>
  </footer>