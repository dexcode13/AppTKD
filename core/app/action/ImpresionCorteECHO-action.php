<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/
	
$corte = AlumnosData::getCortePrint();
require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
if(count($corte)>0){

$total = 0;
$row = 0;
foreach ($corte as $print) {
	
	if ($print->cuota==1) {
		$cuota = "ENE";
	} else if ($print->cuota==2) {
		$cuota = "FEB";
	}else if ($print->cuota==3) {
		$cuota = "MAR";
	} else if ($print->cuota==4) {
		$cuota = "ABR";
	} else if ($print->cuota==5) {
		$cuota = "MAY";
	} else if ($print->cuota==6) {
		$cuota = "JUN";
	}else if ($print->cuota==7) {
		$cuota = "JUL";
	}else if ($print->cuota==8) {
		$cuota = "AGO";
	}else if ($print->cuota==9) {
		$cuota = "SEPT";
	} else if ($print->cuota==10) {
		$cuota = "OCT";
	}else if ($print->cuota==11) {
		$cuota = "NOV";
	} else if ($print->cuota==12){
		$cuota = "DIC";
	}else{
		$cuota = "";
	}
	$gim = 125;
	
	
	if ($print->cobro=="GIM" && $print->importe>0) {
		$row += 1;
	echo $print->concepto." $print->cobro"." $cuota"." $ $gim"."\n";
	echo "<br>";
	} else {
		echo $print->concepto." $print->cobro"." $cuota"." $ $print->importe"."\n";
		$total += $print->importe;
	echo "<br>";

	}
	
	if ($print->cobro=="COBRO GRAL") {
		echo $print->apellido."\n";
	echo "<br>";

		} else {
			echo $print->n1." $print->apellido"."\n";
	echo "<br>";

		}
	echo "--------------------------------\n";
	echo "<br>";

}




//echo "$row Registros\n";
echo "<br>";
$fin = $row * $gim;
$t = $total + $fin;

echo "TOTAL: $". number_format($t,2,'.',',') ."\n";

//Core::alert("Impresion de Corte Satisfactorio");
//Core::redir("./index.php?view=CortePagos");
	
}else{
	?>
	<script>
			swal("¡Exitoso!", "No hay registros de pagos en este día", "warning",{
  button: "Aww yiss!"
})
			.then(willRedirect => {
			if (willRedirect) {
				window.location.href = "index.php?view=CortePagos";
			}
			})
			
	</script>
	<?php

	//Core::alert("No hay registros de pagos en este día");
	//print "<script>window.location='index.php?view=CortePagos';</script>";
}
?>