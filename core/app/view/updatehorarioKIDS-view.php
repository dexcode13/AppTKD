<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat4();
	$user->primero = $_POST["kids"];
	$user->id_kids = $_POST["id_kids"];
	$user->updateHorarioKIDS();
Core::alert("Horario KIDS Actualizado");
print "<script>window.location='index.php?view=configHorarioGIM';</script>";


}


?>