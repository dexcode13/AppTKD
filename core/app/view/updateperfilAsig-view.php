<?php

if(count($_POST)>0){
	$user = PerfilData::getByIdAsig($_POST["user_id"]);
	$user->id_usuario = $_POST["user_id"];
	$user->id_perfil = $_POST["perfil"];
	$user->updateAsig();

print "<script>window.location='index.php?view=asig_perfiles';</script>";


}


?>