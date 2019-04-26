<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"]))
	{
		$is_active=1;
	}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->id_tipo = $_POST["tipo"];
	$user->cuenta = $_POST["cuenta"];
	$user->id_banco = $_POST["banco"];
	$user->fecha_nac = $_POST["fec_nac"];
	$user->is_active=$is_active;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>