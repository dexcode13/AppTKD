<?php
if(count($_POST)>0){
	$user = AlumnosData::getByUpdateFaltas($_POST["rgi"]);
	$user->id_asistencia = $_POST["id_asistencia"];
	$user->rgi = $_POST["rgi"];
	$user->id_alumno = $_POST["id_alumno"];
	$user->fecha = $_POST["fecha"];
	$user->status = $_POST["status"];
	$user->observacion = $_POST["observacion"];
	$cat4='17:00:00';
	$cat5='18:00:00';
	$cat6='19:30:00';
	if ($user->id_categoria==4) {
		$user->hora = $cat4;
	} else if($user->id_categoria==5) {
		$user->hora = $cat5;
	}else{
		$user->hora = $cat6;
	}
	$user->updateFalta();
	$user->addJustificacion();
	Core::alert("El alumno $user->nombre ha sido justificado su falta");
	print "<script>window.location='index.php?view=justificarFaltasGIM';</script>";
}
?>