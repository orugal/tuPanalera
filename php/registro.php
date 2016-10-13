<?php
/*
 * Funcionamiento de las categorias de la página de cupcakes store
 * @author Farez Prieto
 * @date 03 de marzo 2016
 */
global $funciones;
global $core;
global $id;
$info_id	=	$core->info_id;
$hijos		=	$core->info_id_hijos;
$pedido 	=	$funciones-> getCar($_SESSION['carrito']['pedido']);

$resursiva 	=	$funciones->BusquedaRecursiva($id,array());
?>
<div class="container-fluid" >
	<div class="container">
	<ol class="breadcrumb" style="background: transparent;margin:5% 0 0 0">
	  <?php foreach($resursiva as $r){ ?>
	  		<?php if($r['id'] != 10 && $r['id'] != 1190){ ?>
		  		<?php if($r['id'] == $id){ ?>
		  			<li class="active"><?php echo $r['titulo'] ?></li>
		  		<?php }else{ ?>
		  			<li><a href="<?php  echo _DOMINIO ?>productos/<?php  echo  $r['id'] ?>/<?php echo $funciones->armaUrl( $r['titulo'] )?>"><?php echo $r['titulo'] ?></a></li>
		  		<?php } ?>
	  		<?php } ?>
	  <?php } ?>
	</ol>
	</div>
</div>
<div class="container-fluid" style="padding: 5% 0 5% 0;background: #fff;margin:2% 0"  ng-controller="carritoFunction">
    <div class="container">
        <div class="row">

       		  <div class="col-sm-12 col-xs-12 col-md-5 col-lg-5">
	       		  <h2 style="padding: 0;margin: 0 0 2% 0">¡Regístrate!</h2>
       		  	<p>
       		  		Accede con tus datos de ingreso.
       		  	</p>
       		  	<form role="form" id="formRegistro" ng-submit="registro()">
       		  	  <div class="form-group">
				    <label for="ejemplo_email_1">Nombre</label>
				    <input type="text" class="form-control" id="nombre" name="nombre" ng-model="nombre" placeholder="Escribe tu nombre">
				  </div>
				  <div class="form-group">
				    <label for="ejemplo_email_1">Apellido</label>
				    <input type="text" class="form-control"  id="apellido" name="apellido" ng-model="apellido" placeholder="Escribe tu apellido">
				  </div>
				  <div class="form-group">
				    <label for="ejemplo_email_1">Email</label>
				    <input type="email" class="form-control"  id="email" name="email" ng-model="email"  placeholder="Introduce tu email">
				  </div>
				  <div class="form-group">
				    <label for="ejemplo_password_1">Contraseña</label>
				    <input type="password" class="form-control"  id="clave" name="clave" ng-model="clave" placeholder="Contraseña">
				  </div>
				  <div class="form-group">
				    <label for="ejemplo_password_1">Repetir contraseña</label>
				    <input type="password" class="form-control"  id="rclave" name="rclave" ng-model="rclave"  placeholder="Repita la contraseña">
				  </div>
				  <button type="submit" class="btn btn-skin">Crear cuenta</button>
				</form>
       		  </div>
       		  <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2"></div>
       		  <div class="col-sm-12 col-xs-12 col-md-5 col-lg-5">
       		  	<h2 style="padding: 0;margin: 0 0 2% 0">¡Ya tienes una cuenta!</h2>
       		  	<p>
       		  		Accede con tus datos de ingreso.
       		  	</p>
       		  	<form role="form"  id="formLogin" ng-submit="login()">
				  <div class="form-group">
				    <label for="ejemplo_email_1">Email</label>
				    <input type="email" class="form-control" id="usuario" name="usuario" ng-model="usuario" placeholder="Introduce tu email">
				  </div>
				  <div class="form-group">
				    <label for="ejemplo_password_1">Contraseña</label>
				    <input type="password" class="form-control"  id="lclave" name="lclave" ng-model="lclave" placeholder="Escribe tu contraseña">
				  </div>
				  <button type="submit" class="btn btn-skin">Ingresar</button>
				</form>
       		  </div>

        </div>
    </div>
</div>