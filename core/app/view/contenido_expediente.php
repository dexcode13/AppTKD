<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.img-perfil {
    border-radius: 50px;
    border: 5px solid green;
}
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
    background: #e6f2ff;
    -moz-border-radius: 12.5px; 
    -webkit-border-radius: 12.5px; 
    border-radius: 12.5px;
    border-color: black;
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
include ("../model/AlumnosData.php");
include ("../../controller/Executor.php");
include ("../../controller/Database.php");
include ("../../controller/Core.php");
include ("../../controller/Model.php");
include("funcion-letras.php");
$alumno = AlumnosData::getByAlumno($_GET["rgi"]);
//$comprob = SolicitudData::getByIdComprob($_GET["id"]);
date_default_timezone_set('America/Merida');
$cumpleaños = $alumno->fec_nac;
$date_alumno = new DateTime($cumpleaños);
//$hoy = date('Y-m-d');
//$edad = $hoy-$cumpleaños;



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
    if($alumno->mes==1){$mes='Enero'      ;}else if($alumno->mes==2){$mes='Febrero' ;}else if($alumno->mes==3){$mes='Marzo'    ;}else if($alumno->mes==4){$mes='Abril'      ;}else
    if($alumno->mes==5){$mes='Mayo'       ;}else if($alumno->mes==6){$mes='Junio'   ;}else if($alumno->mes==7){$mes='Julio'    ;}else if($alumno->mes==8){$mes='Agosto'     ;}else
    if($alumno->mes==9){$mes='Septiembre' ;}else if($alumno->mes==10){$mes='Octubre';}else if($alumno->mes==11){$mes='Noviembre';}else if($alumno->mes==12){$mes='Diciembre' ;}
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
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "Academia Hermanos Marín "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
	<?php include("encabezado_expediente.php");?>
    <br>
    <!--<img src="../../../img/dex.png" class="img-perfil" alt="Perfil" width="100" height="100">-->
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
        <td style="width:100%; text-align: center" class=''>
         <!--<img src="../../../storage/fotos/<?php echo $alumno->rgi."/".$alumno->foto;?>" class="img-perfil" alt="Perfil" width="100" height="100">-->
         <img src="../../../storage/fotos/<?php echo $alumno->rgi."/user.png"?>" class="img-perfil" alt="Perfil" width="100" height="100">
        </td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 100%;text-align:center" class='midnight-blue'>DATOS GENERALES DEL ALUMNO</th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Nombre(s):</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->nombre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Apellido(s):</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->apellidos; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Domicilio:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->domicilio; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Colonia:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->colonia; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Código Postal:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->cp; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Teléfono:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php //echo $alumno->telefono; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Fecha de Nacimiento:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $date_alumno->format('d/m/Y'); ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Fecha de Ingreso:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->fecha_ingreso; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Edad:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php //echo $edad; ?> años</td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>CURP:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->curp; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Tipo de Sangre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->tipo_sangre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Correo:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->correo; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>RGI:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->rgi; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>SIRED:</td>
           <td style="width:70%; text-align: left" class='clouds'>XXXX</td>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 100%;text-align:center" class='midnight-blue'>DATOS GENERALES DEL TUTOR</th>
        </tr>
    </table>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Nombre del Padre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->nombre_padre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Trabajo del Padre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->trabajo_padre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Cel del Padre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->cel_padre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Nombre de la Madre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->nombre_madre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Trabajo de la Madre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->trabajo_madre; ?></td>
        </tr>
        <tr>
           <td style="width:30%; text-align: left" class='midnight-blue'>Cel de la Madre:</td>
           <td style="width:70%; text-align: left" class='clouds'><?php echo $alumno->cel_madre; ?></td>
        </tr>
    </table> 
	<!--<div style="font-size:6pt;text-align:center;font-weight:bold">NOTA: Me comprometo a comprobar el total
	de los recursos, en un plazo maximo de 5 dias habiles posteriores al termino de la comisión, en caso
	de no hacerlo, autorizo se me descuente por nomina el importe <strong>NO COMPROBADO</strong></div>-->
	
	
	  

</page>

