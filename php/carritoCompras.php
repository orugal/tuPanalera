<?php
//unset($_SESSION['carrito']['persona']);
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
<div class="container-fluid">
	<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
            
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">

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
<div class="container-fluid" style="padding: 5% 0 5% 0;background: #fff;margin:2% 0"  ng-controller="carritoFunction" ng-init="carritoIni()">
    <div class="container">
        <div class="row">
       		  <div class="col-sm-12 col-xs-12 <?php if(count($pedido) > 0){ ?>col-md-6 col-lg-6 <?php }else{ ?>	col-md-12 col-lg-12<?php } ?>">
       		  	<h2 style="padding: 0;margin: 0 0 2% 0">Resumen del pedido</h2>
       		  	
       		  	<?php if(count($pedido) > 0){ ?>
       		  	<p>
       		  		A continuación te mostramos el pedido que acabas de seleccionar de nuestra tienda.
       		  	</p>
       		  		<div class="table-responsive">
	       		  	<table class="table">
	       		  		<thead>
	       		  			<tr>
		       		  			<th class="text-left">Producto</th>
		       		  			<th class="text-center">Cantidad</th>
		       		  			<th class="text-center">Valor unitario</th>
		       		  			<th class="text-center">Valor total</th>
		       		  			<th class="text-center"></th>
		       		  		</tr>
	       		  		</thead>
	       		  		<tbody>
	       		  			<?php foreach($pedido as $lista)
		       		  		{ 
		       		  			$cantVenta     =   ($car['canje'] == 0)?1:1;
		       		  			$totalVentaItem=($lista['precio_normal'] * ($lista['cantidad'] / $cantVenta));
		       		  			$granTotal += $totalVentaItem;
		       		  			$cantidades += $lista['cantidad'];
		       		  			?>
			       		  		<tr id="item<?php echo $lista['id_compra'] ?>">
			       		  			<td class="text-left"><?php echo utf8_encode($lista['titulo']) ?></td>
			       		  			<td class="text-center"><?php echo $lista['cantidad'] ?></td>
			       		  			<td class="text-center">$<?php echo number_format($lista['precio_normal'],0,",",".") ?></td>
			       		  			<td class="text-center">$<?php echo number_format($totalVentaItem,0,",",".") ?></td>
			       		  			<td class="text-center">
			       		  				<a ng-click="eliminaDelCarrito(<?php echo $lista['id_compra'] ?>)" class="btn btn-skin glyphicon glyphicon-trash"></a>
			       		  			</td>
			       		  		</tr>
		       		  		<?php } ?>
	       		  		</tbody>
	       		  		<tfoot>
	       		  			<tr>
	       		  				<td colspan="3" class="text-right">
	       		  					<h6>Total unidades</h6>
	       		  				</td>
	       		  				<td class="text-center">
	       		  					<h6><?php echo $cantidades ?></h6>
	       		  				</td>
	       		  				<td></td>
	       		  			</tr>
	       		  			<tr>
	       		  				<td colspan="3" class="text-right">
	       		  					<h3>Total pedido</h3>
	       		  				</td>
	       		  				<td class="text-center">
	       		  					<h3>$<?php echo number_format($granTotal,0,",",".") ?></h3>
	       		  				</td>
	       		  				<td></td>
	       		  			</tr>
	       		  			<tr>
	       		  				<td colspan="4" class="text-right">
	       		  					
	       		  				</td>
	       		  				<td></td>
	       		  			</tr>
	       		  		</tfoot>
	       		  	</table>
	       		  	</div>
	       		  	<?php }else{ ?>
	       		  		<p>Parece que aún no has realizado un pedido. Te invitamos a que ingreses a nuestro catálogo de productos.</p><br>
	       		  		<a href="<?php echo _DOMINIO ?>productos" class="btn btn-info">Ir al catálogo</a>
	       		  	<?php } ?>
       		  </div>
       		  <?php if(count($pedido) > 0){ ?>
       		  	  <div class="col-sm-12 col-xs-12 col-md-1 col-lg-1"></div>
	       		  <div class="col-sm-12 col-xs-12 col-md-5 col-lg-5">
	       		    <center>
						<?php if(!isset($_SESSION['carrito']['persona'])){ ?>
							<h2 style="padding: 0;margin: 0 0 2% 0">Debes estar registrado</h2>
							<p>
								Para poder realizar el pedido por medio de la página debes estar registrado.
							</p>
		       		  		<a href="<?php echo _DOMINIO ?>productos" class="btn btn-info"> Seguir comprando</a>
							<a ng-click="irPagoSinSession()" class="btn btn-skin"> Ir a registrarme</a>
						<?php }else{ ?>
							<h2 style="padding: 0;margin: 0 0 2% 0">Completa la información</h2>
							<p>Debes completar la información que verás a continuación, estos datos son necesarios para poder generar tu pago.</p>

					</center>
							<form role="form"  id="formData" ng-submit="dataFinal()">
							  <div class="form-group">
							    <label for="ejemplo_email_1">Dirección de entrega</label>
							    <input type="text" class="form-control" value="<?php echo $_SESSION['carrito']['persona']['direccion'] ?>" id="direccion" name="direccion" ng-model="direccion" placeholder="Escribe una dirección para entrega del pedido">
							  </div>
							  <div class="form-group">
							    <label for="ejemplo_email_1">Teléfono fijo</label>
							    <input type="text" class="form-control" value="<?php echo $_SESSION['carrito']['persona']['telefono'] ?>" id="telefono" name="telefono" ng-model="telefono" placeholder="Escribe un teléfono fijo">
							  </div>
							  <div class="form-group">
							    <label for="ejemplo_email_1">Teléfono celular</label>
							    <input type="text" class="form-control" value="<?php echo $_SESSION['carrito']['persona']['celular'] ?>" id="celular" name="celular" ng-model="celular" placeholder="Escribe un número de celular">
							  </div>
							<a href="<?php echo _DOMINIO ?>productos" class="btn btn-info"> Seguir comprando</a>
							  <button type="submit" class="btn btn-skin">Hacer pedido</button>
							</form>
						<?php } ?>
	       		  </div>
       		  <?php } ?>
        </div>
    </div>
</div>