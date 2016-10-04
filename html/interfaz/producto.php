<?php
/*
 * Funcionamiento de las categorias de la p�gina de cupcakes store
 * @author Farez Prieto
 * @date 03 de marzo 2016
 */
global $funciones;
global $core;
global $id;
$info_id	=	$core->info_id;
$hijos		=	$core->info_id_hijos;
$resursiva 	=	$funciones->BusquedaRecursiva($id,array());
$valDef     =   ($info_id[0]['canje'] == 0)?1:1;
$txtVenta   =   ($info_id[0]['canje'] == 0)?"Este producto solo se vende por docena":"Este producto se vende por unidad";
$tieneRelleno	=	($info_id[0]['destacado'] == 1)?1:0;

//pa�ales
$presentaciones[1][] = "Paquete X 30";
$presentaciones[1][] = "Paquete X 60";
$presentaciones[1][] = "Paquete X 100";

//nutrici�n
$presentaciones[2][] = "500 Gramos";
$presentaciones[2][] = "750 Gramos";
$presentaciones[2][] = "1500 Gramos";

//cuidado liquido
$presentaciones[3][] = "1 Litro";
$presentaciones[3][] = "2 Litros";
$presentaciones[3][] = "3 Litros";

//cuidado solido
$presentaciones[4][] = "200 Gramos";
$presentaciones[4][] = "100 Gramos";
$presentaciones[4][] = "150 Gramos";


//ropa
$presentaciones[5][] = "Talla 6";
$presentaciones[5][] = "Talla 8";
$presentaciones[5][] = "Talla 10";
$presentaciones[5][] = "Talla 12";




?>
<div class="container-fluid" style="background: #fff">
	<div class="container">
	<ol class="breadcrumb" style="background: transparent;margin:5% 0 0 0">
	  <?php foreach($resursiva as $r){ ?>
	  		<?php if($r['id'] != 10){ ?>
		  		<?php if($r['id'] == $id){ ?>
		  			<li class="active"><?php echo utf8_decode($r['titulo']) ?></li>
		  		<?php }else{ ?>
		  			<li><a href="<?php  echo _DOMINIO ?>productos/<?php  echo  $r['id'] ?>/<?php echo $funciones->armaUrl( $r['titulo'] )?>"><?php echo utf8_encode($r['titulo']) ?></a></li>
		  		<?php } ?>
	  		<?php } ?>
	  <?php } ?>
	</ol>
	</div>
</div>
<div class="container-fluid" style="padding: 5% 0 5% 0;background: #fff" ng-controller="carritoFunction" ng-init="carritoIni()">
    <div class="container">
        <div class="row">
       		  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
       		  	<img src="<?php echo _DOMINIO ?>images/<?php echo $info_id[0]['imagen'] ?>" class="img-thumbnail" width="100%">
       		  </div>
       		  <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
       		  	<h2 style="padding: 0;margin: 0 0 2% 0"><?php echo $info_id[0]['titulo'] ?></h2>
       		  	<h3 style="padding: 0;color:#fd4365">
       		  		$<?php echo number_format($info_id[0]['precio_normal'],0,",",".") ?>
       		  		<?php if($info_id[0]['precio_oferta']!= ""or $info_id[0]['precio_oferta'] != 0){ ?>
       		  		<span class="small" style="text-decoration: line-through;">$<?php echo number_format($info_id[0]['precio_oferta'],0,",",".") ?></span>
       		  		<?php } ?>
       		  	</h3>
       		  	<p><?php echo $info_id[0]['resumen'] ?></p>
       		  	* <span class="small"><?php echo $txtVenta ?></span><br><br>

       		  		<div class="form-group">
       		  		  <?php 
       		  		  //etapas s�lo para pa�ales
       		  		  if($info_id[0]['profundidad'] == 1){ ?>	
       		  		  	  <label for="name">Etapa</label><br>
			       		  <select name="etapa" id="etapa" ng-model="etapa" class="form-control" style="float: left;width: auto">
			       		  		<option value="">Seleccione...</option>
			       		  		<option value="1">Etapa 1</option>
			       		  		<option value="2">Etapa 2</option>
			       		  		<option value="3">Etapa 3</option>
			       		  </select><br><br>
       		  		  <?php } ?>

                      <label for="name">Presentaci&oacute;n</label><br>
		       		  <select name="relleno" id="relleno" ng-model="relleno" class="form-control" style="float: left;width: auto">
		       		  		<option value="">Seleccione...</option>
		       		  		<?php foreach($presentaciones[$info_id[0]['profundidad']] as $pres){ ?>
		       		  			<option value="<?php echo $pres ?>"><?php echo $pres ?></option>
		       		  		<?php } ?>
		       		  </select>

	       		  	</div>
       		  	<br><br>
       		  	<div style="float: left;width: 100%">
	       		  	<button type="button" class="btn btn-skin" id="addTocar" ng-click="addToCar()" style="float:left;margin:0 3% 0 0">Agregar al carrito</button>
	       		  	<a style="float:left;margin:0 1% 0 0" class="btn-default btn disabled" rel="-<?php echo $valDef ?>" id="menos" ng-click="reduce()">-</a>
	       		  	<input type="text" class="form-control" readonly="" id="cantidadcart" ng-model="cantidadcart" value="<?php echo $valDef ?>" style="text-align:center;width:45px;float: left;margin:0 1% 0 0">
	       		  	<a style="float:left;margin:0 1% 0 0" id="mas" class="btn-default btn" rel="<?php echo $valDef ?>" ng-click="aumenta()">+</a> <br>
       		  	</div>

       		  	<div style="float: left;width: 100%;margin:5% 0 0 0">
	       		  	<div
					  class="fb-like visible-lg"
					  data-share="true"
					  data-width="450"
					  data-show-faces="true">
					</div>
					<div class="fb-comments" data-numposts="5"></div>
				</div>
       		  </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	var cantidadVenta = <?php echo $valDef ?>;
	var tieneRelleno  = <?php echo $tieneRelleno ?>;
	var idProducto    = <?php echo $id ?>
</script>