<?php

if(count($_POST)>0){
	$user = SolicitudData::getById($_POST["id_solicitud"]);
	$user->pago = $_POST["pago"];
	$user->updateSolicPago();
	function sendmail($setFromEmail,$setFromName,$addReplyToEmail,$addReplyToName,$addAddressEmail,$addAddressName,$subject,$template){
	require 'class.phpmailer.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	// Set PHPMailer to use the sendmail transport
	$mail->isSendmail();
	//Establecer desde donde será enviado el correo electronico
	$mail->setFrom($setFromEmail, $setFromName);
	//Establecer una direccion de correo electronico alternativa para responder
	$mail->addReplyTo($addReplyToEmail, $addReplyToName);
	//Establecer a quien será enviado el correo electronico
	$mail->addAddress($addAddressEmail, $addAddressName);
	//Establecer el asunto del mensaje
	$mail->Subject = $subject;
	//convertir HTML dentro del cuerpo del mensaje
	//$mail->Body($template);
	//$mail->IsHTML(true);
	$mail->msgHTML(file_get_contents($template));
		//send the message, check for errors
	$mail->send();
	/*if (!$mail->send()) {
		echo "Error al enviar mensaje: " . $mail->ErrorInfo;
	} else {
		echo "Mensaje enviado!";
	}*/
}
//sendmail('jalvarez@mejorafinanzas.com.mx','Ing. Jose Luis Alvarez Valtierra','ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->email,$user->name.' '.$user->lastname,'mrpitagory.13@gmail.com','Ing. Ruben Dario Dimas Julio','Solicitud con VoBo Autorizado','core/app/view/notifica.php');
sendmail('promero@mejorafinanzas.com.mx','Ing. Pedro Javier Romero Vidal','ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->email,$user->name.' '.$user->lastname,'Solicitud Pagada','core/app/view/notificaPago.php');
print "<script>window.location='index.php?view=solicitudes&op=all';</script>";

}


?>