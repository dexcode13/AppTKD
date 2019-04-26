<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/
	
	/*$x = AlumnosData::getByPlanGim();
	if(count($x)>0){
		Core::alert("Lo sentimos, ya existe un plan para el mes actual");
		print "<script>window.location='index.php?view=planGim';</script>";
	}*/
	$fecha = date('d');
	if($fecha>=25 || $fecha<=31){
		Core::alert("Lo sentimos, ya existe un plan para el mes actual");
		print "<script>window.location='index.php?view=planGim';</script>";
	}
	else{
		$plan = new AlumnosData();
		$plan->addPlanPagosGim();
		Core::alert("Plan Gimnasia de Pagos Generado");
		print "<script>window.location='index.php?view=planGim';</script>";
	}
?>

<!--<div class="alert alert-success">
    <strong>¡Usuario Registrado satisfactoriamente!</strong>  <a href="index.php?view=users" class="alert-link">Regresar al Módulo Usuarios</a>.
  </div>-->
