<?php
if(count($_POST)>0){
	$user = AlumnosData::getByUpdateFaltas($_GET["id"]);
	$user->rgi = $_POST["rgi"];
	$user->fecha = $_POST["fecha"];
	$user->status = $_POST["status"];
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
	Core::alert("El alumno $user->nombre ha pagado su Mensualidad");
	print "<script>window.location='index.php?view=cobrosCuotas';</script>";
}
?>