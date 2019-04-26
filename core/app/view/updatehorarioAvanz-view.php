<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat6();
	$user->tercero = $_POST["avanz"];
	$user->id_avanz = $_POST["id_avanz"];
	$user->updateHorarioAvanz();
Core::alert("Horario Avanzado Actualizado");
print "<script>window.location='index.php?view=configHorarioGIM';</script>";
}
?>