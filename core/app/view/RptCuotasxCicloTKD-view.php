<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-dollar'></i> Reporte de Mensualidades por Año <strong>TKD <?php if(isset($_GET["sd"])){echo $_GET["sd"];} ;?></strong></h1>
			<form>
					<input type="hidden" name="view" value="RptCuotasxCicloTKD">
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
							
							<select class="form-control" name="sd">
								<option value="">--SELECCIONE UN CICLO--</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
							</select>
						</div> 
							<!--<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">-->
						</div>
						<div class="col-md-3">
							<input type="submit" class="btn btn-success btn-block" value="Procesar">
						</div>
					</div>
			</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php if(isset($_GET["sd"])):?>
		<?php if($_GET["sd"]!=""):?>
			<?php 			
			$operations = array();

			$operations = AsistenciasData::getByCuotasCicloTKD($_GET["sd"]);
			
			?>
			 <?php if(count($operations)>0):?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
<table class="table table-bordered datatable">
	<thead>
		<th>RGI</th>
		<th>Nombre</th>
		<th>Ene</th>
		<th>Feb</th>
		<th>Mar</th>
		<th>Abr</th>
		<th>May</th>
		<th>Jun</th>
		<th>Jul</th>
		<th>Ago</th>
		<th>Sep</th>
		<th>Oct</th>
		<th>Nov</th>
		<th>Dic</th>
	</thead>
<?php foreach($operations as $operation):
	?>
	<tr class="<?php //echo $msj;?>">
		<td><?php echo $operation->rgi; ?></td>
		<td><?php echo $operation->alumno; ?></td>
		<td><?php echo $operation->Enero; ?></td>
		<td><?php echo $operation->Febrero; ?></td>
		<td><?php echo $operation->Marzo; ?></td>
		<td><?php echo $operation->Abril; ?></td>
		<td><?php echo $operation->Mayo; ?></td>
		<td><?php echo $operation->Junio; ?></td>
		<td><?php echo $operation->Julio; ?></td>
		<td><?php echo $operation->Agosto; ?></td>
		<td><?php echo $operation->Septiembre; ?></td>
		<td><?php echo $operation->Octubre; ?></td>
		<td><?php echo $operation->Noviembre; ?></td>
		<td><?php echo $operation->Diciembre; ?></td>		
	</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>
			 <?php else:
			 // si no hay operaciones
			 ?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>No hay Cumpleaños</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de Cumpleaños.</p>
</div>

			 <?php endif; ?>
<?php else:?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>Fecha Incorrectas</h2>
	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>
		<?php endif; ?>
	</div>
</div>
</div>
</div>