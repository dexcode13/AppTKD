<?php

	//Incluimos la librería
	require_once 'html2pdf_v4.03/html2pdf.class.php';
	
	//Recogemos el contenido de la vista
	ob_start(); 
	require_once 'contenido_expediente.php';
	$html=ob_get_clean(); 

	//Pasamos esa vista a PDF
	
	//Le indicamos el tipo de hoja y la codificación de caracteres
	$mipdf=new HTML2PDF('P','letter','es','true','UTF-8');

	//Escribimos el contenido en el PDF
	$mipdf->writeHTML($html);

	//Generamos el acta Si en caso el cliente desea descargar el acta para guardar en un directorio especifico.
	$namePdf = "Expediente".date('dmy-His').".pdf";
	$mipdf->Output($namePdf);

?>
