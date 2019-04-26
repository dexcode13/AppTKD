<?php


if(Session::getUID()!=""){
	$user = UserData::getById(Session::getUID());
	$password = sha1(md5($_POST["password"]));
	if($password==$user->password){
		$user->password = sha1(md5($_POST["newpassword"]));
		$user->update_passwd();
		setcookie("password_updated","true");?>
		<script>
		alert("Su contraseña se ha cambiado satisfactoriamente.\n Cerraremos su sesión para iniciar\n con la nueva contraseña");
		</script>
		<?php
		print "<script>window.location='logout.php';</script>";
	}else{
		setcookie("password_not_updated","true");
		print "<script>window.location='index.php?view=configuration&msg=invalidpasswd';</script>";		
	}

}else {
		print "<script>window.location='index.php';</script>";
}


?>