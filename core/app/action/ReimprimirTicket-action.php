<?php
	$user = AlumnosData::getByCuotaImpre($_GET["id"]);
	require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

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
$printer->text("\n");
$printer->text("CENTRO DEPORTIVO DE TAE KWON DO A.C.". "\n");
$printer->text("ACADEMIA HERMANOS MARÍN" . "\n");
$printer->text("AV. GOBERNADORES N°66 FRENTE AL PARQUE DE LAS PALOMAS" . "\n");
$printer->text("Cel. 981 131 46 99" . "\n");
$printer->text("Correo: emarinhtkd@hotmail.com" . "\n");

#La fecha también
$printer->text(date("Y-m-d H:i:s") . "\n");
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
	if ($user->cuota==1) {
		 $mes = "Enero";
		} else if ($user->cuota==2) {
		 $mes = "Febrero";
		} else if ($user->cuota==3) {
		 $mes = "Marzo";
		} else if ($user->cuota==4) {
		 $mes = "Abril";
		} else if ($user->cuota==5) {
		 $mes = "Mayo";
		} else if ($user->cuota==6) {
		 $mes = "Junio";
		} else if ($user->cuota==7) {
		 $mes = "Julio";
		} else if ($user->cuota==8) {
		 $mes = "Agosto";
		} else if ($user->cuota==9) {
		 $mes = "Septiembre";
		} else if ($user->cuota==10) {
		 $mes = "Octubre";
		} else if ($user->cuota==11) {
		 $mes = "Noviembre";
		}else{
		 $mes = "Diciembre";
		}
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("FOLIO:".$user->folio_recibo. "\n");
	$printer->text("FECHA:".$user->fecha_pago. "\n");
	$printer->text("RGI:".$user->rgi. "\n");
	$printer->text("ALUMNO:".$user->nombre."\n");
	$printer->text($user->apellido."\n");
	$printer->text("MES:".$mes. "\n");
	$printer->text("Importe:");
	//$printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
	//$printer->text("Vicente Jair Chan Marin");

    /*Y a la derecha para el importe*/
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text(' $' . $user->importe . "\n");
//}

/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("--------\n");
$printer->text("TOTAL: $". $user->importe ."\n");


/*
	Podemos poner también un pie de página
*/

$printer->setJustification(Printer::JUSTIFY_CENTER);
/*Generacion de Codigo de barras */
$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
//$printer->text("Height and bar width\n");
$printer->selectPrintMode();
$heights = array(1, 2, 4, 8, 16, 32);
$widths = array(1, 2, 3, 4, 5, 6, 7, 8);
//$printer -> text("Default look\n");
$printer->barcode($user->folio_recibo, Printer::BARCODE_ITF);
$printer->text("REIMPRESIÓN\n");
$printer->text("-------------\n");
$printer->text("Gracias por su pago\n***COPIA DEL CLIENTE***");
$printer->text("\n");
$printer->text("FECHA DE PAGO EL DIA\n");
$printer->text("01 DE CADA MES\n");



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
	Core::alert("Reimpresion de Recibo Satisfactorio");
	Core::redir("./index.php?view=ReimpresionesCuotas");




?>