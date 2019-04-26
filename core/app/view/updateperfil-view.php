<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = PerfilData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->diasmax = $_POST["dias"];
	$user->montomax = $_POST["monto"];
	$user->is_active=$is_active;
	$user->update();

print "<script>window.location='index.php?view=perfiles';</script>";


}


?>