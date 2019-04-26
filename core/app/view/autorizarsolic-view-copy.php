<?php
if(count($_POST)>0){
	$user = SolicitudData::getById($_POST["id_solicitud"]);
	$user->status = $_POST["kind"];
	$user->observacion=$_POST["observacion"];
	$user->updateSolic();
	include ("sendmail.php");
	/*$para=$user->email;
	/*$para  = 'ihernandez@mejorafinanzas.com.mx';/* . ', ';
	$para .= ' '.$user->email.' ';*/
			
			/*$titulo = 'Solicitud: '.$user->id_solicitud.'';
			
			$mensaje ='<!DOCTYPE html>
						<html>
						<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
						<style type="text/css">
						.tit {
							font-family: Verdana, Arial, Helvetica, sans-serif;
							font-size: 9px;
							color: #FFFFFF;
						}
						.prod {
							font-family: Verdana, Arial, Helvetica, sans-serif;
							font-size: 9px;
							color: #333333;
						}
						h1 {
							font-family: Verdana, Arial, Helvetica, sans-serif;
							font-size: 20px;
							color: #990000;
						}
						</style>
						<title>Comisión</title>
						</head>
						<body>
							<div align="center">
							<h1>Agrofinanciera DG SAPI de CV SOFOM ENR</h1>
							<table rules="all" style="border-color: #666;" cellpadding="10">
								<tr  style="background: #eee;">
									<td><strong># de Solicitud:</strong></td> 
									<td>'.$user->id_solicitud.'</td>
								</tr>
								<tr  style="background: #eee;">
									<td><strong>Fecha solicitud:</strong></td> 
									<td>'.$user->fecha_solic.'</td>
								</tr>
								<tr  style="background: #eee;">
									<td><strong>Comisionado:</strong></td> 
									<td>'.$user->name.' '.$user->lastname.'</td>
								</tr>
								<tr style="background: #eee;">	
									<td><strong>Concepto:</strong></td> 
									<td>'.$user->concepto.'</td>
								</tr>
								<tr style="background: #eee;">	
									<td><strong>Objetivo de la Solicitud:</strong></td>
									<td>'.$user->objetivo.'</td>
								</tr>
								<tr style="background: #eee;">	
									<td><strong>Total:<strong></td> 
									<td>$ '.$user->total.'</td>
								</tr>
							</table>';
		
									
							
					$mensaje .='</body>
							</html>';
							
							// Cabecera que especifica que es un HMTL
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					 
					// Cabeceras adicionales
					//$cabeceras .= 'From:'.$user->name.' '.$user->lastname.' <'.$user->email.'>' . "\r\n";
					$cabeceras .= 'From: Ruben Dimas <rdimas@mejorafinanzas.com.mx>' . "\r\n";
					$cabeceras .= 'Cc: ighd13@gmail.com' . "\r\n";
					//$cabeceras .= 'Bcc: copiaoculta@example.com' . "\r\n";
					 
					// enviamos el correo!
					mail($para, $titulo, $mensaje, $cabeceras);*/

print "<script>window.location='index.php?view=solicitudes&op=all';</script>";


}


?>