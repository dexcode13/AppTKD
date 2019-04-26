<style type="text/css">
<!--
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
-->
</style>
<?php
include ("../model/SolicitudData.php");
include ("../../controller/Executor.php");
include ("../../controller/Database.php");
include ("../../controller/Core.php");
include ("../../controller/Model.php");
include("funcion-letras.php");
$user = SolicitudData::getById($_GET["id"]);
$comprob = SolicitudData::getByIdComprob($_GET["id"]);
date_default_timezone_set('America/Merida');


function dia(){
$originalDate = $_POST["fecha_exp"];
$fecha_ex = explode('/', $originalDate);
$dia = $fecha_ex[0];
if ($dia==1) {
    echo $dia . " día";
}else{
echo $dia . " días";
}
}

function mes() {
$mes="";
    if($user->mes==1){$mes='Enero'      ;}else if($user->mes==2){$mes='Febrero' ;}else if($user->mes==3){$mes='Marzo'    ;}else if($user->mes==4){$mes='Abril'      ;}else
    if($user->mes==5){$mes='Mayo'       ;}else if($user->mes==6){$mes='Junio'   ;}else if($user->mes==7){$mes='Julio'    ;}else if($user->mes==8){$mes='Agosto'     ;}else
    if($user->mes==9){$mes='Septiembre' ;}else if($user->mes==10){$mes='Octubre';}else if($user->mes==11){$mes='Noviembre';}else if($user->mes==12){$mes='Diciembre' ;}
        echo $mes;
}

function anio(){
$originalDate = $_POST["fecha_exp"];
$fecha_ex = explode('/', $originalDate);
$anio = $fecha_ex[2];

    echo $anio;
}

 ?>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "Agrofinanciera DG "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
	<?php include("encabezado_formato_comprob.php");?>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%; text-align: center" class='midnight-blue'>FORMATO DE COMPROBACIÓN DE VIATICOS</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			
			
		   </td>
        </tr>
        
   
    </table>
    
       <!--<br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Comisión</td>
		  <td style="width:40%;" class='midnight-blue'>Responsable del Departamento</td>
		   <td style="width:25%;" class='midnight-blue'>Encargado</td>
        </tr>
		<tr>
           <td style="width:35%;" class='clouds'>
			<?php echo $user->c_c;?>
		   </td>
		  <td style="width:40%;" class='clouds'>
		  Ing. <?php echo $user->jefe;?>
		  </td>
		   <td style="width:25%;" class='clouds'>
				Gerente de <?php echo $user->depa?>
		   </td>
        </tr>
		
        
   
    </table>-->
	<br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 50%;text-align:center" class='midnight-blue'>Nombre del Comisionado</th>
            <th style="width: 25%" class='midnight-blue'>Cargo</th>
			<th style="width: 25%" class='midnight-blue'>Fecha de Comprobación</th>
            
        </tr>
        <tr>
            <td style="width: 50%; text-align: center" class='clouds'>
			Ing. <?php echo $user->name.' '.$user->lastname;?>
			</td>
            <td  style="width: 25%; text-align: left" class='clouds'>
			<?php echo $user->perfil;?>
			</td>
			<td  style="width: 25%; text-align: left" class='clouds'>
			<?php echo $user->fecha_comprob;?>
			</td>
        </tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:15%; text-align: center;" class='midnight-blue'>N° de días</td>
		   <td style="width:30%; text-align: center;" class='midnight-blue'>Días de Comisión</td>
		   <td style="width:30%; text-align: center;" class='midnight-blue'>Monto Solicitado</td>
           <td style="width:25%; text-align: center;" class='midnight-blue'>Solicitud #</td>
        </tr>
		<tr>
           <td style="width:15%; text-align: center" class='clouds'>
			<?php 
            if($user->dias==0)
            {
                echo "Mismo día";
            }
            else
            {
                echo $user->dias;
            }
            ?>
		   </td>
		  <td style="width:30%;" class='clouds'>
		  del <?php echo $user->dia_salida;?> al <?php echo $user->dia_retorno;?> de <?php 
            if($user->mes==1)
            {
                echo "Enero";
            }
            else if ($user->mes==2)
            {
                echo "Febrero";
            }
            else if($user->mes==3)
            {
                echo "Marzo";
            }
            else if($user->mes==4)
            {
                echo "Abril";
            }
            else if($user->mes==5)
            {
                echo "Mayo";
            }
            else if($user->mes==6)
            {
                echo "Junio";
            }
            else if($user->mes==7)
            {
                echo "Julio";
            }
            else if($user->mes==8)
            {
                echo "Agosto";
            }
            else if($user->mes==9)
            {
                echo "Septiembre";
            }
            else if($user->mes==10)
            {
                echo "Octubre";
            }
            else if($user->mes==11)
            {
                echo "Noviembre";
            }
            else 
            {
                echo "Diciembre";
            }
            ?> del <?php echo $user->anio;?>
		  </td>
		   <td style="width:30%; text-align: center;" class='clouds'>
			$ <?php echo $user->total_efectivo;?>
		   </td>
           <td style="width:25%; text-align: center;" class='clouds'>
			<?php echo $user->id_solicitud;?>
		   </td>
        </tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%;" class='midnight-blue' align="center">COMPROBANTES</td>
        </tr>
	</table>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           
		   <td style="width:60%; text-align: center;" class='midnight-blue'>Conceptos a Comprobar</td>
		   <td style="width:20%;" class='midnight-blue'>Monto Solicitado</td>
		   <td style="width:20%;" class='midnight-blue'>Monto Comprobado</td>
        </tr>
		<tr>
		   <td style="width:60%; text-align: center" class='clouds'>
			CONSUMO DE ALIMENTOS
		   </td>
		   <td style="width:20%; text-align: center" class='clouds'>
			$ <?php echo $user->alimentacion;?>
		   </td>
		   <td style="width:20%; text-align: center" class='clouds'>
			$ <?php echo $user->a_c;?>
		   </td>
        </tr>
        <tr>
		   <td style="width:60%; text-align: center" class='silver'>
			COMBUSTIBLE
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $user->gasolina_efectivo;?>
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $user->g_c;?>
		   </td>
        </tr>
        <tr>
		   <td style="width:60%; text-align: center" class='clouds'>
			HOSPEDAJE
		   </td>
		   <td style="width:20%; text-align: center" class='clouds'>
			$ <?php echo $user->hospedaje;?>
		   </td>
		   <td style="width:20%; text-align: center" class='clouds'>
			$ <?php echo $user->h_c;?>
		   </td>
        </tr>
        <tr>
		   <td style="width:60%; text-align: center" class='silver'>
			PEAJE
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $user->casetas;?>
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $user->c_c;?>
		   </td>
        </tr>
        <tr>
		   <td style="width:60%; text-align: right" class='silver'>
			Totales:
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $comprob->pedido;?>
		   </td>
		   <td style="width:20%; text-align: center" class='silver'>
			$ <?php echo $comprob->comprobado;?>
		   </td>
        </tr>
		
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%;" class='midnight-blue' align="center">Saldo a favor de:</td>
        </tr>
		<tr>
           <td style="width:100%;" align="left" class='clouds'>
		   <?php 
           if($comprob->diferencia<0)
           {
               echo $user->name.' '.$user->lastname;
               echo " por $";
               echo $comprob->positivo;
           }
           else if ($comprob->diferencia==0)
           {
               echo "No hay diferencias";
               
           }
           else if ($comprob->diferencia>0){
               echo "Agrofinanciera DG SAPI de CV SOFOM ENR";
               echo " por ";               
               echo $comprob->diferencia;
           }
           ?>
		   </td>
        </tr>
	</table>
	<br>
	<br>
	<br> 		
    <br> 
    <br> 
    <br> 
		<table id="divisorFirma" border="0">
            <tbody>
            <tr class="rowfila">
                <td id="column1Firm">
                    <br>
                    <hr>            
                    <?php  
                    if($user->id==11 || $user->id==14 || $user->id==15) {
                        echo 'Lic. '.$user->name.' '.$user->lastname;
                    }else{
                        echo 'Ing. '.$user->name.' '.$user->lastname;
                    }    
                    ?>
                    <br><?php echo $user->perfil;?>
                    <br>Solicita      
                </td>
                <td id="spaceFirm" >
                    &nbsp;   
                </td>
                <td id="column2Firm">
                    <br>
                    <hr>
                    Ing. <?php echo $user->jefe;?>
                    <br>Gerente de <?php echo $user->depa;?>
                    <br>Vo. Bo.
                    </td>
            </tr>
            </tbody>
        </table>
        
         <div id="divFirmar">
            <hr style="height: 1px; border: 0;">
            Ing. Ruben Dario Dimas Julio
           <br>Gerente de Admón. y Finanzas
           <br>Autoriza
        </div>
	<br>
	<!--<div style="font-size:6pt;text-align:center;font-weight:bold">NOTA: Me comprometo a comprobar el total
	de los recursos, en un plazo maximo de 5 dias habiles posteriores al termino de la comisión, en caso
	de no hacerlo, autorizo se me descuente por nomina el importe <strong>NO COMPROBADO</strong></div>-->
	
	
	  

</page>

