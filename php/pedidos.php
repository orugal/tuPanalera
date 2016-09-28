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


$resursiva 	=	$funciones->BusquedaRecursiva($id,array());

function infoPedido($pedido)
{
	global $db;
	$query  = sprintf("SELECT * FROM pedidos WHERE id_pedido=%s",$pedido);
	$result = $db->GetAll($query);
	return $result; 
}
if(!isset($_SESSION['carrito']['persona']))
{
	echo "<script>document.location='"._DOMINIO."home'</script>";
}
else
{

$pedidosUsuario = $db->GetAll(sprintf("SELECT DISTINCT(id_pedido) as pedido FROM carrito WHERE usuario_id=%s",$_SESSION['carrito']['persona']['idusuario']));





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


        <?php if(count($pedidosUsuario) > 0){ ?>
        	<?php foreach($pedidosUsuario as $ped)
        	{ 
        		$dataPed = infoPedido($ped['pedido']);
        		if ($dataPed[0]['estTrans'] == 4 ) {
					$estadoTx = "Transacción aprobada";
					}

					else if ($dataPed[0]['estTrans'] == 6 ) {
					$estadoTx = "Transacción rechazada";
					}

					else if ($dataPed[0]['estTrans'] == 104 ) {
					$estadoTx = "Error";
					}

					else if ($dataPed[0]['estTrans'] == 7 ) {
					$estadoTx = "Transacción pendiente";
					}

					else {
					$estadoTx="Sin definir";
					}

        		?>
       		  <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
       		  	<?php
						if (strtoupper($firma) == strtoupper($firmacreada)) {
						?>
							<h2>Pedido #<?php echo $dataPed[0]['refVenta']; ?></h2>
							<table class="table">
							<tr>
							<td>Estado de la transaccion</td>
							<td><?php echo $estadoTx; ?></td>
							</tr>
							<tr>
							<tr>
							<td>ID de la transaccion</td>
							<td><?php echo $dataPed[0]['idTrans']; ?></td>
							</tr>
							<tr>
							<td>Referencia de la venta</td>
							<td><?php echo $dataPed[0]['refVenta']; ?></td> 
							</tr>
							<tr>
							<td>Referencia de la transaccion</td>
							<td><?php echo $dataPed[0]['resTrans']; ?></td>
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
							<td>$<?php echo number_format($dataPed[0]['valor']); ?></td>
							</tr>
							<tr>
							<td>Moneda</td>
							<td><?php echo $dataPed[0]['moneda']; ?></td>
							</tr>
							<tr>
							<td>Descripción</td>
							<td><?php echo ($dataPed[0]['desc']); ?></td>
							</tr>
							<tr>
							<td>Entidad:</td>
							<td><?php echo ($dataPed[0]['entidad']); ?></td>
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
       		  <?php } ?>
       		  <?php }else{ ?>
       		  		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
       		  			Actualmente no tiene pedidos
       		  		</div>
       		  <?php } ?>
        </div>
    </div>
</div>
<?php } ?>