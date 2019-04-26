<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = BancoData::getById($_POST["id_banco"]);
	$user->name = $_POST["name"];
	$user->razon = $_POST["razon"];
	$user->is_active=$is_active;
	$user->update();

print "<script>window.location='index.php?view=bancos';</script>";


}


?>