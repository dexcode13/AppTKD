<?php 
$cuotas =  AlumnosData::getFotos();

?>
<div class="row">
	<div class="col-md-12">
  <div class="callout callout-info">
	<h2><i class='fa fa-photo'></i> Control de FOTOS</h2>
	</div>      
      <div class="box box-primary">
      <div class="table-responsive">
      <div class="box-body">
      <table class="table table-bordered datatable table-hover">

          <thead>
              <th>RGI</th>
              <th>Alumno</th>
              <th>Clase</th>
              <th>Fecha Ingreso</th>
              <th>Directorio</th>
              <th>Existe Foto</th>
          </thead>
              <tbody>
              <?php
                foreach($cuotas as $request1){
                  ?>
                  <tr>
                  <td><?php echo $request1->rgi; ?></td>
                  <td><?php echo $request1->nombre." ".$request1->apellido; ?></td>
                  <td><?php if ($request1->clase==0) {
                       echo "TKD";
                      } else {
                         echo "GIM";
                      } ?></td>
                  <td><?php echo $request1->fecha_ingreso; ?></td>
                  <td><?php echo $request1->dir_foto; ?></td>
                  <td><center><?php $exists = file_exists($request1->dir_foto);
                      if ($exists) {
                       echo "<span class='label label-success label-as-badge'>OK</span>";
                      } else {
                         echo "<span class='label label-danger label-as-badge'>Pendiente</span>";
                      } 
                      ?>
                  </center></td>
                  </tr>
                  <?php
              }
                ?>
            </tbody>
        </table>
            </div>
            </div>
            </div>
	</div>
</div>
