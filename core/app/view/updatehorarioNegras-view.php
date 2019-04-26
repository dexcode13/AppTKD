<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat7();
	$user->septimo = $_POST["negra"];
	$user->id_negra = $_POST["id_negra"];
	$user->updateHorarioNegras();
Core::alert("Horario Cintas Negras Actualizado");
print "<script>window.location='index.php?view=configHorarioTKD';</script>";
}
?>