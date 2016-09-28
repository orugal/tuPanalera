<?php
/*
* Archivo de envio de mail con ajax y PHP usando phpmailer
* Hay que cambiar las variables de acuerdo al proyecto que se este usando.
* @author Farez Prieto
*/
require('config/configuracion.php');
require('core/phpmailer/class.phpmailer.php');
require('core/funciones.class.php');
$funciones = new Funciones();
extract($_POST);
$asuntoM			 =	'Contacto '._NOMBRE_EMPRESA;
$mensaje_armado	 =	'Se ha enviado un mensaje a trav&eacute;s de la p&aacute;gina web '._NOMBRE_EMPRESA.':<br><br><br>';
$mensaje_armado	.= '<b>Nombre:</b> '.$nombre.'<br>';
$mensaje_armado	.= '<b>Correo Electr&oacute;nico:</b> '.$mail.'<br>';
$mensaje_armado	.= '<b>Tel&eacute;fono:</b> '.$telefono.'<br>';
$mensaje_armado	.= '<b>Asunto:</b> '.htmlentities($asunto).'<br>';
$mensaje_armado	.= '<b>Mensaje:</b> '.htmlentities($mensaje).'<br>';

$envio			 =	$funciones->SendMAIL(_MAIL_ADMIN,$asuntoM,$mensaje_armado,'',$mail,_NOMBRE_EMPRESA);
$envio			 =	$funciones->SendMAIL("leshleedayhane@gmail.com",$asuntoM,$mensaje_armado,'',$mail,_NOMBRE_EMPRESA);
$envio			 =	$funciones->SendMAIL("kyo20052@gmail.com",$asuntoM,$mensaje_armado,'',$mail,_NOMBRE_EMPRESA);

if($envio == 1)
{
	$salida = array("mensaje"=>"Enviado con correctamente",
		            "continuar"=>1);
}
else
{
	$salida = array("mensaje"=>"Mensaje no pudo ser enviado",
		            "continuar"=>0);
}
echo json_encode($salida);
?>