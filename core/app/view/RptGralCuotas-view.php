<div class="row">
	<div class="col-md-12">
	<!--<div class="callout callout-info">
	<h2><i class='glyphicon glyphicon-usd'></i> Pagos de Mensualidades</h2>
	</div>-->
	<h1><i class='fa fa-bar-chart'></i> Reporte General de Cuotas Anual</h1>
		<?php
	  $request = AlumnosData::getPagosAnual();
	 
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover" id="cuotasAlumno">
			<thead>
			<th>RGI</th>
      <th>Alumno</th>
			<th>Ene</th>
			<th>Feb</th>
			<th>Mar</th>
			<th>Abr</th>
			<th>May</th>
			<th>Jun</th>
			<th>Jul</th>
			<th>Agos</th>
			<th>Sept</th>
			<th>Oct</th>
			<th>Nov</th>
			<th>Dic</th>
			</thead>
			<?php
			foreach($request as $request1){
				if ($request1->Mayo>0 && 
					$request1->Junio>0 && 
					$request1->Julio>0 &&
					$request1->Agosto>0) {
					$msj = "success";
				} else {
					$msj = "danger";
				}
				
				?>
				<tr>
				<td><?php echo $request1->rgi;?></td>
				<td><?php echo $request1->alumno;?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Enero; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Febrero; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Marzo; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Abril; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Mayo; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Junio; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Julio; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Agosto; ?></td>
				<td class="<?php //echo $msj;?>">$ <?php echo $request1->Septiembre; ?></td>
				<td>$ <?php echo $request1->Octubre; ?></td>
				<td>$ <?php echo $request1->Noviembre; ?></td>
				<td>$ <?php echo $request1->Diciembre; ?></td>
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
			echo "<p class='alert alert-warning'>No hay Cuotas <strong>PENDIENTES NI VENCIDAS</strong></p>";
		}
?>
</div>
			</div>
			