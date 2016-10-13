<?
global $funciones;
global $core;
global $id;
global $migas;
$infoId	=	$core->info_id;
$resursiva 	=	$funciones->BusquedaRecursiva($id,array());
include(_PLANTILLAS.'interfaz/default.html');
?>