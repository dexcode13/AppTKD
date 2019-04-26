<?php 
$cuotas =  AlumnosData::getbackups();
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
	<h2><i class='fa fa-cloud-download'></i> Generación de Backups</h2>
	</div>      
      <div class="box box-primary">
      <div class="table-responsive">
      <div class="box-body">
      <table class="table table-bordered table-hover">
          <thead>
                <th>ID Backup</th>
                <th>Nombre</th>
                <th>Ruta</th>
                <th>Fecha Generado</th>
                </thead>
              <tbody>
              <?php
                foreach($cuotas as $request1){
                  ?>
                  <tr>
                  <td><?php echo $request1->id_backup; ?></td>
                  <td><?php echo $request1->nombre; ?></td>
                  <td><?php echo $request1->ruta; ?></td>
                  <td><?php echo $request1->fecha_generacion; ?></td>
                  </tr>
                  <?php
              }
                ?>
            </tbody>
        </table>
            </div>
            </div>
            </div>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=GenBackup" role="form">
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit" class="btn btn-success btn-lg">Generar Backup</button>
    </div>
  </div>
</form>
	</div>
</div>
