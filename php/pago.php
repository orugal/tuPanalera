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
$pedido 	=	$funciones->getCar($_SESSION['carrito']['pedido']);
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
<div class="container-fluid" style="padding: 5% 0 5% 0" ng-controller="carritoFunction" ng-init="carritoIni()">
    <div class="container">
        <div class="row">
        		<div class="col-sm-12 col-xs-12 col-md-3 col-lg-3"></div>
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
			       		  			<td class="text-left"><?php echo $lista['titulo'] ?></td>
			       		  			<td class="text-center"><?php echo $lista['cantidad'] ?></td>
			       		  			<td class="text-center">$<?php echo number_format($lista['precio_normal'],0,",",".") ?></td>
			       		  			<td class="text-center">$<?php echo number_format($totalVentaItem,0,",",".") ?></td>
			       		  			
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
	       		  	<center>
	       		  	<?php 
	       		  	//“ApiKey~merchantId~referenceCode~amount~currency”.
	       		  	//api pruebas 6u39nqhq8ftd0hlvnjfs66eh8c
	       		  	//api real Ho8bIis1W72W2kz9ZLLZG494Fw
	       		  	$ApiKey = 'Ho8bIis1W72W2kz9ZLLZG494Fw';
	       		  	$llave = md5($ApiKey."~554510~".time()."~".$granTotal."~COP");
	       		  	//echo $llave;
	       		  	?>

	       		  	<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/">
					  <input name="merchantId"    type="hidden"  value="554510"   >
					  <input name="ApiKey"        type="hidden"  value="<?php  echo $ApiKey ?>" >
					  <input name="accountId"     type="hidden"  value="556862" >
					  <input name="description"   type="hidden"  value="Compra Productos The Cupcakes Store"  >
					  <input name="referenceCode" type="hidden"  value="<?php echo time() ?>" >
					  <input name="amount"        type="hidden"  value="<?php echo $granTotal ?>"   >
					  <input name="tax"           type="hidden"  value="0"  >
					  <input name="taxReturnBase" type="hidden"  value="0" >
					  <input name="currency"      type="hidden"  value="COP" >
					  <input name="signature"     type="hidden"  value="<?php echo $llave ?>"  >
					  <input name="test"          type="hidden"  value="0" >
					  <input name="buyerEmail"    type="hidden"  value="<?php echo $_SESSION['carrito']['persona']['email'] ?>" >
					  <input name="responseUrl"    type="hidden"  value="http://www.thecupcakesstore.com/confirma.php" >
					  <input name="confirmationUrl"    type="hidden"  value="http://www.thecupcakesstore.com/confirma2.php" >
					  <input name="Submit"        type="submit"  value="Reaizar pedido"  class="btn btn-skin">
					</form><br>
					<a href="http://www.payulatam.com/logos/pol.php?l=133&c=56dc9a177084d" target="_blank">
					<img src="http://www.payulatam.com/logos/logo.php?l=133&c=56dc9a177084d" alt="PayU Latam" border="0" width="100%" /></a>
					</center>
	       		  	<?php }else{ ?>
	       		  		<p>Parece que aún no has realizado un pedido. Te invitamos a que ingreses a nuestro catálogo de productos.</p><br>
	       		  		<a href="<?php echo _DOMINIO ?>productos" class="btn btn-info">Ir al catálogo</a>
	       		  	<?php } ?>
       		  </div>
       		  <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
</div>