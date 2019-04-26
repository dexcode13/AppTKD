<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-file-text'></i> Lista de Alumnos</h1>
		<?php
      $request = AlumnosData::getAllPagosPendientes();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador"class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
      		<th>Alumno</th>
			<th>Grado</th>
			<th>Categoria</th>
			<th>Cuota</th>
			<th>Vencimiento</th>
			<th>Estado</th>
			<th>Recibo</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td>
				<?php
				if ($request1->estado_cuota==1) {
					 echo $request1->rgi;
				} else {
					?>
				<a href='./?view=cobrosCuotas&rgi=<?php echo $request1->rgi;?>'><?php echo $request1->rgi; ?></a></td>
				<?php
				}
				?>
				</td>
				<td><?php echo $request1->nombre." ".$request1->apellido; ?></td>
				<td><?php echo $request1->grado_cinta; ?> °</td>
				<td><?php echo $request1->name; ?></td>
				<td><?php if ($request1->cuota==1) {
				echo "Enero";
				} else if ($request1->cuota==2) {
				echo "Febrero";
				} else if ($request1->cuota==3) {
				echo "Marzo";
				} else if ($request1->cuota==4) {
				echo "Abril";
				} else if ($request1->cuota==5) {
				echo "Mayo";
				} else if ($request1->cuota==6) {
				echo "Junio";
				} else if ($request1->cuota==7) {
				echo "Julio";
				} else if ($request1->cuota==8) {
				echo "Agosto";
				} else if ($request1->cuota==9) {
				echo "Septiembre";
				} else if ($request1->cuota==10) {
				echo "Octubre";
				} else if ($request1->cuota==11) {
				echo "Noviembre";
				}else{
				echo "Diciembre";
				}
				?></td>
				<td><?php echo $request1->fecha_vencimiento; ?></td>
        		<td><?php 
				if ($request1->estado_cuota==0){
					echo "<span class='label label-warning label-as-badge'>Pendiente</span>";
				}else if($request1->estado_cuota==2){
					echo "<span class='label label-danger label-as-badge'>Atrasado</span>";
				}else{
					echo "<span class='label label-success label-as-badge'>Pagado</span>";
				}
				?></td>
				<td>
				<?php
				if ($request1->estado_cuota==1) {
					?>
					<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-recibo.php?&id=<?php echo $request1->id_cuota; ?>','_blank')"><i class=" fa fa-print"></i></button>	 
					<?php
				} else {
					?>
					<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class=" fa fa-print"></i></button>					
					<?php
				}
				?>
				</td>
				</tr>
				<?php
		}
			?>
			</table>
			</div>
			</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No existen aun cuotas de cobro</p>";
		}
?>
			</div>
			</div>
			