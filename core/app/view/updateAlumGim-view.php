<?php

if(count($_POST)>0){
	/*$is_active=0;
	if(isset($_POST["status"]))
	{
		$is_active=1;
	}*/
	$user = AlumnosData::getByAlumnoGim($_POST["rgi"]);
	$user->rgi = $_POST["rgi"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->categoria = $_POST["categoria"];
	$user->direccion = $_POST["direccion"];
	$user->fec_nac = $_POST["fec_nac"];
	$user->colonia = $_POST["colonia"];
	$user->curp = $_POST["curp"];
	$user->cp = $_POST["cp"];
	$f = new Upload($_FILES["foto"]);
	$cc = new Upload($_FILES["foto"]);
			if($f->uploaded && $cc->uploaded){
				$f->file_new_name_body = $_POST["rgi"];
				$f->file_new_name_ext = 'png';
				$f->file_overwrite = true;
				$cc->file_new_name_body = $_POST["rgi"];
				$cc->file_new_name_ext = 'png';
				$cc->file_overwrite = true;
				//$perfil = $f->file_new_name_body;
				$f->Process("_assets/img/alumnos/");
				$cc->Process("../ChecadorGIM_Pro/_assets/img/alumnos/");
				if($f->processed){
					$user->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
				}
			}
			else{
				$user->foto = "_assets/img/alumnos/".$_POST['rgi'].".png";
			}
	//$user->status = $is_active;
	//print_r ($user);
	$user->updateDatosPersonalesGim();
	

	/*if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}*/
Core::alert("Datos Personales Actualizados");
print "<script>window.location='index.php?view=editAlumnoGim&id=$_POST[rgi]';</script>";


}


?>