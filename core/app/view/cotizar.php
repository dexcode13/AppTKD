<?php						
			$para  = 'ihernandez@consultoresdiaf.com' . ', ';
			$para .= ' '.$_SESSION["correo"].' ';
			
			$titulo = 'Prueba envio de correo';
			
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
						<title>Cotizaci�n</title>
						</head>
						<body>
							<div align="center">
							<table>
								<tr>
									<td> CLIENTE: '.utf8_decode($_SESSION["nombre"].' '.$_SESSION["ap_paterno"]).' '.$_SESSION["ap_materno"].'</td>
								</tr>
								<tr>	
									<td> TELEFONO: '.$_SESSION["telefono"].'</td>
								</tr>
								<tr>	
									<td> DIRECCION: '.utf8_decode($_SESSION["direccion"]).'</td>
								</tr>
								<tr>	
									<td> CORREO: '.$_SESSION["correo"].'</td>
								</tr>
							</table>';
		
									
							
					$mensaje .='</body>
							</html>';
							
							// Cabecera que especifica que es un HMTL
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					 
					// Cabeceras adicionales
					$cabeceras .= 'From:'.utf8_decode($_SESSION["nombre"].' '.$_SESSION["ap_paterno"].' '.$_SESSION["ap_materno"]).' <'.$_SESSION["correo"].'>' . "\r\n";
					$cabeceras .= 'Cc: cmgm1990@gmail.com' . "\r\n";
					//$cabeceras .= 'Bcc: copiaoculta@example.com' . "\r\n";
					 
					// enviamos el correo!
					mail($para, $titulo, $mensaje, $cabeceras);

?>

				<!--<script type="text/javascript">
					function redireccion()
					{
						alert("Cotización enviada!!!");
						window.location = "index.php";
					}
					setTimeout("redireccion()", 500);
				</script>-->
