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

$pedidosUsuario = $db->GetAll(sprintf("SELECT DISTINCT(c.id_pedido) as pedido 
										FROM carrito c
										INNER JOIN pedidos p ON p.id_pedido=c.id_pedido
										WHERE c.usuario_id=%s AND p.estTrans=1",$_SESSION['carrito']['persona']['idusuario']));



/*$pedidosUsuario = $db->GetAll(sprintf("SELECT * FROM pedidos p
										inner join carrito c on c.id_pedido=p.id_pedido
										WHERE c.usuario_id=%s AND p.estTrans=1",$_SESSION['carrito']['persona']['idusuario']));*/


//var_dump($_SESSION['carrito']);



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
        		$pedido 	=	$funciones->getCar($ped['pedido']);

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

					else if ($dataPed[0]['estTrans'] == 1) {
					$estadoTx = "Recibido";
					}

					else {
					$estadoTx="Sin definir";
					}

        		?>
       		  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<h2>Pedido #<?php echo $dataPed[0]['refVenta']; ?></h2>
				<table class="table">
				<tr>
					<td>Estado</td>
					<td colspan="4"><?php echo $estadoTx; ?></td>
				</tr>
				<tr>
					<td>Fecha del pedido</td>
					<td colspan="4"><?php echo $pedido[0]['fecha']; ?></td>
				</tr>
				<tr>
					<td colspan="5"><h3 style="margin:0 0 -5px 0">Productos solicitados</h3></td>
				</tr>
				<tr>
					<th>FOTO</th>
					<th>PRODUCTO</th>
					<th align="center">CANT</th>
					<th align="center">V. UNI</th>
					<th align="center">V. TOT</th>
				</tr>
				<?php $suma=0;foreach($pedido as $productos){ ?>
					<tr>
						<td align="center"><img src="<?php echo _DOMINIO."/images/".$productos['imagen']?>" width="100px"/></td>
						<td><?php echo utf8_encode($productos['titulo'])?></td>
						<td align="center"><?php echo $productos['cantidad']?></td>
						<td align="right">$<?php echo number_format(($productos['precio_normal']),0,",",".")?></td>
						<td align="right">$<?php echo number_format(($productos['precio_normal'] * $productos['cantidad']),0,",",".")?></td>
					</tr>
				<?php $suma += ($productos['precio_normal'] * $productos['cantidad']); } ?>
					<tr>
						<td colspan="4" align="right"><strong>TOTAL</strong></td>
						<td  align="right"><strong>$<?php echo number_format($suma,0,",",".") ?></strong></td>
					</tr>
				</table>
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