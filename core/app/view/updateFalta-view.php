<?php
if(count($_POST)>0){
	$user = AlumnosData::getByUpdateFaltas($_POST["rgi"]);
	$user->id_asistencia = $_POST["id_asistencia"];
	$user->rgi = $_POST["rgi"];
	$user->id_alumno = $_POST["id_alumno"];
	$user->fecha = $_POST["fecha"];
	$user->status = $_POST["status"];
	$user->observacion = $_POST["observacion"];
	$cat1='18:00:00';
	$cat2='19:00:00';
	$cat3='20:00:00';
	if ($user->id_categoria==1) {
		$user->hora = $cat1;
	} else if($user->id_categoria==2) {
		$user->hora = $cat2;
	}else{
		$user->hora = $cat3;
	}
	$user->updateFalta();
	$user->addJustificacion();
	Core::alert("El alumno $user->nombre ha sido justificado su falta");
	print "<script>window.location='index.php?view=justificarFaltasTKD';</script>";
}
?>