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
#divisorFirma .rowfila #column1Firm {text-align:center;font-size: 16.4px; padding-left: 50px; padding-top: 10px; width:39.4%;}
#divisorFirma .rowfila #spaceFirm {text-align:center;font-size: 16.4px;padding-top: 20px; width:18.4%;}
#divisorFirma .rowfila #column2Firm {text-align:center;font-size: 16.4px;padding: 10px; width:39.4%;}
</style>
<?php
include ("../model/AlumnosData.php");
include ("../../controller/Executor.php");
include ("../../controller/Database.php");
include ("../../controller/Core.php");
include ("../../controller/Model.php");
include("funcion-letras.php");
$user = AlumnosData::getByIdRecibo($_GET["id"]);
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
<page backtop="8mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        
    <div style="background-image: url(../../../img/fondo.png); background-repeat: no-repeat; background-position: center; ">
	<?php include("encabezado_recibo.php");?>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%; text-align: center" class='midnight-blue'>RECIBO DE PAGO</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Recibí de:</td>
		   <td style="width:25%;" class='midnight-blue'>RGI:</td>
		   <td style="width:40%;" class='midnight-blue'>Por concepto de:</td>
        </tr>
		<tr>
           <td style="width:35%;" class='clouds'>
			<?php echo $user->nombre." ".$user->apellido;?>
		   </td>
		  <td style="width:25%;" class='clouds'>
		  <?php echo $user->rgi;?>
		  </td>
		   <td style="width:40%;" class='clouds'>
           Mensualidad de <?php if ($user->cuota==1) {
				echo "Enero";
				} else if ($user->cuota==2) {
				echo "Febrero";
				} else if ($user->cuota==3) {
				echo "Marzo";
				} else if ($user->cuota==4) {
				echo "Abril";
				} else if ($user->cuota==5) {
				echo "Mayo";
				} else if ($user->cuota==6) {
				echo "Junio";
				} else if ($user->cuota==7) {
				echo "Julio";
				} else if ($user->cuota==8) {
				echo "Agosto";
				} else if ($user->cuota==9) {
				echo "Septiembre";
				} else if ($user->cuota==10) {
				echo "Octubre";
				} else if ($user->cuota==11) {
				echo "Noviembre";
				}else{
				echo "Diciembre";
                }
                ?>
		   </td>
        </tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width:15%;" class='midnight-blue'>La cantidad de:</td>
		    <td style="width:15%;" class='clouds'>$ <?php echo $user->importe;?></td>
		    <td style="width:20%;" class='midnight-blue'>Cantidad en letras:</td>
            <td style="width:50%;" class='clouds'><?php echo numtoletras($user->importe);?></td>
        </tr>
    </table>  
    <br>
    <br>      
		<table id="divisorFirma" border="0">
            <tbody>
            <tr class="rowfila">
                <td id="column1Firm">
                    <br>
                    Prof. Eric Marín Hernández
                    <hr> 
                    Recibí Conforme      
                </td>
                <td id="spaceFirm" >
                    &nbsp;   
                </td>
                <td id="column2Firm">
                    <br>
                    <?php echo $user->nombre." ".$user->apellido;?>
                    <hr>
                    Entregué Conforme
                    </td>
            </tr>
            </tbody>
        </table>   
	<br>
	<div style="font-size:6pt;text-align:right;font-weight:bold"><strong>ORIGINAL</strong></div>
    </div>
    <br>
    <hr>
    <br>
    <div style="background-image: url(../../../img/fondo.png); background-repeat: no-repeat; background-position: center; ">
    <?php include("encabezado_recibo.php");?>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%; text-align: center" class='midnight-blue'>RECIBO DE PAGO</td>
        </tr>
		<tr>
           <td style="width:50%;" >
		   </td>
        </tr>
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Recibí de:</td>
		  <td style="width:25%;" class='midnight-blue'>RGI:</td>
		   <td style="width:40%;" class='midnight-blue'>Concepto:</td>
        </tr>
		<tr>
           <td style="width:35%;" class='clouds'>
			<?php echo $user->nombre." ".$user->apellido;?>
		   </td>
		  <td style="width:25%;" class='clouds'>
		  <?php echo $user->rgi;?>
		  </td>
		   <td style="width:40%;" class='clouds'>
			Mensualidad de <?php if ($user->cuota==1) {
				echo "Enero";
				} else if ($user->cuota==2) {
				echo "Febrero";
				} else if ($user->cuota==3) {
				echo "Marzo";
				} else if ($user->cuota==4) {
				echo "Abril";
				} else if ($user->cuota==5) {
				echo "Mayo";
				} else if ($user->cuota==6) {
				echo "Junio";
				} else if ($user->cuota==7) {
				echo "Julio";
				} else if ($user->cuota==8) {
				echo "Agosto";
				} else if ($user->cuota==9) {
				echo "Septiembre";
				} else if ($user->cuota==10) {
				echo "Octubre";
				} else if ($user->cuota==11) {
				echo "Noviembre";
				}else{
				echo "Diciembre";
                }
                ?>
		   </td>
        </tr>

    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width:15%;" class='midnight-blue'>La cantidad de:</td>
            <td style="width:15%;" class='clouds'>$ <?php echo $user->importe;?></td>
            <td style="width:20%;" class='midnight-blue'>Cantidad en letras:</td>
            <td style="width:50%;" class='clouds'><?php echo numtoletras($user->importe);?></td>
        </tr>
    </table>        
		<table id="divisorFirma" border="0">
            <tbody>
            <tr class="rowfila">
                <td id="column1Firm">
                    <br>
                    Prof. Eric Marín Hernández
                    <hr> 
                    Recibí Conforme      
                </td>
                <td id="spaceFirm" >
                    &nbsp;   
                </td>
                <td id="column2Firm">
                    <br>
                    <?php echo $user->nombre." ".$user->apellido;?>
                    <hr>
                    Entregué Conforme
                    </td>
            </tr>
            </tbody>
        </table>
	<div style="font-size:6pt;text-align:right;font-weight:bold"><strong>COPIA AL CLIENTE</strong></div>
    </div>
</page>

