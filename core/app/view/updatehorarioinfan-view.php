<?php

if(count($_POST)>0){
	$user = AlumnosData::getAllCat5();
	$user->segundo = $_POST["infan"];
	$user->id_infan = $_POST["id_infan"];
	$user->updateHorarioInfan();
Core::alert("Horario Infantil Actualizado");
print "<script>window.location='index.php?view=configHorarioGIM';</script>";


}


?>