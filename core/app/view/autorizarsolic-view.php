<?php
if(count($_POST)>0){
	$user = SolicitudData::getById($_POST["id_solicitud"]);
	$user->status = $_POST["kind"];
	$user->observacion=$_POST["observacion"];
	$user->updateSolic();
	function sendmail($setFromEmail,$setFromName,$addReplyToEmail,$addReplyToName,$addAddressEmail,$addAddressName,$addAddressEmail2, $addAddressName2,$subject,$template){
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
	$mail->addAddress($addAddressEmail2, $addAddressName2);
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
sendmail('rdimas@mejorafinanzas.com.mx','Ing. Ruben Dario Dimas Julio','ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->email,$user->name.' '.$user->lastname,'promero@mejorafinanzas.com.mx','Ing. Pedro Javier Romero Vidal','Autorizacion de Solicitud','core/app/view/confirmation-autoriza.php');
print "<script>window.location='index.php?view=solicitudes&op=all';</script>";
}
?>