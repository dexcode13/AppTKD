<div class="row">
	<div class="col-md-12">
	<div class="callout callout-info">
	<h2><i class='fa fa-users'></i> Alumnos Gimnasia</h2>
</div>
		<?php
	  $request = AlumnosData::getAlumnosGim();
	 
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
      		<th>Alumno</th>
			<th>Categoria</th>
			<th>Fecha Nacimiento</th>
			<th>Dirección</th>
			<th>Fecha Ingreso</th>
			<th>Status</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><a href='./?view=editAlumnoGim&id=<?php echo $request1->rgi;?>'><?php echo $request1->rgi; ?></a></td>
				<td><?php echo $request1->nombre." ".$request1->apellido; ?></td>
				<td><?php echo $request1->categoria;?></td>
				<td><?php echo $request1->fecha_nac; ?></td>
				<td><?php echo $request1->domicilio; ?></td>
				<td><?php echo $request1->fecha_ingreso; ?></td>
				<td><?php 
				if ($request1->status==0){
					echo "<span class='label label-warning label-as-badge'>Inactivo</span>";
				}else{
					echo "<span class='label label-success label-as-badge'>Activo</span>";
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
<!--Fin estructura tabla-->
		<?php
		}else
		{
			echo "<p class='alert alert-warning'>No hay Cuotas <strong>No hay Alumnos</strong></p>";
		}
?>
</div>
			</div>
		