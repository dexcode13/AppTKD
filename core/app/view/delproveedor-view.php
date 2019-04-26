<?php

$proveedor = ProveedorData::getById($_GET["id"]);
$proveedor->del();
Core::redir("./index.php?view=proveedores");

?>