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
			$full_name  = strip_tags($_POST['comisionado']);
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
			function sendmail($setFromEmail,$setFromName,$addReplyToEmail,$addReplyToName,$addAddressEmail,$addAddressName,$subject,$message)
			{
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				require 'class.phpmailer.php';
				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				$message  = "<html><body>";
				
				$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
				
				$message .= "<tr><td>";
				
				$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
					
				$message .= "<thead>
							<tr height='80'>
								<th colspan='4' style='background-color:#f5f5f5; text-align:rigth; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:14px;' >
								San Francisco de Campeche, Campeche ".date('d')." de ".$meses[date('n')-1]." del ".date('Y')."
								</th>
							</tr>
							</thead>";
					
				$message .= "<tbody>
							<tr align='center' height='50' style='background-color: green;'>
							<th colspan='4' style='border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#fff; font-size:34px;' >Agrofinanciera DG</th>
							</tr>
							
							<tr>
								<td colspan='4' style='padding:15px;'>
									<p style='font-size:20px;'>Estimado Gerente,</p>
									<hr />
									<p style='font-size:20px;'>Le informamos que se ha registrado un nueva solicitud con las siguientes caracteristicas:</p>
								</td>
							</tr>
							<tr height='80'>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                Fecha Solicitud:<br>
                                </label>
                            </td>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                ".date('Y-m-d h:i:s')."
                                </label>
                            </td>
                        </tr>		
                        <tr height='80'>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                Usuario:<br>
                                </label>
                            </td>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                ".UserData::getById($_SESSION["user_id"])->name." ".UserData::getById($_SESSION["user_id"])->lastname."
                                </label>
                            </td>
						</tr>
						<tr height='80'>
						<td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
							<label>
							Cargo:<br>
							</label>
						</td>
						<td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
							<label>
							".$_POST["cargo"]."
							</label>
						</td>
					</tr>	
                        <tr height='80'>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                Comision:<br>
                                </label>
                            </td>
                            <td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
                                <label>
                                ".$_POST["datos"]."
                                </label>
                            </td>
						</tr>	
						<tr height='80'>
						<td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
							<label>
							Lugar:<br>
							</label>
						</td>
						<td  align='left' style='background-color:#f5f5f5; border-top:dashed green 2px; font-size:20px; '>
							<label>
							".$_POST["lugar"]."
							</label>
						</td>
					</tr>	
                        
							
							</tbody>";
					
				$message .= "</table>";
				
				$message .= "</td></tr>";
				$message .= "</table>";
				
				$message .= "</body></html>";
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
				$mail->IsHTML(true);
				$mail->msgHTML($message);
					//send the message, check for errors
				$mail->send();
				/*if (!$mail->send()) {
					echo "Error al enviar mensaje: " . $mail->ErrorInfo;
				} else {
					echo "Mensaje enviado!";
				}*/
			}
				//correo del que envia,nombre del que envia,correo para responder,$nombre para responder,$correo al q envian,nombre al q envian,asunto,plantilla)
		sendmail($user->correo,$user->nombre.' '.$user->apellido,'ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->correo_g,$user->nombre_g,'Solicitud Registrada',$message);
				
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