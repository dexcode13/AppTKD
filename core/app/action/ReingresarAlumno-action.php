<?php
$r = new AlumnosData();
$r->rgi = $_POST["rgi"];
$r->ReingresarAlumno();
/*Core::alert("Alumno Reingresado satisfactoriamente");
Core::redir("./index.php?view=alumnosInactivos");*/
?>
	<script>
			swal("No hay Registros!", "No hay registros de pagos en este día", "warning",{
  button: "Aww yiss!"
})
			.then(willRedirect => {
			if (willRedirect) {
				window.location.href = "index.php?view=alumnosInactivos";
			}
			})
			
	</script>