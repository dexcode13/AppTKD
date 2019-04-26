<?php
/**
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Por medio de este archivo se pasan las variables del formulario para proceder hacer el registro en la tabla,
*creando un objeto de la clase y mandando a llamar la funcion de agregar para el registro
**/
$corte = AsistenciasData::getByMesPendienteTKD($_POST["sd"]);
$mes = $_POST["sd"];
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
$printer->text("\n");
#La fecha también
//$printer->text(date("Y-m-d H:i:s") . "\n");
//$printer->text("Corte del ".date("d")." de ".date("m")." del ".date("Y")."\n");
$printer->text("***TAEKWONDO***\n");
$printer->text("***Cuotas Pendientes de ".$msj."***\n");
$printer->text("\n");

//$total = 0;
foreach ($corte as $print) {
	//$total += $print->importe;
 
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text($print->rgi."\n");
	
 
    /*Y a la derecha para el importe*/
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
	//$printer->text(' $' . $print->importe . "\n");
	$printer->text($print->nombre."\n");
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
//$printer->text("--------\n");
//$printer->text("TOTAL: $". number_format($total,2,'.',',') ."\n");


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
Core::alert("Impresion de Pagos Pendientes Satisfactorio");
Core::redir("./index.php?view=RptPendientes");
	
}else{

	Core::alert("No hay Pagos Pendientes");
	print "<script>window.location='index.php?view=RptPendientes';</script>";
}
?>