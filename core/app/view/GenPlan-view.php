<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/
	
	/*$x = AlumnosData::getByPlan();
	if(count($x)>0){
		Core::alert("Lo sentimos, ya existe un plan para el mes actual");
		print "<script>window.location='index.php?view=plan';</script>";
	}*/
	/*$fecha = date('d');
	if($fecha>=25 || $fecha<=31){
		Core::alert("Lo sentimos, ya existe un plan para el mes actual");
		print "<script>window.location='index.php?view=plan';</script>";
	}
	else{
		$plan = new AlumnosData();
		$plan->addPlanPagos();
		Core::alert("Plan de Pagos Generado");
		print "<script>window.location='index.php?view=plan';</script>";
	}*/
	$dia = date('d');
	$mes = date('m');
	//$fecha = 25;
	if($dia>=25 && $dia<=31){
		$plan = new AlumnosData();
		if ($mes==12) {
		$plan->addPlanPagosEnero();
		Core::alert("Plan Generado Satisfactorimante en dia $dia y mes $mes");
		print "<script>window.location='index.php?view=plan';</script>";
		} else {
		$plan->addPlanPagos();
		Core::alert("Plan Generado Satisfactorimante en dia $dia");
		print "<script>window.location='index.php?view=plan';</script>";
		}
	}
	else{
		Core::alert("Lo sentimos, ya existe un plan para el mes actual");
		print "<script>window.location='index.php?view=plan';</script>";
	}

?>

<!--<div class="alert alert-success">
    <strong>¡Usuario Registrado satisfactoriamente!</strong>  <a href="index.php?view=users" class="alert-link">Regresar al Módulo Usuarios</a>.
  </div>-->
