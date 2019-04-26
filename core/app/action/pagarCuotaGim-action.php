<?php
$r = new AlumnosData();
$r->fecha_PagoCuota = $_POST["fecha"];
$r->matricula = $_POST["matricula"];
$r->id_cuota = $_POST["espe"];
$r->importe = $_POST["pago"];
$r->name = $_POST["nombre"];
$r->mes = $_POST["month"];
$year = date('ymdhis');
$r->folio = $year;
$r->updateCuotaGim();
//Core::alert("Cuota PAGADA satisfactoriamente");
//Core::redir("./index.php?view=cobrosCuotas&rgi=$_POST[id_rgi]");
//Core::redir("./index.php?view=listAlumnos");
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
class Producto{

	public function __construct($nombre, $precio, $cantidad){
		$this->nombre = $nombre;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
	}
}

/*
	Vamos a simular algunos productos. Estos
	podemos recuperarlos desde $_POST o desde
	cualquier entrada de datos. Yo los declararé
	aquí mismo
*/

$productos = array(
		new Producto("Mensualidad Junio", 250, 1),
		//new Producto("Pringles", 22, 2),
		/*
			El nombre del siguiente producto es largo
			para comprobar que la librería
			bajará el texto por nosotros en caso de
			que sea muy largo
		*/
		//new Producto("Galletas saladas con un sabor muy salado y un precio excelente", 10, 1.5),
	);

/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
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
	$newtext = wordwrap($r->name, 22, "\n");
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("FOLIO:".$r->folio. "\n");
	$printer->text("FECHA:".$r->fecha_PagoCuota. "\n");
	$printer->text("MATRICULA:".$r->matricula. "\n");
	$printer->text("ALUMNO:".$newtext."\n");
	$printer->text("MES:".$r->mes. "\n");
	$printer->text("IMPORTE:");
	//$printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
	//$printer->text("Vicente Jair Chan Marin");

    /*Y a la derecha para el importe*/
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text(' $' . $r->importe . "\n");
//}

/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("--------\n");
$printer->text("TOTAL: $". $r->importe ."\n");


/*
	Podemos poner también un pie de página
*/
$notificacion = "<strong>01 DE CADA MES FECHA DE PAGO</strong>";
$printer->setJustification(Printer::JUSTIFY_CENTER);
/*Generacion de Codigo de barras */
$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
//$printer->text("Height and bar width\n");
$printer->selectPrintMode();
$heights = array(1, 2, 4, 8, 16, 32);
$widths = array(1, 2, 3, 4, 5, 6, 7, 8);
//$printer -> text("Default look\n");
$printer->barcode($r->folio, Printer::BARCODE_ITF);
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
Core::alert("Cuota PAGADA satisfactoriamente");
Core::redir("./index.php?view=cobrosGim");
?>