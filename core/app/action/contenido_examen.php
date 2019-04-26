<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.circulo {
    width: 25px; 
    height: 25px; 
    /*background: #e6f2ff;*/
    -moz-border-radius: 12.5px; 
    -webkit-border-radius: 12.5px; 
    border-radius: 12.5px;
    border: 0.5px solid #555;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
#divFirmar{
 margin-left: 260px;width:34.4%;text-align: center; font-size: 16.4px;font-family: Arial;   
}

#divisorFirma{padding-top: 22px; border-top: 0px solid; border-bottom: 0px solid; width:100%;font-family: Arial;}
#divisorFirma .rowfila #column0Firm {text-align:center;font-size: 16.4px;padding-top: 10px; width:4.1%;}
#divisorFirma .rowfila #column1Firm {text-align:center;font-size: 16.4px; padding-left: 60px; padding-top: 10px; width:37.4%;}
#divisorFirma .rowfila #spaceFirm {text-align:center;font-size: 16.4px;padding-top: 20px; width:25.4%;}
#divisorFirma .rowfila #column2Firm {text-align:center;font-size: 16.4px;padding: 10px; width:34.4%;}
</style>
<?php
/*date_default_timezone_set('America/Merida');
$cumpleanos = $alumno->fecha_nac;
$a = date('Y-m-d');
$date1 = new DateTime($cumpleanos);
$date2 = new DateTime($a);
$diff = $date1->diff($date2);

$cumpleanos = $alumno->fecha_nac;
$hoy = date('Y-m-d');
$date_alumno = new DateTime($cumpleanos);
$date_hoy = new DateTime($hoy);
$edad = $date_alumno->diff($date_hoy);*/
 ?>
<page backtop="2mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
	<?php include("encabezado_examen.php");?>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:25%; text-align: center" class=''>RGI: <?php echo $user->rgi;?></td>
           <td style="width:50%; text-align: center" class=''>Fecha de Nac: <?php echo $fechaBD; ?></td>
           <td style="width:25%; text-align: center" class=''>Número: ________</td>
        </tr>
        <tr>
           <td colspan="3" style="width:100%; text-align: left;">
           &nbsp;
           </td>
        </tr>
        <tr>
           <td colspan="3" style="width:100%; text-align: left; border:1">
           Observaciones del Profesor en relación a la actitud y conducta del Aspirante:<br><br><br>
           </td>
        </tr>
    </table>
		<table cellspacing="0" style="width: 100%; text-align: center; font-size: 10pt;">
        <tr>
           <td style="width:50%;" class=''>Nombre: <u><strong><?php echo $user->nombre;?></strong></u></td>
		   <td style="width:50%;" class=''>Edad: <u><strong><?php echo $diff->y;?> años</strong></u></td>
        </tr> 
        <tr>
           <td style="width:50%;" class=''>Fecha de Exámen Anterior: <u><strong><?php echo $user->fecha_exa_ant;?></strong></u></td>
		   <td style="width:50%;" class=''>Grado y Cinta Actual: <u><strong><?php echo $user->grado_cinta_actual;?></strong></u></td>
        </tr> 
        <tr>
           <td style="width:50%;" class=''>Fecha Exámen: <u><strong><?php echo $user->fecha_exa;?></strong></u></td>
		   <td style="width:50%;" class=''>Grado y Cinta a Pasar: <u><strong><?php echo $user->grado_cinta_apasar;?></strong></u></td>
        </tr>
        <tr>
           <td style="width:50%;" class=''>Escuela: <u><strong>CDTKD HERMANOS MARIN</strong></u></td>
		   <td style="width:50%;" class=''>Prof. Titular <u><strong>ERIC MARIN HERNANDEZ</strong></u></td>
        </tr>  
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 10pt;">
        <tr>
           <td style="width:10%;" class=''><div class="circulo"></div></td>
           <td style="width:15%;" class=''>NO APROBADO</td>
		   <td style="width:50%;" class=''><br><br><hr>FIRMA DEL EXÁMINADOR</td>
           <td style="width:10%;" class=''><div class="circulo"></div></td>
           <td style="width:15%;" class=''>APROBADO</td>
        </tr> 
    </table>
	<br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 7pt;">
        <tr>
           <td style="width:20%; text-align: center" class=''>CLASES: ______</td>
           <td style="width:20%; text-align: center" class=''>ASISTENCIAS: ______</td>
           <td style="width:20%; text-align: center" class=''>FALTAS: ______</td>
           <td style="width:20%; text-align: center" class=''>PORCENTAJE: %</td>
           <td style="width:20%; text-align: center" class=''>GRADO APROBADO: ______</td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 100%;text-align:center" class=''>OBSERVACIONES TÉCNICAS</th>
        </tr>
    </table>
    <table cellspacing="0" border="0.5px" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 50%;text-align:center" class=''>POSICIONES</th>
            <th style="width: 50%;text-align:center" class=''>TÉCNICAS DE PATEO EJERCICIOS Y MOVIMIENTOS FUNDAMENTALES</th>  
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
			&nbsp;<br><br><br><br>
           
			</td>
            <td rowspan="7" style="width: 50%; text-align: left" class=''>
			
			</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
			BASICOS Defensas o Ataques
			</td>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
            &nbsp;<br><br><br><br>
			</td>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
			COMBINACIONES DE EXTREMIDADES SUP. E INF.
			</td>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
            &nbsp;<br><br><br><br>
			</td>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class=''>
			TIPOS DE COMBATE
			</td>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: left" class=''>
            1, 2, 3 PASOS<br>
            DEFENSA PERSONAL<br>
            A LARGA DISTANCIA<br>
            LIBRE
			</td>
            
        </tr>
    </table>
    <table cellspacing="0" border="0.5px" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:100%; text-align: center;" class=''>FORMA - POOMSE (B=bien, R=regular, M=mal)
<br><br><br><br>
           </td>
        </tr>
    </table>
    <table cellspacing="0" border="0.5px" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:20%; text-align: left;" class=''>1RO<br>2DO</td>
           <td style="width:20%; text-align: left;" class=''>1° IL CHANG<br>2° I CHANG</td>
           <td style="width:20%; text-align: left;" class=''>3° SAM CHANG<br>4° SA CHANG</td>
           <td style="width:20%; text-align: left;" class=''>5° O CHANG<br>6° YUK CHANG</td>
           <td style="width:20%; text-align: left;" class=''>7° CHIL CHANG<br>8° PAL CHANG</td>
        </tr>
        <!--<tr>
           <td style="width:20%; text-align: left;" class=''>2DO</td>
           <td style="width:20%; text-align: left;" class=''>2° I CHANG</td>
           <td style="width:20%; text-align: left;" class=''>4° SA CHANG<</td>
           <td style="width:20%; text-align: left;" class=''>6° YUK CHANG</td>
           <td style="width:20%; text-align: left;" class=''>8° PAL CHANG</td>
        </tr>-->
    </table>
    <table cellspacing="0" border="0.5px" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:100%; text-align: center;" class=''>OBSERVACIONES GENERALES</td>
        </tr>
    </table>
    <table cellspacing="0" border="0.5px" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:20%; text-align: left;" class=''>COORDINACION GENERAL</td>
           <td style="width:20%; text-align: left;" class=''>Muy Bueno</td>
           <td style="width:20%; text-align: left;" class=''>Buena</td>
           <td style="width:20%; text-align: left;" class=''>Regular</td>
           <td style="width:20%; text-align: left;" class=''>Debe Mejorar</td>
        </tr>
        <tr>
           <td style="width:20%; text-align: left;" class=''>DOMINIO TÉCNICO</td>
           <td style="width:20%; text-align: left;" class=''>Muy Bueno</td>
           <td style="width:20%; text-align: left;" class=''>Bueno</td>
           <td style="width:20%; text-align: left;" class=''>Regular</td>
           <td style="width:20%; text-align: left;" class=''>Debe Mejorar</td>
        </tr>
        <tr>
           <td style="width:20%; text-align: left;" class=''>FLEXIBILIDAD Y ELASTICIDAD</td>
           <td style="width:20%; text-align: left;" class=''>Muy Bueno</td>
           <td style="width:20%; text-align: left;" class=''>Bueno</td>
           <td style="width:20%; text-align: left;" class=''>Regular</td>
           <td style="width:20%; text-align: left;" class=''>Debe Mejorar</td>
        </tr>
    </table>
	<!--<div style="font-size:6pt;text-align:center;font-weight:bold">NOTA: Me comprometo a comprobar el total
	de los recursos, en un plazo maximo de 5 dias habiles posteriores al termino de la comisión, en caso
	de no hacerlo, autorizo se me descuente por nomina el importe <strong>NO COMPROBADO</strong></div>-->
</page>

