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
<div class="container-fluid" >
	<div class="container">
	<ol class="breadcrumb" style="background: transparent;margin:5% 0 0 0">
	  <?php foreach($resursiva as $r){ ?>
	  		<?php if($r['id'] != 10 && $r['id'] != 1190){ ?>
		  		<?php if($r['id'] == $id){ ?>
		  			<li class="active"><?php echo $r['titulo'] ?></li>
		  		<?php }else{ ?>
		  			<li><a href="<?php  echo _DOMINIO ?>productos/<?php  echo  $h['id'] ?>/<?php echo $funciones->armaUrl( $h['titulo'] )?>"><?php echo $r['titulo'] ?></a></li>
		  		<?php } ?>
	  		<?php } ?>
	  <?php } ?>
	</ol>
	</div>
</div>
<div class="container-fluid" style="padding: 5% 0 5% 0">
    <div class="container">
        <div class="row">
        <?php foreach($hijos as $h){ ?>
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-body text-center">
                    <a href="<?php  echo _DOMINIO ?>productos/<?php  echo  $h['id'] ?>/<?php echo $funciones->armaUrl( $h['titulo'] )?>">    
                        <img src="<?php echo _DOMINIO ?>images/<?php echo $h['imagen'] ?>" class="img-thumbnail" width="100%" />
                        <strong><?php echo $h['titulo'] ?></strong>
                    </a>
                  </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>