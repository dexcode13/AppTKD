<?php
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
	$mail->msgHTML(file_get_contents($template));
		//send the message, check for errors
	//$mail->send();
	if (!$mail->send()) {
		echo "Error al enviar mensaje: " . $mail->ErrorInfo;
	} else {
		echo "Mensaje enviado!";
	}
}
sendmail('mrpitagory.13@gmail.com','Ivan Hernandez','ihernandez@consultoresdiaf.com','Agrofinanciera DG','ihernandez@consultoresdiaf.com','Carol Marina','Prueba piloto','confirmation.html');
?>