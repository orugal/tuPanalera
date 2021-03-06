<?
/*
 * generador del formato en excel para cargar productos
 * @author Farez Jair Prieto Castro
 * @date  23 de Marzo de 2010
 * @version 1.0
*/
/* Incluye los archivos requeridos para conectarse a la base de datos */
require_once('../../config/configuracion.php');
require_once('../../config/conexion_3.php');
require_once('../../core/funciones.class.php');
global $db;
extract($_GET);
if(!empty($filtro))
{
	$query_exportar	=	$db->GetAll(sprintf("SELECT * FROM fiat WHERE  %s ORDER BY id ASC",base64_decode($filtro)));
}
else
{
	$query_exportar	=	$db->GetAll(sprintf("SELECT * FROM fiat ORDER BY id ASC"));
}
//var_dump($query_exportar);
//die(sprintf("SELECT * FROM ganadores_juego WHERE  %s ORDER BY nombre ASC",base64_decode($filtro)));
		$funciones	=	new Funciones();
		$tabla = "<table border='1'>";
		$tabla .= "<tr>";
		$tabla .= "<td><b>Cedula</b></td>";
		$tabla .= "<td><b>Nombres</b></td>";
		$tabla .= "<td><b>Correo</b></td>";
		$tabla .= "<td><b>Telefono</b></td>";
		$tabla .= "<td><b>Codigo</b></td>";
		$tabla .= "<td><b>Fecha Registro</b></td>";
		$tabla .= "<tr>";
		foreach($query_exportar as $datos)
		{
			if($datos['idusuario'] != 1)
			{
				$tabla .= "<tr>";
				$tabla .= "<td>".$datos['cedula']."</td>";
				$tabla .= "<td>".$datos['nombre']."</td>";
				$tabla .= "<td>".$datos['correo']."</td>";
				$tabla .= "<td>".$datos['telefono']."</td>";
				$tabla .= "<td>".$datos['codigo']."</td>";
				$tabla .= "<td>".$datos['fecha']."</td>";
				$tabla .= "</tr>";
			}
		}
		$tabla .= "</table>";
		header('Content-type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename=lista_participantes.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	    echo $tabla;
	    die();
?>