<?php
$r = new AlumnosData();
$r->fecha_PagoCuota = $_POST["fecha"];
$r->rgi = $_POST["rgi"];
$r->id_cuota = $_POST["espe"];
$r->importe = $_POST["pago"];
$r->name = $_POST["nombre"];
$r->mes = $_POST["month"];
$year = date('ydhms');
$r->folio = $year;
$r->updateCuota();
//Core::alert("Cuota PAGADA satisfactoriamente");
//Core::redir("./index.php?view=cobrosCuotas&rgi=$_POST[id_rgi]");
//Core::redir("./index.php?view=listAlumnos");
require_once 'html2pdf_v4.03/html2pdf.class.php';

	//Recogemos el contenido de la vista
	
	ob_end_clean(); //agregue esta linea para cuando salen errores y no genera nada, con esto
					//liberamos el buffer
	
									
	ob_start(); 
	
	require_once 'contenido_recibo.php';
	
	$html=ob_get_clean(); 
	
	//$html=str_replace('.png"','.jpg"',$html);
	//Pasamos esa vista a PDF
	
	//Le indicamos el tipo de hoja y la codificación de caracteres
	$mipdf=new HTML2PDF('P','letter','es','true','UTF-8');
	//
	
	//Escribimos el contenido en el PDF
	$mipdf->writeHTML($html);
	//var_dump($html);

	//Generamos el acta Si en caso el cliente desea descargar el acta para guardar en un directorio especifico.
	$namePdf = "Recibo".date('dmy-His').".pdf";
	$mipdf->Output($namePdf);
?>