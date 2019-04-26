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
include("funcion-letras.php");
?>
<page backtop="8mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
<div style="background-image: url(./img/fondo.png); background-repeat: no-repeat; background-position: center; ">
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
           <?php echo $r->name;?>
		   </td>
		  <td style="width:25%;" class='clouds'>
		  <?php echo $r->rgi;?>
		  </td>
		   <td style="width:40%;" class='clouds'>
			Mensualidad de <?php echo $r->mes;?>
		   </td>
        </tr>
		
        
   
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width:15%;" class='midnight-blue'>La cantidad de:</td>
		    <td style="width:15%;" class='clouds'>$ <?php echo $r->importe;?>.00</td>
		    <td style="width:20%;" class='midnight-blue'>Cantidad en letras:</td>
            <td style="width:50%;" class='clouds'><?php echo numtoletras($r->importe);?></td>
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
                    <?php echo $r->name;?>
                    <hr>
                    Entregué Conforme
                    </td>
            </tr>
            </tbody>
        </table> 
	<br>
	<div style="font-size:6pt;text-align:right;font-weight:bold"><strong>ORIGINAL</strong></div>
    </div>
    <hr>
    <br>
    <div style="background-image: url(./img/fondo.png); background-repeat: no-repeat; background-position: center; ">
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
           <?php echo $r->name;?>
		   </td>
		  <td style="width:25%;" class='clouds'>
		  <?php echo $r->rgi;?>
		  </td>
		   <td style="width:40%;" class='clouds'>
			Mensualidad de <?php echo $r->mes;?>
		   </td>
        </tr>
		
        
   
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <td style="width:15%;" class='midnight-blue'>La cantidad de:</td>
		    <td style="width:15%;" class='clouds'>$ <?php echo $r->importe;?>.00</td>
		    <td style="width:20%;" class='midnight-blue'>Cantidad en letras:</td>
            <td style="width:50%;" class='clouds'><?php echo numtoletras($r->importe);?></td>
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
                    <?php echo $r->name;?>
                    <hr>
                    Entregué Conforme
                    </td>
            </tr>
            </tbody>
        </table>
        
         
	<br>
	<div style="font-size:6pt;text-align:right;font-weight:bold"><strong>COPIA ALUMNO</strong></div>
    </div>
</page>

