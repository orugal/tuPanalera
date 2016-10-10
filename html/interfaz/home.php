<?php
global $id;
global $db;
global $funciones;
$quienes                    =   $funciones->infoId(13);

$destacados 				=  $db->GetAll(sprintf("SELECT * FROM principal WHERE destacado=1 AND tipo_contenido=10 AND eliminado=0 and visible=1"));
//var_dump($destacados);

include(_PLANTILLAS.'interfaz/home.html');
?>