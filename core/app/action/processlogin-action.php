<?php
/*
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo procesa la informacion del logueo, cargar los inputs de usuario y contraseña y es quien permite 
entrar o no al sistema
*/
// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");

if(Session::getUID()=="") {
$user = $_POST['username'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * 
 		from tusuarios 
		where (email= \"".$user."\" or username= \"".$user."\") and password= \"".$pass."\" and is_active=1";
//print $sql;
$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['id'];
}


if($found==true) {
	$fecha = date('d');
	$cuota = new AlumnosData();
	if($fecha>5){
		$cuota->updatePlanCuotas();
		$cuota->updatePlanCuotasGim();
	}
//	print $userid;
	$_SESSION['user_id']=$userid ;
//	setcookie('userid',$userid);
//	print $_SESSION['userid'];
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}
?>