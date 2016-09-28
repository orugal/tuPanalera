<?php 
session_start();
require("config/configuracion.php");
$_SESSION['confirma'] = $_GET;
echo "<script>document.location = '"._DOMINIO."confirmacion-pago'</script>";
?>