<?php
//var_dump($_SESSION['confirma']);
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

$ApiKey = _API_KEY;
$merchant_id = $_SESSION['confirma']['merchantId'];
$referenceCode = $_SESSION['confirma']['referenceCode'];
$TX_VALUE = $_SESSION['confirma']['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_SESSION['confirma']['currency'];
$transactionState = $_SESSION['confirma']['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_SESSION['confirma']['signature'];
$reference_pol = $_SESSION['confirma']['reference_pol'];
$cus = $_SESSION['confirma']['cus'];
$extra1 = $_SESSION['confirma']['description'];
$pseBank = $_SESSION['confirma']['pseBank'];
$lapPaymentMethod = $_SESSION['confirma']['lapPaymentMethod'];
$transactionId = $_SESSION['confirma']['transactionId'];
if ($_SESSION['confirma']['transactionState'] == 4 ) {
$estadoTx = "Transacción aprobada";
}

else if ($_SESSION['confirma']['transactionState'] == 6 ) {
$estadoTx = "Transacción rechazada";
}

else if ($_SESSION['confirma']['transactionState'] == 104 ) {
$estadoTx = "Error";
}

else if ($_SESSION['confirma']['transactionState'] == 7 ) {
$estadoTx = "Transacción pendiente";
}

else {
$estadoTx=$_SESSION['confirma']['mensaje'];
}

//actualizo en la base de datos
if (strtoupper($firma) == strtoupper($firmacreada)) 
{
	$queryUpdate	=	sprintf("UPDATE pedidos SET
									refVenta='%s',
									resTrans='%s',
									estTrans='%s',
									idTrans='%s',
									valor='%s',
									moneda='%s',
									`desc`='%s',
									entidad='%s'
									WHERE id_pedido=%s",
									$reference_pol,
									$referenceCode,
									$_SESSION['confirma']['transactionState'],
									$transactionId,
									$TX_VALUE,
									$currency,
									$extra1,
									$lapPaymentMethod,
									$_SESSION['carrito']['pedido']);
	//echo $queryUpdate;
	//actualizo
	$result        =  $db->Execute($queryUpdate);
	unset($_SESSION['carrito']['pedido']);
}

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
        		<div class="col-sm-12 col-xs-12 col-md-2 col-lg-2"></div>
       		  <div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
       		  	<?php
						if (strtoupper($firma) == strtoupper($firmacreada)) {
						?>
							<h2>Resumen Transacción</h2>
							<table class="table">
							<tr>
							<td>Estado de la transaccion</td>
							<td><?php echo $estadoTx; ?></td>
							</tr>
							<tr>
							<tr>
							<td>ID de la transaccion</td>
							<td><?php echo $transactionId; ?></td>
							</tr>
							<tr>
							<td>Referencia de la venta</td>
							<td><?php echo $reference_pol; ?></td> 
							</tr>
							<tr>
							<td>Referencia de la transaccion</td>
							<td><?php echo $referenceCode; ?></td>
							</tr>
							<tr>
							<?php
							if($pseBank != null) {
							?>
								<tr>
								<td>cus </td>
								<td><?php echo $cus; ?> </td>
								</tr>
								<tr>
								<td>Banco </td>
								<td><?php echo $pseBank; ?> </td>
								</tr>
							<?php
							}
							?>
							<tr>
							<td>Valor total</td>
							<td>$<?php echo number_format($TX_VALUE); ?></td>
							</tr>
							<tr>
							<td>Moneda</td>
							<td><?php echo $currency; ?></td>
							</tr>
							<tr>
							<td>Descripción</td>
							<td><?php echo ($extra1); ?></td>
							</tr>
							<tr>
							<td>Entidad:</td>
							<td><?php echo ($lapPaymentMethod); ?></td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<a href="<?php echo _DOMINIO ?>pedidos" class="btn btn-skin">Ver mis pedidos</a>
								</td>
							</tr>
							</table>
						<?php
						}
						else
						{
						?>
							<h1>Error validando firma digital.</h1>
						<?php
						}
						?>

       		  </div>
       		  <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2"></div>
        </div>
    </div>
</div>