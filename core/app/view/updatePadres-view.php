<?php

if(count($_POST)>0){
	/*$is_active=0;
	if(isset($_POST["status"]))
	{
		$is_active=1;
	}*/
	$tutor = AlumnosData::getByTutor($_POST["tutor_id"]);
	$tutor->tutor_id = $_POST["tutor_id"];
	$tutor->id_rgi = $_POST["id_rgi"];
	$tutor->nombre_p = $_POST["nombre_p"];
	$tutor->labor_p = $_POST["labor_p"];
	$tutor->telefono_p = $_POST["telefono_p"];
	$tutor->nombre_m = $_POST["nombre_m"];
	$tutor->labor_m = $_POST["labor_m"];
	$tutor->telefono_m = $_POST["telefono_m"];
	//$tutor->status = $is_active;
	//print_r ($tutor);
	$tutor->updateDatosPadres();

	/*if($_POST["password"]!=""){
		$tutor->password = sha1(md5($_POST["password"]));
		$tutor->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}*/
Core::alert("Datos de Padres Actualizados");
print "<script>window.location='index.php?view=editAlumno&id=$_POST[id_rgi]';</script>";


}


?>