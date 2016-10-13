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
$hijos		=	$db->GetAll(sprintf("SELECT * FROM principal WHERE promocion=1 AND tipo_contenido=10 AND eliminado=0 and visible=1"));
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
<div class="container-fluid" style="padding: 5% 0 5% 0;background: #fff;margin:2% 0" ng-controller="carritoFunction" ng-init="carritoIni()">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <h2><?php echo $info_id[0]['titulo'] ?></h2>
            </div>
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
           		<?php if(count($hijos) > 0){?>
	                <div class="row">
	                <?php foreach($hijos as $h){ ?>
	                    <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4" style="position: relative">
	                    	<?php if($h['imagen2'] != ""){ ?>
	                    		<div style="position: absolute;top:0;right:0;background: url('<?php echo _DOMINIO?>images/<?php echo  $h['imagen2']?>') no-repeat center center;width: 100px;height: 100px;background-size:200%;border-radius: 100px;box-shadow: 0px 0px 3px #999"></div>
	                    	<?php } ?>

	                        <div class="card" style="padding: 5%;background: #fff;border-radius: 5px;box-shadow: 0px 0px 5px #f6f6f6;text-align: center">
                              <img class="card-img-top" src="<?php echo _DOMINIO?>images/<?php echo  $h['imagen']?>" alt="Card image cap" width="100%">
                              <div class="card-block" style="margin:2% 0 0 0">
                                <h4 class="card-title" style="margin:0;font-family:'Roboto';font-weight: bold">
                                <?php echo utf8_encode($h['titulo'])?></h4>
                                <p style="margin:2% 0 0 0">
                                	<?php if($h['resumen'] != ""){ ?>
                                		<?php echo substr($h['resumen'],0,30)?>...
                                	<?php }else{?>
                                		&nbsp;
                                	<?php } ?>
                                </p>
                                <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                              </div>
                              <div class="card-footer">
                              		
                                <h2 style="padding: 0;color:#DA007F;font-family:'Roboto';">
                                $<?php echo number_format($h['precio_normal'],0,",",".") ?>
                                <?php if($h['precio_oferta']!= ""or $h['precio_oferta'] != 0){ ?>
                                <span class="small" style="text-decoration: line-through;">$<?php echo number_format($h['precio_oferta'],0,",",".") ?></span>
                                <?php } ?>
                                </h2>
                                <a href="<?php  echo _DOMINIO ?>productos/<?php  echo $h['id'] ?>/<?php echo $funciones->armaUrl($h['titulo'])?>" class="btn btn-skin "> VER PRODUCTO </a>

                              </div>
                            </div>
	                    </div>
	                <?php } ?>
	                    <div class="clearfix"></div>
	                </div>
                <?php } else{ ?>
                	<div class="alert alert-info">
					  <strong>Atenci&oacute;n!</strong> No hay promociones por el momento
					</div>
                <?php } ?>
           </div>    
        </div>
    </div>
</div>