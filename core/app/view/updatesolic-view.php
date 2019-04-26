<?php

if(count($_POST)>0){
	/*Inicio codigo para validar si es solo vales al actualizar*/
	$gas_e=$_POST["gasolina_efectivo"];
	$ali=$_POST["alimentacion"];
	$cas=$_POST["casetas"];
	$hos=$_POST["hospedaje"];

	$user = SolicitudData::getById($_POST["id_solicitud"]);
	if($gas_e==0 and $ali==0 and $cas==0 and $hos==0){
		$user->solovales=1;
	}
	else{
		$user->solovales=0;
	}
	/*Fin codigo solo vales*/
	/*Inicio codigo para actualizar fecha limite de comprobacion*/
	$fecha_retorno=$_POST['fec_ret'];
	$fechaInicial = strtotime($fecha_retorno); 
	$lapso          = 5; //  dias habiles  
	$diasTrans      = 0; // dias transcurridos  
	$diasHabiles    = 0;  
	//01 de mayo es 1-5 no 01-05
	$feriados       = array("15-8","01-05","18-05","02-11","25-12");  
	while($diasHabiles<($lapso+1))  
	{   $fecha      = $fechaInicial+($diasTrans*86400);   
		$diaSemana  = getdate($fecha);  
		if($diaSemana["wday"]!=0 && $diaSemana["wday"]!=6)  
		{   
			$feriado    = $diaSemana['mday']."-".$diaSemana['mon'];  
			if(!in_array($feriado,$feriados))  
			{   $diasHabiles++; }  
		}  
		$diasTrans++;  
	}  
	$fechaFinal     = $fechaInicial+(($diasTrans-1)*86400);   
	$date = date("Y-m-d",$fechaFinal);
	/*Fin fecha limite*/

	$user->concepto = $_POST["concepto"];
	$user->objetivo = $_POST["objetivo"];
	$user->lugar = $_POST["lugar"];
	$user->fec_sal = $_POST["fec_sal"];
	$user->fec_ret = $_POST["fec_ret"];
	$user->alimentacion = $_POST["alimentacion"];
	$user->hospedaje = $_POST["hospedaje"];
	$user->gasolina_vales = $_POST["gasolina_vales"];
	$user->gasolina_efectivo = $_POST["gasolina_efectivo"];
	$user->casetas = $_POST["casetas"];
	$user->fechalimite = $date;

	$user->updateSolicPen();

print "<script>window.location='index.php?view=solicitudes&op=all';</script>";


}


?>