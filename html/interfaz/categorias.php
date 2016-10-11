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
<div class="container-fluid" style="background: #fff">
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
                <?php foreach($hijos as $h){ ?>
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