<?php

if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["status"]))
	{
		$is_active=1;
	}
	$user = AlumnosData::getByAlumno($_POST["user_id"]);
	$user->rgi = $_POST["user_id"];
	$user->motivo = $_POST["motivo"];
	$user->status = $is_active;
	//print_r ($user);
	$user->bajaAlumno();
//Core::alert("El alumno $user->nombre $user->apellido ha sido dado de baja");
//print "<script>window.location='index.php?view=editAlumno&id=$_POST[user_id]';</script>";
}
?>
<script>
			swal("¡Exitoso!", "El alumno <?php echo $user->nombre." ".$user->apellido;?> ha sido dado de baja", "success",{
  button: "Aww yiss!"
})
			.then(willRedirect => {
			if (willRedirect) {
				window.location.href = "index.php?view=editAlumno&id=<?php echo $user->rgi;?>";
			}
			})
</script>
<?php
//print "<script>window.location='index.php?view=editAlumno&id=$_POST[user_id]';</script>";
?>