<?php

if(count($_POST)>0){
	$user = new AlumnosData();
	//$user = AlumnosData::getByAlumno($_POST["rgi"]);
	$user->rgi = $_POST["rgi"];
	$user->id_alumno = $_POST["id_alumno"];
	$user->fecha_exa_ant = $_POST["fecha_exa_ant"];
	$user->grado_cinta_actual = $_POST["grado_cinta_actual"];
	$user->fecha_exa = $_POST["fecha_exa"];
	$user->grado_cinta_apasar = $_POST["grado_cinta_apasar"];
	//print_r ($user);
	$user->addExamen();
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
	
//Core::alert("Datos del Exámen Guardado");
//print "<script>window.location='index.php?view=examen&id=$_POST[rgi]';</script>";


}


?>