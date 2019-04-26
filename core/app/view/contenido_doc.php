<style>

h3{font-size: 20px}

.div_center{

     font-family:pt-sans; padding-top: 22px; width: 100%; text-align: center; font-size:17.3px;
}
.div_justify{
    font-family:Arial;
    line-height: 26px;
    margin-left:90px;margin-right:30px;width:76%;text-align:justify; font-size: 16.4px; padding-left: 14px;
    /*padding-top: 22px; width: 100%; font-family: times,"Times New Roman"; text-align: justify;color: rgb(109, 110, 114)*/
}
.div_left{
margin-left:90px;margin-right:30px;padding-left: 14px; margin-top: 35px;
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
include ("../model/SolicitudData.php");
include ("../../controller/Executor.php");
include ("../../controller/Database.php");
include ("../../controller/Core.php");
include ("../../controller/Model.php");
include("funcion-letras.php");
$user = SolicitudData::getById($_GET["id"]);
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
<page>
    
<br><br>
	<div class="div_left"> 
		<img src="LogOficial.png" width="155">
	</div>
         <div class="div_justify">
            <p align='right'>
            San Francisco de Campeche a <?php echo $user->dia_solic;?> de 
            <?php
             if($user->mes==6)
            {
                echo "Junio";
            }
            ?>
             de <?php echo $user->anio_solic;?>.</p>
        </div>
       <div class="div_center">
		<strong style="font-family:Arial; font-size:16.4">RECIBO DE SOLICITUD DE VIATICOS</strong>
       </div>
       
       <div class="div_center">
        <p><strong style="font-family:Arial; font-size:16.4">POR $<?php echo $user->total_solic;?></strong></p>
       </div>
             
        <div class="div_justify" style="">
            <br><p align='justify'>
            Recibí de <strong style="font-family:Arial; font-size:16.4">AFINANCIERA DG SAPI DE CV SOFOM ENR</strong> 
            <?php echo numtoletras($user->total_solic);?> ($<?php echo $user->total_solic;?>), en concepto de gastos para viaje 
            a la Ciudad de  <?php echo $user->lugar;?> del <?php echo $user->dia_salida; ?> al  <?php echo $user->dia_retorno?> de 
            <?php 
            if($user->mes==6)
            {
                echo "Junio";
            }
            ?> del <?php echo $user->anio;?>, como parte de la Actividad de <?php echo $user->objetivo; ?>
             
        </p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--<div class="div_justify">
            <p align='justify'>
            San Francisco de Campeche a <?php echo $user->dia_solic;?> de 
            <?php
             if($user->mes==6)
            {
                echo "Junio";
            }
            ?>
             de <?php echo $user->anio_solic;?>.</p>
        </div>-->
        <table id="divisorFirma" border="0">
            <tbody>
            <tr class="rowfila">
                <td id="column1Firm">
                    <br>
                    <hr>            
                     Ing. <?php echo $user->name.' '.$user->lastname;?>
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
                    <br>Gerente de <?php echo $user->depa?>
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

</page>