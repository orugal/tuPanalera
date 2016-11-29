<?php 
session_start();

require("../../config/configuracion.php");
require("../../config/conexion_3.php");
global $db;
extract($_POST);
if($accion == 1)
{
	$url = str_replace("á","a",strtolower($texto));
	$url = str_replace("é","e",$url);
	$url = str_replace("í","i",$url);
	$url = str_replace("ó","o",$url);
	$url = str_replace("ú","u",$url);
	$url = str_replace("ñ","n",$url);
	$url = str_replace(" ","-",$url);
	$url = str_replace("_","-",$url);
	$url = str_replace(".","",$url);
	$url = str_replace(",","",$url);
	$url = str_replace("?","",$url);
	$url = str_replace("¿","",$url);
	$url = str_replace("!","",$url);
	$url = str_replace("¡","",$url);
	$url = str_replace("(","",$url);
	$url = str_replace(")","",$url);
	$url = str_replace("/","-",$url);
	$url = str_replace("'","",$url);
	$url = str_replace('"',"",$url);
	$url = str_replace('@',"",$url);
	$url = str_replace('#',"",$url);
	$url = str_replace('&',"",$url);
	$url = str_replace('=',"",$url);
	$url = str_replace('{',"",$url);
	$url = str_replace('}',"",$url);
	$url = str_replace('[',"",$url);
	$url = str_replace(']',"",$url);
	$url = str_replace('*',"",$url);
	$url = str_replace('|',"",$url);
	$url = str_replace('\/',"-",$url);
	$url = str_replace('$',"",$url);
	$url = str_replace(':',"",$url);
	$url = str_replace(';',"",$url);

	echo $url;
}
elseif($accion == 2)
{
	if($acc == "nueva")
	{
		$query = sprintf("INSERT INTO principal (titulo,precio_normal,precio_oferta,id_padre) VALUES('%s','%s','%s','%s')",
						$titulo,$costo,$costoo,$idPadre);
	}
	else if($acc=="edita")
	{
		$query = sprintf("UPDATE principal SET titulo='%s',precio_normal='%s',precio_oferta='%s' WHERE id=%s",
						$titulo,$costo,$costoo,$id);
	}
	$resultado = $db->Execute($query);

	if($resultado)
	{
		$salida = array("mensaje"=>"Las presentaciones se han agregado exitosamente",
						"continuar"=>1,
						"datos"=>array());
	}
	else
	{
		$salida = array("mensaje"=>"Las presentaciones se han agregado exitosamente",
						"continuar"=>0,
						"datos"=>array());
	}

	echo json_encode($salida);
}
elseif($accion == 3)
{
	$query = sprintf("DELETE  FROM principal WHERE id=%s",$id);
	$resultado = $db->Execute($query);
	if($resultado)
	{
		$salida = array("mensaje"=>"Las presentaciones se han agregado exitosamente",
						"continuar"=>1,
						"datos"=>array());
	}
	else
	{
		$salida = array("mensaje"=>"Las presentaciones se han agregado exitosamente",
						"continuar"=>0,
						"datos"=>array());
	}

	echo json_encode($salida);
}
?>