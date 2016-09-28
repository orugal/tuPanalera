<!DOCTYPE html>
<html lang="en" ng-app="TCS">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Cupcakes Store</title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />	
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico">

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-74486910-1', 'auto');
	  ga('send', 'pageview');

	</script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom"  ng-controller="principal" ng-init="initTCS()">
	<!-- Preloader -->
	<!--<div id="preloader">
	  <div id="load"></div>
	</div>-->
<!-- Navigation -->
    <div id="navigation">
        <nav class="navbar navbar-custom" role="navigation">
		      <div class="container">
		            <div class="row">
		                  <div class="col-md-12">
		 					<center><img src="img/logo.png"></center>
		                  <!-- Brand and toggle get grouped for better mobile display -->
		                  <div class="navbar-header">
		                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		                        <i class="fa fa-bars"></i>
		                        </button>
		                  </div>
                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav">
                                      <li class="active"><a href="#intro">Home</a></li>
                                      <li><a href="#about">Quiénes Somos</a></li>
							          <li><a href="#gallery">Galería</a></li>                    
							          <li><a href="#gallery">Compra Online</a></li>                  
                                      <li><a href="#contact">Contacto</a></li>
                                     <!-- <li>
                                      	<a title="sigue a The Cupcakes Store en Instagram" href="https://www.instagram.com/thcupcakesstore/" target="_blank"><img width="30px" src="img/instagram.png" /></a>
					<a title="sigue a The Cupcakes Store en Twitter" href="https://twitter.com/thcupcakesstore/" target="_blank"><img width="30px" src="img/twitter.png" /></a>
					<a title="sigue a The Cupcakes Store en Facebook" href="https://www.facebook.com/thcupcakesstore/" target="_blank"><img width="30px" src="img/facebook.png" /></a>
                                      </li>-->
                                </ul>
                          </div>
                          <!-- /.Navbar-collapse -->
		     
		                  </div>
		            </div>
		      </div>
		      <!-- /.container -->
		</nav>
    </div> 
    <!-- /Navigation --> 
	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<!--<a href="index.html"><img src="img/logoTCS.png" alt="" /></a>-->
			<h1 style="color:#fff;text-shadow: 0px 2px 3px #999;font-size: 3.5em">Haz de tu vida un sueño <br>y de tu sueño una realidad</h1>
		</div>
		<div class="page-scroll">
			<a href="#about">
				<i class="fa fa-angle-down fa-5x animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
	
     

	<!-- Section: about -->
    <section id="about" class="home-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
						<div class="section-heading text-center">
						<div class="wow bounceInDown" data-wow-delay="0.2s">
							<h2 >Quiénes somos</h2>
						</div>
						<!--<p class="wow bounceInUp" data-wow-delay="0.3s">
							Hacemos cosas dulces para hacer tu vida más feliz
						</p>-->
						</div>
					
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<!--<div class="col-md-6">
				
					<img src="img/img1.jpg" class="img-responsive img-rounded" alt="" />
				</div>	-->	
				<div class="col-md-2 col-sm-12 col-xs-12"></div>
				<div class="col-md-8 text-center">
					<!--<p><strong>Lorem ipsum dolor sit amet, ei purto tamquam ceteros his</strong></p>-->
					<p>
					<a  href="http://www.thecupcakesstore.com" title="The Cupcakes Store"><strong>The Cupcakes Store</strong></a> es un negocio familiar el cuál tiene como objetivo llenar de magia aquellos momentos especiales que siempre queremos celebrar, a través de nuestros productos de pastelería. Ponemos el alma en cada una de nuestras deliciosas creaciones.<br><br>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=216374165059237";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-like" data-href="https://www.facebook.com/thcupcakesstore/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					</p>
					<!--<blockquote>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
					</blockquote>-->
					<!--<a href="#gallery" class="btn btn-skin btn-lg btn-scroll">Ver Fotos</a>-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12"></div>
			</div>		
		</div>
	</section>
	<!-- /Section: about -->
	
	<!-- Section: separator -->
    <!--<section id="separator" class="home-section parallax text-center" data-stellar-background-ratio="0.5">
		
		<div class="container">
			<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-graduation-cap fa-5x"></i>
							</div>
						<span class="color-white">Bachelor of Design</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-heart fa-5x"></i>
							</div>
						<span class="color-white">10x failed in love</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-plane fa-5x"></i>
							</div>
						<span class="color-white">I love traveling</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center txt-shadow">
							<div class="icon">
								<i class="fa fa-camera fa-5x"></i>
							</div>
						<span class="color-white">I'm photographer</span>
						</div>
					</div>
			</div>		
		</div>
	</section>-->
	<!-- /Section: separator -->
	
	
	<!-- Section: gallery -->
    <section id="gallery" class="home-section text-center bg-gray">

			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
						<h2 style="color:#fff">Galería</h2>
						<p style="color:#fff">	
							Algunas de nuestra creaciones<br><br>
							
<a href="https://www.instagram.com/thcupcakesstore/?ref=badge" target="_blank" title="Sigue a The Cupcakes Store en Instagram" class="ig-b- ig-b-v-24"><img src="http://www.thecupcakesstore.com/img/siguenos.png" alt="Sigue a The Cupcakes Store en Instagram" /></a>
						</p>
						

					</div>
					</div>
				</div>
			</div>
			</div>

		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.4s">
	                    <div id="owl-works" class="owl-carousel">
	                        Cargando...
	                    </div>
					</div>
                </div>
            </div>
		</div>
	</section>
	<!-- /Section: services -->
	

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-offset-2">
					
					<div class="section-heading">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<h2>Ponte en contacto con nosotros</h2>
					</div>
					<p class="wow lightSpeedIn" data-wow-delay="0.3s">Déja tu información y pronto te estaremos contactando.</p>
					</div>
					
				</div>
			</div>
			</div>
		</div>
		<div class="container">

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
                            <label for="subject">
                                Asunto</label>
                            <select id="asunto" ng-click="desactivaError()" name="asunto" ng-model="asunto" class="form-control" >
                                <option value="">Seleccione...</option>
                                <option value="Cotización">Cotización productos</option>
                                <option value="Sugerencia">Sugerencias</option>
                            </select>
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
			<div class="text-center">
					<p class="lead"><i class="fa fa-phone"></i> Llámanos +(1) 314 394 2914</p><br>
					<a title="sigue a The Cupcakes Store en Instagram" href="https://www.instagram.com/thcupcakesstore/" target="_blank"><img src="img/instagram.png" /></a>
					<a title="sigue a The Cupcakes Store en Twitter" href="https://twitter.com/thcupcakesstore/" target="_blank"><img src="img/twitter.png" /></a>
					<a title="sigue a The Cupcakes Store en Facebook" href="https://www.facebook.com/thcupcakesstore/" target="_blank"><img src="img/facebook.png" /></a>
			</div>
        </div>

    </div>	

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<p>&copy;Copyright 2016 . The Cupcakes Store<br> <!--. design by <a href="http://bootstraptaste.co">Bootstrap Themes</a>-->
					<i>info@thecupcakesstore.com</i>
					</p>
				</div>
                <!-- 
                    All links in the footer should remain intact. 
                    Licenseing information is available at: http://bootstraptaste.com/license/
                    You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Lonely
                -->
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/angular.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/controller.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.sticky.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
