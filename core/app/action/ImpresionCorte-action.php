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
	/*
Este ejemplo imprime un
ticket de venta desde una impresora térmica
*/


/*
Una pequeña clase para
trabajar mejor con
los productos
Nota: esta clase no es requerida, puedes
imprimir usando puro texto de la forma
que tú quieras
*/

$nombre_impresora = "POS-58"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);


/*
Vamos a imprimir un logotipo
opcional. Recuerda que esto
no funcionará en todas las
impresoras

Pequeña nota: Es recomendable que la imagen no sea
transparente (aunque sea png hay que quitar el canal alfa)
y que tenga una resolución baja. En mi caso
la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
Intentaremos cargar e imprimir
el logo
*/
try{
$logo = EscposImage::load("./vikingos.jpg", false);
$printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
Ahora vamos a imprimir un encabezado
*/
$mes = date("m");
if ($mes==1) {
	$msj = "Enero";
} else if ($mes==2) {
	$msj = "Febrero";
}else if ($mes==3) {
	$msj = "Marzo";
} else if ($mes==4) {
	$msj = "Abril";
} else if ($mes==5) {
	$msj = "Mayo";
} else if ($mes==6) {
	$msj = "Junio";
}else if ($mes==7) {
	$msj = "Julio";
}else if ($mes==8) {
	$msj = "Agosto";
}else if ($mes==9) {
	$msj = "Septiembre";
} else if ($mes==10) {
	$msj = "Octubre";
}else if ($mes==11) {
	$msj = "Noviembre";
} else {
	$msj = "Diciembre";
}


$printer->text("\n");
$printer->text("CENTRO DEPORTIVO DE TAE KWON DO A.C.". "\n");
$printer->text("ACADEMIA HERMANOS MARÍN" . "\n");
$printer->text("AV. GOBERNADORES N°66 FRENTE AL PARQUE DE LAS PALOMAS" . "\n");
$printer->text("Cel. 981 131 46 99" . "\n");
$printer->text("Correo: emarinhtkd@hotmail.com" . "\n");
$printer->text("\n");
#La fecha también
//$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("***Corte de Caja***\n");
$printer->text(date("d")." de ".$msj." del ".date("Y")."\n");

$printer->text("\n");

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
	
	//$total += $print->importe;
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	if ($print->cobro=="GIM" && $print->importe>0) {
		$row += 1;
	$printer->text($print->concepto." $print->cobro"." $cuota"." $ $gim"."\n");
	} else {
		
		$printer->text($print->concepto." $print->cobro"." $cuota"." $ $print->importe"."\n");
		$total += $print->importe;
	}
	//$printer->text(."\n");
	//$printer->text(."\n");
	if ($print->cobro=="COBRO GRAL") {
		$printer->text($print->apellido."\n");
		} else {
			$printer->text($print->n1." $print->apellido"."\n");
		}
	$printer->text("--------------------------------\n");
}

/*$printer->text($r->folio);
$printer->text($r->rgi);*/
$printer->text("\n");


/*
Ahora vamos a imprimir los
productos
*/

# Para mostrar el total
/*$total = 0;
foreach ($productos as $producto) {
$total += $producto->cantidad * $producto->precio;*/

/*Alinear a la izquierda para la cantidad y el nombre*/


//$printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
//$printer->text("Vicente Jair Chan Marin");

/*Y a la derecha para el importe*/
$printer->setJustification(Printer::JUSTIFY_RIGHT);
//}

/*
Terminamos de imprimir
los productos, ahora va el total
*/
$fin = $row * $gim;
$t = $total + $fin;
$printer->text("-------\n");
$printer->text("TOTAL: $". number_format($t,2,'.',',') ."\n");


/*
Podemos poner también un pie de página
*/
/*$printer->text("-------------\n");
$printer->text("Gracias por su pago\n***COPIA DEL CLIENTE***");
$printer->text("\n");
$printer->text("FECHA DE PAGO EL DIA\n");
$printer->text("01 DE CADA MES\n");*/



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
Cortamos el papel. Si nuestra impresora
no tiene soporte para ello, no generará
ningún error
*/
$printer->cut();

/*
Por medio de la impresora mandamos un pulso.
Esto es útil cuando la tenemos conectada
por ejemplo a un cajón
*/
$printer->pulse();

/*
Para imprimir realmente, tenemos que "cerrar"
la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
Core::alert("Impresion de Corte Satisfactorio");
Core::redir("./index.php?view=CortePagos");
	
}else{

	Core::alert("No hay registros de pagos en este día");
	print "<script>window.location='index.php?view=CortePagos';</script>";
}
?>