<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat3();
	$user->tercero = $_POST["adulto"];
	$user->id_adult = $_POST["id_adul"];
	$user->updateHorarioAdul();
Core::alert("Horario Adulto Actualizado");
print "<script>window.location='index.php?view=configHorarioTKD';</script>";
}
?>