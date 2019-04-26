<?php
$r = new AlumnosData();
$r->ciclo = $_POST["ciclo"];
$r->rgi = $_POST["rgi"];
$r->id_alumno = $_POST["espe"];
$r->cuota = $_POST["month"];
$vencimiento = $r->ciclo."-".$r->cuota."-05";
$r->vencimiento = $vencimiento;
$r->CrearCuotaAdelantada();

Core::alert("Cuota Adelanta creada satisfactoriamente");
Core::redir("./index.php?view=cobrosMensuales");
?>