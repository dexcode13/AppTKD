<?php


$r = new AlumnosData();
$r->fecha_PagoCuota = $_POST["fecha"];
$r->rgi = $_POST["rgi"];
$r->id_cuota = $_POST["espe"];
$r->importe = $_POST["pago"];
$r->name = $_POST["nombre"];
$r->mes = $_POST["month"];
$year = date('ymdhis');
$r->folio = $year;
$r->updateCuota();
require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
		use Mike42\Escpos\Printer;
		use Mike42\Escpos\EscposImage;
		use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
//Core::alert("Cuota PAGADA satisfactoriamente");
//Core::redir("./index.php?view=cobrosCuotas&rgi=$_POST[id_rgi]");
//Core::redir("./index.php?view=listAlumnos");
/**/
if ($r->mes=="Septiembre" || $r->mes=="Octubre" || $r->mes=="Noviembre" || $r->mes=="Diciembre") {
	Core::alert("Cuota PAGADA SIN RECIBO");
Core::redir("./index.php?view=cobrosMensuales");
} else {
	
	
	
	class Producto{
	
		public function __construct($nombre, $precio, $cantidad){
			$this->nombre = $nombre;
			$this->precio = $precio;
			$this->cantidad = $cantidad;
		}
	}
	
	
	
	$productos = array(
			new Producto("Mensualidad Junio", 250, 1),
			
		);
	
	
	
	$nombre_impresora = "POS-58"; 
	
	
	$connector = new WindowsPrintConnector($nombre_impresora);
	$printer = new Printer($connector);
	
	
	
	
	# Vamos a alinear al centro lo próximo que imprimamos
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	
	
	try{
		$logo = EscposImage::load("./vikingos.jpg", false);
		$printer->bitImage($logo);
	}catch(Exception $e){
	}
	
	
	$printer->text("\n");
	$printer->text("CENTRO DEPORTIVO DE TAE KWON DO A.C.". "\n");
	$printer->text("ACADEMIA HERMANOS MARÍN" . "\n");
	$printer->text("AV. GOBERNADORES N°66 FRENTE AL PARQUE DE LAS PALOMAS" . "\n");
	$printer->text("Cel. 981 131 46 99" . "\n");
	$printer->text("Correo: emarinhtkd@hotmail.com" . "\n");
	
	#La fecha también
	$printer->text(date("Y-m-d H:i:s") . "\n");
	
	$printer->text("\n");
	
	
	
	
	# Para mostrar el total
	
		$newtext = wordwrap($r->name, 22, "\n");
		$printer->setJustification(Printer::JUSTIFY_LEFT);
		$printer->text("FOLIO:".$r->folio. "\n");
		$printer->text("FECHA:".$r->fecha_PagoCuota. "\n");
		$printer->text("RGI:".$r->rgi. "\n");
		$printer->text("ALUMNO:".$newtext."\n");
		$printer->text("Mes:".$r->mes. "\n");
		$printer->text("Importe:");
		//$printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
		//$printer->text("Vicente Jair Chan Marin");
	
		
		$printer->setJustification(Printer::JUSTIFY_RIGHT);
		$printer->text(' $' . $r->importe . "\n");
	//}
	
	
	$printer->text("--------\n");
	$printer->text("TOTAL: $". $r->importe ."\n");
	
	
	
	$notificacion = "<strong>01 DE CADA MES FECHA DE PAGO</strong>";
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	
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
	
	
	
	
	$printer->feed(3);
	
	
	$printer->cut();
	
	
	$printer->pulse();
	
	
	$printer->close();
	Core::alert("Cuota PAGADA satisfactoriamente");
Core::redir("./index.php?view=cobrosMensuales");
}


?>