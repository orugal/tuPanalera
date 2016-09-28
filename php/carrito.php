<?php
/*
 * Archivo que agrega al carrito de compras
 * @author Farez Jair Prieto Castro
 * @date 4 de marzo de 2016
 * @version 1.0
*/
ini_set("display_errors",0);
session_start();
//incluyo los archivos que me permitiran nconectarme a la base de datos
require_once('../config/configuracion.php');
require_once('../config/conexion_2.php');
require_once('../core/funciones.class.php');
$funciones = new funciones();
global $db;
extract($_POST);
$salida = array();
if(isset($accion))
{
	if($accion == 1)//agrega carrito
	{
		if(!isset($_SESSION['carrito']['pedido']))
		{
			//primero creo un código de pedido
			$pedido   =  $funciones->generaPedido();
			$_SESSION['carrito']['pedido'] = $pedido; 
		}
		else
		{	
			$pedido   = $_SESSION['carrito']['pedido'];
		}
		
		//agrego producto al carrito
		$addToCar = $funciones->agregaCarrito($idProducto,$cantidad,$pedido,$relleno);
	}
	elseif($accion == 2)//lee carrito
	{
		$carritoData = $funciones->getCar($_SESSION['carrito']['pedido']);
		//echo count($carritoData);
		if(isset($_SESSION['carrito']['pedido']))
		{
			if(count($carritoData) > 0)
			{
				$pintada  	 = "";
				foreach($carritoData as $car)
				{
					$cantVenta     =   ($car['canje'] == 0)?12:1;
					$pintada .= '<li class="message-preview text-left" ng-repeat="car in dataCarrito">
				                    <div class="media">
				                        <span class="pull-left">
				                            <img class="media-object" src="'._DOMINIO.'images/'.$car['imagen'].'" alt="" width="50px">
				                        </span>
				                        <div class="media-body">
				                            <h4 class="media-heading text-left"><strong>'.$car['titulo'].'</strong></h4>
				                            <h5 class="text-left" style="margin-bottom:0">Cantidad: '.$car['cantidad'].'</h5>
				                            <h5 class="text-left">Valor total: <i class="glyphicon glyphicon-usd  text-left"></i>'.number_format(($car['precio_normal'] * ($car['cantidad'] / $cantVenta )),0,",",".").'</h5>
				                           <!-- <p style="padding-top: 0;margin:0" class=" text-left small text-muted"><i class="glyphicon glyphicon-usd  text-left"></i> '.number_format($car['precio_normal'],0,",",".").'</p>-->
				                            <p style="padding-top: 0;margin:0" class=" text-left"></p>
				                        </div>
				                    </div>
				                </li>';
				}
				

	            $pintada .= '<a href="'._DOMINIO.'carrito" class="btn btn-skin btn-block btnIrCarro">Ir al carrito</a>';

				$salida = array("mensaje"=>"Carrito con productos.",
						"datos"=>$pintada,
						"continuar"=>0);
			}
			else
			{
				$pintada  	 = "";
				$pintada .= '<li class="message-preview text-center" style="width: 100%">
				                   <i class="glyphicon glyphicon-shopping-cart  text-left"></i> No hay productos en el carrito</p>
				                </li>';

				$salida = array("mensaje"=>"No hay productos agregados al carrito.",
						"datos"=>$pintada,
						"continuar"=>0);
			}
		}
		else
		{
			$pintada  	 = "";
				$pintada .= '<li class="message-preview text-left" ng-repeat="car in dataCarrito">
				                    <div class="media">
				                        <div class="media-body">
				                           <p style="padding-top: 0;margin:0" class=" text-left small text-muted"><i class="glyphicon glyphicon-shopping-cart  text-left"></i> No hay productos en el carrito</p>
				                        </div>
				                    </div>
				                </li>';

				$salida = array("mensaje"=>"No hay productos agregados al carrito.",
						"datos"=>$pintada,
						"continuar"=>0);
		}
		
	}
	elseif($accion == 3)//registro
	{
		$ruta        = "home";
		//primero verifico que el correo no este registrado ya
		$verifica = sprintf("SELECT * FROM usuarios WHERE email='%s' AND eliminado=0",$email);
		$rVerifica= $db->GetAll($verifica);
		if(count($rVerifica) > 0)//ya existe
		{
			$salida = array("mensaje"=>"El correo ingresado ya existe en nuestra base de datos. Por favor intente registrar otro.",
					"datos"=>array(),
					"continuar"=>0);
		}
		else //no existe
		{
			//procedo a insertar
			$queryInsert = sprintf("INSERT INTO usuarios (username,nombres,apellidos,email,contrasena) VALUES('%s','%s','%s','%s','%s')",
									$email,$nombre,$apellido,$email,sha1($rclave));
			$rInserta    = $db->Execute($queryInsert);
			$ultimoInsert = $db->Insert_ID();
			if($rInserta)
			{
				//ahora debo añadir el pedido actual en sessión al usuario registrado
				if(isset($_SESSION['carrito']['pedido']))
				{
					$queryUpdate = sprintf("UPDATE carrito SET usuario_id=%s WHERE id_pedido=%s",$ultimoInsert,$_SESSION['carrito']['pedido']);
					$rUpdate 	 = $db->Execute($queryUpdate);
					$ruta        = "carrito";
				}
				else
				{

					$ruta        = "home";
				}
				//agrego la ssessión de la persona
				$querySession	=	$db->GetAll(sprintf("SELECT * FROM usuarios WHERE idusuario=%s",$ultimoInsert));
				$_SESSION['carrito']['persona'] = $querySession[0];
				$salida = array("mensaje"=>"Tus datos han sido registrados con éxito.",
					            "datos"=>array(),
					            "ruta"=>$ruta,
					            "continuar"=>1);
			}
		}
	}
	elseif($accion == 4)//Acceso al sistema
	{
		$ruta        = "home";
		$querySession	=	$db->GetAll(sprintf("SELECT * FROM usuarios WHERE username='%s' AND contrasena=sha1('%s')",$usuario,$lclave));
		if(count($querySession) > 0)
		{
			//ahora debo añadir el pedido actual en sessión al usuario registrado
			if(isset($_SESSION['carrito']['pedido']))
			{
				$queryUpdate = sprintf("UPDATE carrito SET usuario_id=%s WHERE id_pedido=%s",$querySession[0]['idusuario'],$_SESSION['carrito']['pedido']);
				$rUpdate 	 = $db->Execute($queryUpdate);
				$ruta        = "carrito";
			}
			else
			{

				$ruta        = "home";
			}
			$_SESSION['carrito']['persona'] = $querySession[0];
			$salida = array("mensaje"=>"Bienvenido al sistema ".$querySession[0]['nombres']." ".$querySession[0]['apellidos'],
			            "datos"=>array(),
			            "ruta"=>$ruta,
			            "continuar"=>1);
		}
		else
		{
			$salida = array("mensaje"=>"Es probable que el usuario o contraseña ingresados no sean correctos, por favor verifique.",
			            "datos"=>array(),
			            "ruta"=>$ruta,
			            "continuar"=>0);
		}
		
	}
	elseif($accion == 5)//Elimina Item
	{
		$query = sprintf("DELETE FROM carrito WHERE id_compra=%s",$id_compra);
		$result = $db->Execute($query);
		if($result)
		{
			$salida = array("mensaje"=>"El item ha sido eliminado del carrito exitosamente.",
					"datos"=>array(),
					"continuar"=>1);
		}
		else
		{
			$salida = array("mensaje"=>"El item no pudo ser eliminado del carrito.",
					"datos"=>array(),
					"continuar"=>0);
		}
	}
	elseif($accion == 6)//actualiza contacto
	{
		$query = sprintf("UPDATE usuarios SET direccion='%s', telefono='%s',celular='%s' WHERE idusuario=%s",$direccion,$telefono,$celular,$_SESSION['carrito']['persona']['idusuario']);
		//echo $query;
		$result = $db->Execute($query);
		if($result)
		{
			$_SESSION['carrito']['persona']['direccion'] = $direccion;
			$_SESSION['carrito']['persona']['telefono'] = $telefono;
			$_SESSION['carrito']['persona']['celular'] = $celular;
			$salida = array("mensaje"=>"Datos actualiados.",
					"datos"=>array(),
					"continuar"=>1);
		}
		else
		{
			$salida = array("mensaje"=>"Los datos no pudieron ser actualizados.",
					"datos"=>array(),
					"continuar"=>0);
		}
	}
	else
	{
		$salida = array("mensaje"=>"Error interno, opcion no valida, intente de nuevo más tarde.",
					"datos"=>array(),
					"continuar"=>0);
	}
}
else
{
	$salida = array("mensaje"=>"Parece que no tiene acceso a esta Zona",
					"datos"=>array(),
					"continuar"=>0);
}

echo json_encode($salida);
?>