<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = DepartamentoData::getById($_POST["id_departamento"]);
	$user->name = $_POST["name"];
	$user->descripcion = $_POST["descripcion"];
	$user->is_active=$is_active;
	$user->gerente = $_POST["gerente"];
	$user->update();

print "<script>window.location='index.php?view=departamentos';</script>";


}


?>