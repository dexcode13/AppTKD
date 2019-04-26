<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat2();
	$user->segundo = $_POST["juvenil"];
	$user->id_juv = $_POST["id_juv"];
	$user->updateHorarioJuv();
Core::alert("Horario Juvenil Actualizado");
print "<script>window.location='index.php?view=configHorarioTKD';</script>";


}


?>