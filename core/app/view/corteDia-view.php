<div class="row">
	<div class="col-md-12">
		<h1><i class='fa fa-file-text'></i> Reporte de Corte del Día</h1>
		<?php
      $request = AlumnosData::getCorteDia();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador"class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
      		<th>Alumno</th>
			<th>Categoria</th>
			<th>Cuota</th>
			<th>Importe</th>
			<th>Fecha Pago</th>
			<th>Estado</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->rgi;?></td>
				<td><?php echo $request1->completo; ?></td>
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
				<td>$ <?php echo $request1->importe; ?></td>
				<td><?php echo $request1->fecha_pago; ?></td>
        		<td><?php 
				if ($request1->estado_cuota==0){
					echo "<span class='label label-warning label-as-badge'>Pendiente</span>";
				}else if($request1->estado_cuota==2){
					echo "<span class='label label-danger label-as-badge'>Atrasado</span>";
				}else{
					echo "<span class='label label-success label-as-badge'>Pagado</span>";
				}
				?></td>
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
			echo "<p class='alert alert-danger'>NO HAY REGISTROS DE PAGO</p>";
		}
?>
			</div>
			</div>
			