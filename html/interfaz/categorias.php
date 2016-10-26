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
$resursiva 	=	$funciones->BusquedaRecursiva($id,array());
?>
<div class="container-fluid">
	<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <ol class="breadcrumb" style="background: transparent;margin:5% 0 0 0">
                  <?php foreach($resursiva as $r){ ?>
                        <?php if($r['id'] != 10 ){ ?>
                            <?php if($r['id'] == $id){ ?>
                                <li class="active"><?php echo utf8_encode($r['titulo'])?></li>
                            <?php }else{ ?>
                                <li><a href="<?php  echo _DOMINIO ?>productos/<?php echo $r['id'] ?>/<?php echo $funciones->armaUrl($r['titulo'] )?>"><?php echo utf8_encode($r['titulo']) ?></a></li>
                            <?php } ?>
                        <?php } ?>
                  <?php } ?>
                </ol>
            
        </div>
    </div>
	</div>
</div>
<div class="container-fluid" style="padding: 5% 0 5% 0;background: #fff;margin:2% 0" ng-controller="carritoFunction" ng-init="carritoIni()">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <h2><?php echo $info_id[0]['titulo'] ?></h2>
            </div>
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                <div class="row">
                <?php $cont=0;foreach($hijos as $h){  $cont++;?>
                  <?php if($h['tipo_contenido'] != 10){?>

                    <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
                        <div class="panel panel-default">
                          <div class="panel-body text-center">
                            <a href="<?php  echo _DOMINIO ?>productos/<?php  echo  $h['id'] ?>/<?php echo $funciones->armaUrl($h['titulo'])?>">    
                                <img src="<?php echo _DOMINIO ?>images/<?php echo $h['imagen'] ?>" class="img-thumbnail" width="100%" />
                                <strong><?php echo $h['titulo'] ?></strong>
                            </a>
                          </div>
                        </div>
                    </div>

                  <?php }else{?>  
                    <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4" style="position: relative">
                                  <?php if($h['imagen2'] != ""){ ?>
                                    <div style="position: absolute;top:0;right:0;background: url('<?php echo _DOMINIO?>images/<?php echo  $h['imagen2']?>') no-repeat center center;width: 100px;height: 100px;background-size:200%;border-radius: 100px;box-shadow: 0px 0px 3px #999"></div>
                                  <?php } ?>

                                    <div class="card" style="padding: 5%;background: #fff;border-radius: 5px;box-shadow: 0px 0px 5px #f6f6f6;text-align: center">
                                        <img class="card-img-top" src="<?php echo _DOMINIO?>images/<?php echo  $h['imagen']?>" alt="Card image cap" width="100%">
                                        <div class="card-block" style="margin:2% 0 0 0">
                                          <h4 class="card-title" style="margin:0;font-family:'Roboto';font-weight: bold">
                                          <?php echo ($h['titulo'])?></h4>
                                          <p style="margin:2% 0 2% 0;color:#999">
                                            <?php if($h['resumen'] != ""){ ?>
                                              <?php echo substr(utf8_decode($h['resumen']),0,30)?>...
                                            <?php }else{?>
                                              Producto destacado 
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

                  <?php if($cont == 3){ $cont=0;?>
                      </div>
                      <div class="row">
                  <?php } ?>

                <?php } ?>
                </div>
           </div>  
           <!--<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title" style="text-align: center">Carrito de compras</h4>
                    <div style="float: left;width: 100%" id="carritoCont">
                        
                    </div>
                  </div>
                </div>
           </div> -->   
        </div>
    </div>
</div>