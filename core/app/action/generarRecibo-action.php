<?php
            $user = new SolicitudData();
			$full_name  = strip_tags($_POST['cliente']);
            $user->cliente = $_POST["cliente"];
            $user->rfc = $_POST["rfc"];
			$user->monto = $_POST["monto"];
            $user->concepto = $_POST["concepto"];
            $user->correo = $_POST["correo"];
			$user->addRecibo();
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
		sendmail('ihernandez@consultoresdiaf.com','Ing. Ivan Guadalupe Hernandez Dominguez','ihernandez@mejorafinanzas.com.mx','Departamento de Sistemas',$user->correo,$user->cliente,'Recibo de Pago',isset($message));
				
            print "<script>window.location='index.php?view=recibosPagos';</script>";	
?>