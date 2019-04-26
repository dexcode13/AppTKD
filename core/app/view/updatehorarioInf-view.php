<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat1();
	$user->primero = $_POST["infantil"];
	$user->id_cat = $_POST["id_inf"];
	$user->updateHorarioInf();
Core::alert("Horario Infantil Actualizado");
print "<script>window.location='index.php?view=configHorarioTKD';</script>";


}


?>