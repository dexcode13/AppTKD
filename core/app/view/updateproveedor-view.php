<?php

if(count($_POST)>0){
	$user = ProveedorData::getById($_POST["user_id"]);
	$user->name = $_POST["razon"];
	$user->rfc = $_POST["rfc"];
	$user->direccion = $_POST["direccion"];
	$user->cp = $_POST["cp"];
	$user->correo = $_POST["correo"];
	$user->telefono = $_POST["telefono"];
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=proveedores';</script>";


}


?>