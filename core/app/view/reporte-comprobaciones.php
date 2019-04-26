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
include ("../model/ComprobantesData.php");
include ("../../controller/Executor.php");
include ("../../controller/Database.php");
include ("../../controller/Core.php");
include ("../../controller/Model.php");
include("funcion-letras.php");
$viaticos = ComprobantesData::getAllCorte($_GET["inicio"],$_GET["fin"]);
$start=isset($_GET["inicio"]);
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
<page backtop="5mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
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
	<?php include("encabezado_rpt.php");?>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%; text-align: center" class='midnight-blue'>REPORTE DE COMPROBACIÓN DE VIATICOS DEL <?php echo $_GET["inicio"] ?> AL  <?php echo $_GET["fin"] ?></td>
        </tr>
		<tr>
           <td style="width:50%;" >
			
			
		   </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        
		<tr>
            <th style="width: 5%;text-align:center" class='midnight-blue'>#</th>
            <th style="width: 15%"text-align:center" class='midnight-blue'>FECHA SOLIC</th>
            <th style="width: 10%"text-align:center" class='midnight-blue'>USUARIO</th>
            <th style="width: 15%;text-align: center" class='midnight-blue'>MONTO SOLIC</th>
            <th style="width: 15%;text-align: center" class='midnight-blue'>COMPROBADO</th>
            <th style="width: 15%;text-align: center" class='midnight-blue'>TOTAL COMPROB</th>
            <th style="width: 15%;text-align: center" class='midnight-blue'>FECHA COMPROB</th>
            <th style="width: 10%;text-align: center" class='midnight-blue'>DIFERENCIA</th>
            
        </tr>

<?php
$nums=1;
foreach($viaticos as $request1)
	{
    $monto = number_format($request1->monto_solicitado,2);
    $comprob = number_format($request1->total_comprob,2);
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 5%; text-align: center"><?php echo $request1->id_solicitud; ?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $request1->fecha_solic;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $request1->name;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $monto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $request1->comprobado;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $comprob;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $request1->fecha_comprob;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $request1->diferencia;?></td>       
        </tr>
	<?php 
	$nums++;
	}
?>		
    </table>
</page>

