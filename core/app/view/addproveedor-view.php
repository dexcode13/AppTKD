<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$user = new ProveedorData();
	$user->name = $_POST["razon"];
	$user->rfc = $_POST["rfc"];
	$user->direccion = $_POST["direccion"];
	$user->cp = $_POST["cp"];
	$user->correo = $_POST["correo"];
	$user->telefono = $_POST["telefono"];
	$user->add();

print "<script>window.location='index.php?view=proveedores';</script>";


}


?>