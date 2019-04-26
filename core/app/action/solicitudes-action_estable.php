<?php 
/*
* Archivo solicitudes-action.php
* Contiene las acciones de agregar solicitudes, actualizar persona y eliminar persona.
* @author Ing. Iván Hernández
* @date 2017-04-27
*/
$retorno = $_POST["fec_ret"];
$salida = $_POST["fec_sal"];

if(isset($_GET["op"]) && $_GET["op"]=="add"){
	if($retorno>=$salida){
			$fecha_retorno=$_POST['fec_ret'];
    		$fechaInicial = strtotime($fecha_retorno); 
			$lapso          = 5; //  dias habiles  
			$diasTrans      = 0; // dias transcurridos  
			$diasHabiles    = 0;  
			//01 de mayo es 1-5 no 01-05
			$feriados       = array("15-8","01-05","18-05","02-11","25-12");  
			while($diasHabiles<($lapso+1))  
			{   $fecha      = $fechaInicial+($diasTrans*86400);   
				$diaSemana  = getdate($fecha);  
				if($diaSemana["wday"]!=0 && $diaSemana["wday"]!=6)  
				{   
					$feriado    = $diaSemana['mday']."-".$diaSemana['mon'];  
					if(!in_array($feriado,$feriados))  
					{   $diasHabiles++; }  
				}  
				$diasTrans++;  
			}  
			$fechaFinal     = $fechaInicial+(($diasTrans-1)*86400);   
			$date = date("Y-m-d",$fechaFinal); 

			$gas_e=$_POST["gasolina_efectivo"];
			$ali=$_POST["alimentos"];
			$cas=$_POST["casetas"];
			$hos=$_POST["hospedaje"];
			$user = new SolicitudData();
			if($gas_e==0 and $ali==0 and $cas==0 and $hos==0){
				$user->solovales=1;
			}
			else{
				$user->solovales=0;
			}
			$user->datos = $_POST["datos"];
			$user->comisionado = UserData::getById($_SESSION["user_id"])->id;
			$user->nombre=UserData::getById($_SESSION["user_id"])->name;
			$user->apellido=UserData::getById($_SESSION["user_id"])->lastname;
			$user->correo=UserData::getById($_SESSION["user_id"])->email;
			$user->correo_g = UserData::getById($_SESSION["user_id"])->mail_gerente;
			$user->nombre_g = UserData::getById($_SESSION["user_id"])->gerente;
			$user->fec_sal = $_POST["fec_sal"];
			$user->fec_ret = $_POST["fec_ret"];
			$user->lugar = $_POST["lugar"];
			$user->gasolina_vales = $_POST["gasolina_vales"];
			$user->gasolina_efectivo = $_POST["gasolina_efectivo"];
			$user->alimentos = $_POST["alimentos"];
			$user->casetas = $_POST["casetas"];
			$user->hospedaje = $_POST["hospedaje"];
			$user->objetivo = $_POST["objetivo"];
			$user->fechalimite = $date;
			$user->add();
			function sendmail($setFromEmail,$setFromName,$addReplyToEmail,$addReplyToName,$addAddressEmail,$addAddressName,$subject,$template)
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
		sendmail($user->correo,$user->nombre.' '.$user->apellido,'ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->correo_g,$user->nombre_g,'Solicitud Registrada','comisionado.php');
		//Core::redir("./?view=solicitudes&op=all");
		print "<script>window.location='index.php?view=solicitudes&op=all';</script>";
}
else{
	?>
		<script>
		alert("La fecha de retorno no puede ser menor a la\nfecha de salida\nal menos que seas del pasado");
		</script>
		<?php
		Core::redir("./?view=solicitudes&op=all");
		//print "<script>window.location='/SISCOVIA.2.2/core/app/view/solitudes-view.php';</script>";
	}
}
else if(isset($_GET["op"]) && $_GET["op"]=="update"){
	$user = PersonData::getById($_POST["id"]);
	$user->code = "";
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->update();
	Core::redir("./?view=persons&op=all");
}
else if(isset($_GET["op"]) && $_GET["op"]=="del"){
	$client = PersonData::getById($_GET["id"]);
	$client->del();
	Core::redir("./?view=persons&op=all");
}
?>