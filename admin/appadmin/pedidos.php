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

$pedidosUsuario = $db->GetAll(sprintf("SELECT DISTINCT(c.id_pedido) as pedido,c.usuario_id,u.nombres,u.apellidos,u.direccion,u.telefono,u.celular,u.email 
										FROM carrito c 
										INNER JOIN usuarios u on u.idusuario=c.usuario_id
										INNER JOIN pedidos p on p.id_pedido=c.id_pedido
										WHERE p.refVenta != ''
										order by c.id_pedido DESC"));
$rellenos[1]	=	"Arequipe";
$rellenos[2]	=	"Chocolate";
$rellenos[3]	=	"Nutella";
$rellenos[4]	=	"Salsa de fresa";
$rellenos[5]	=	"Salsa de mora";
$rellenos[6]	=	"Salsa de piña";

?>

        <div class="row">


        <?php if(count($pedidosUsuario) > 0){ ?>
        	<?php $cont=1;foreach($pedidosUsuario as $ped)
        	{ 
        		$bg		 = (($cont%2) == 0)?"#f6f6f6":"#fff";
        		$dataPed = infoPedido($ped['pedido']);
        		$items	 = $funciones->getCar($ped['pedido']);
        		if ($dataPed[0]['estTrans'] == 4 ) {
						$estadoTx = "Transacción aprobada";
						$color    =  "text-success";
						$icon	  = "glyphicon glyphicon-ok";
					}

					else if ($dataPed[0]['estTrans'] == 6 ) {
					$estadoTx = "Transacción rechazada";
					$color    =  "text-danger";
						$icon	  = "glyphicon glyphicon-remove";
					}

					else if ($dataPed[0]['estTrans'] == 104 ) {
					$estadoTx = "Error";
					$color    =  "text-danger";
					$icon	  = "glyphicon glyphicon-remove";
					}

					else if ($dataPed[0]['estTrans'] == 7 ) {
					$estadoTx = "Transacción pendiente";
					$color    =  "text-warning";
					$icon	  = "glyphicon glyphicon-time";
					}

					else {
					$estadoTx="Sin definir";
					$color    =  "text-default";
					$icon	  = "glyphicon glyphicon-repeat";
					}

        		?>
       		  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="background: <?php echo $bg ?>">
       		  	<?php
						if (strtoupper($firma) == strtoupper($firmacreada)) {
						?>
							<h2>Pedido #<?php echo $ped['pedido']; ?></h2>
							<h3>Referencia: <?php echo $dataPed[0]['refVenta']; ?>. Transacción: <?php echo $dataPed[0]['resTrans']; ?></h3>
							<table class="table">
							<tr>
								<td>Estado de la transaccion</td>
								<td class="<?php echo $color ?>">
									<strong><?php echo $estadoTx; ?>
									<i class="<?php echo $icon ?>"></i></strong>
								</td>
							</tr>
							<tr>
								<td>Fecha</td>
								<td><?php echo $dataPed[0]['fecha']; ?></td>
							</tr>
							<tr>
								<td>Comprador</td>
								<td><?php echo ucwords($ped['nombres'])." ".ucwords($ped['apellidos']); ?></td>
							</tr>
							<tr>
								<td>Dirección</td>
								<td><?php echo $ped['direccion']; ?></td>
							</tr>
							<tr>
								<td>Teléfono</td>
								<td><?php echo $ped['telefono']; ?></td>
							</tr>
							<tr>
								<td>Celular</td>
								<td><?php echo $ped['celular']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $ped['email']; ?></td>
							</tr>
							<tr>
								<td>ID de la transaccion</td>
								<td style="word-wrap:break-word"><?php echo $dataPed[0]['idTrans']; ?></td>
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
							<tr >
								<td>Items comprados</td>
								<td>
									<table class="table">
											<tr>
												<th>CANT</th>
												<th>ITEM</th>
												<th>RELLENO</th>
												<th>COSTO UNI</th>
											</tr>
										<?php foreach($items as $ite){ ?>
											<tr>
												<td>
													<?php echo $ite['cantidad'] ?> 
												</td>
												<td>	
													<?php echo $ite['titulo'] ?>
												</td>
												<td>
													<?php if($ite['relleno_id'] != 0){ ?>
														<?php echo $rellenos[$ite['relleno_id']] ?>
													<?php }else{ ?>
													--------------
													<?php } ?>
												</td>
												<td>
													$<?php echo number_format($ite['precio_normal'],0,",",".") ?>
												</td>
											</tr>
										<?php } ?>
									</table>
								</td>
							</tr>
							<tr>
								<td>Entidad:</td>
								<td><?php echo ($dataPed[0]['entidad']); ?></td>
							</tr>
							</table>
							<hr>
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
       		  <?php $cont++;} ?>
       		  <?php }else{ ?>
       		  		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
       		  			Actualmente no tiene pedidos
       		  		</div>
       		  <?php } ?>
        </div>

