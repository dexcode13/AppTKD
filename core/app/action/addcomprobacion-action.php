<?php
/**
* 
* @author Ing. Iván Hernández
* Agrega la comprobacion a la tabla tcomprobaciones
**/

	$solic= SolicitudData::getById($_POST["id"]);
	$user = new ComprobantesData();
	
	$alimentacion=$_POST["alimentacion"];
    $gasolina=$_POST["gasolina"];
    $casetas=$_POST["casetas"];
    $hospedaje=$_POST["hospedaje"];
    $total=$alimentacion+$gasolina+$casetas+$hospedaje;
	$user->hospedaje = $_POST["hospedaje"];
	$user->alimentacion = $_POST["alimentacion"];
	$user->casetas = $_POST["casetas"];
	$user->gasolina = $_POST["gasolina"];
	$user->total_comprob = $total;
	$user->id_solicitud = $_POST["id"];
	$user->nombre=UserData::getById($_SESSION["user_id"])->name;
	$user->apellido=UserData::getById($_SESSION["user_id"])->lastname;
	$user->correo=UserData::getById($_SESSION["user_id"])->email;
	/*$user->person_id = $_POST["person_id"]!=""?$_POST["person_id"]:"NULL";
	$user->asigned_id = $_POST["asigned_id"]!=""?$_POST["asigned_id"]:"NULL";
	$user->status_id = $_POST["status_id"];
	$user->kind_id = $_POST["kind_id"];*/
	$user->addComprobacion();
	$solic->updateComprobacion();
	function sendmail($setFromEmail, $setFromName, $addReplyToEmail, $addReplyToName, $addAddressEmail, $addAddressName, $addAddressEmail2, $addAddressName2,$subject,$template)
	{
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
		//correo del que envia,nombre del que envia,correo para responder,$nombre para responder,$correo al q envian,nombre al q envian,asunto,plantilla)
sendmail($user->correo,$user->nombre.' '.$user->apellido,'ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas','rdimas@mejorafinanzas.com.mx','Ing. Ruben Dario Dimas Julio','promero@mejorafinanzas.com.mx','Ing. Pedro Javier Romero Vidal','Solicitud Comprobada','comprobado.php');

Core::alert("¡Ha comprobado exitosamente!");
print "<script>window.location='index.php?view=comprobaciones&op=all';</script>";

?>