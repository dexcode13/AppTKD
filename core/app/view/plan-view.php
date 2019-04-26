<?php 
$cuotas =  AlumnosData::getCuotas();
$fecha = date('Y-m-d');
$fechaMesPasado = strtotime ('+1 month', strtotime($fecha));
$fechaMesPasadoDate = date('m', $fechaMesPasado);
function nombremes($mes){
  setlocale(LC_TIME, 'spanish');  
  $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
  return $nombre;
 }
?>
<div class="row">
	<div class="col-md-12">
  <div class="callout callout-info">
	<h2><i class='fa fa-tasks'></i> Generación de Plan de Cuotas "TKD y GIMNASIA"</h2>
	</div>      
      <div class="alert alert-danger">
        <strong>¡Advertencia!</strong> A continuación se llevara acabo la generación del plan de cuotas del
        mes siguiente <strong><?php 
        /*$fecha = date('m');
        $nuevafecha = strtotime ( '+5 month' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( '%B' , $nuevafecha );
        echo $nuevafecha;*/
        $ivan = nombremes($fechaMesPasadoDate);
        //echo strtoupper($ivan);
        ?></strong>, antes verifique si necesita dar de baja algun alumno, ya que se registraran las cuotas de todos los alumnos activos.
      <br><marquee behavior="alternate"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
 EL SISTEMA ESTARÁ HABILITADO DEL 25 AL ÚLTIMO DÍA DEL MES PARA LA GENERACIÓN DE PLAN DE CUOTAS <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</strong></marquee>
      </div>
      <div class="box box-primary">
      <div class="table-responsive">
      <div class="box-body">
      <table class="table table-bordered table-hover">
          <thead>
              <th>Mensualidad</th>
              <th>Ciclo</th>
                <th>Fecha Vencimiento</th>
                <th>Registros</th>
                <th>Fecha Generada</th>
                </thead>
              <tbody>
              <?php
                foreach($cuotas as $request1){
                  ?>
                  <tr>
                  <td><?php echo $request1->MesCuota; ?></td>
                  <td><?php echo $request1->ciclo; ?></td>
                  <td><?php echo $request1->fecha_vencimiento; ?></td>
                  <td><center><?php echo $request1->registros; ?></center></td>
                  <td><?php echo $request1->fecha_registro; ?></td>
              <!--<td>
                <button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-expediente.php?&rgi=<?php echo $request1->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>	 
              </td>-->
                  </tr>
                  <?php
              }
                ?>
            </tbody>
        </table>
            </div>
            </div>
            </div>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=GenPlan" role="form">
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit" class="btn btn-success btn-lg">Generar Plan</button>
    </div>
  </div>
</form>
	</div>
</div>
