<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-bar-chart'></i> Reporte de Pagos de Cuotas</h1>
			<form>
					<input type="hidden" name="view" value="RptPagosxFecha">
					<div class="row">
						<div class="col-md-3">
							<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
						</div>
						<div class="col-md-3">
							<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
						</div>
						<div class="col-md-3">
							<input type="submit" class="btn btn-success btn-block" value="Procesar">
						</div>
					</div>
			</form>
	</div>
</div>
</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
		<?php if($_GET["sd"]!="" && $_GET["ed"]!=""):?>
			<?php 			
			$operations = array();

			$operations = AsistenciasData::getAllByDatePagos($_GET["sd"],$_GET["ed"]);
			
			?>
			 <?php if(count($operations)>0):?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
<table class="table table-bordered datatable">
	<thead>
		<th>RGI</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>Folio</th>
		<th>Cuota</th>
		<th>Ciclo</th>
		<th>CLASE</th>
		<th>Importe</th>
		<th>Fecha Pago</th>
	</thead>
<?php foreach($operations as $operation):
	?>
	<tr class="<?php //echo $msj;?>">
		<td><?php echo $operation->rgi; ?></td>
		<td><?php echo $operation->nombre; ?></td>
		<td><?php echo $operation->apellido; ?></td>
		<td><?php echo $operation->folio_recibo; ?></td>
		<td><?php if ($operation->cuota==1) {
				echo "ENERO";
				} else if ($operation->cuota==2) {
				echo "FEBRERO";
				} else if ($operation->cuota==3) {
				echo "MARZO";
				} else if ($operation->cuota==4) {
				echo "ABRIL";
				} else if ($operation->cuota==5) {
				echo "MAYO";
				} else if ($operation->cuota==6) {
				echo "JUNIO";
				} else if ($operation->cuota==7) {
				echo "JULIO";
				} else if ($operation->cuota==8) {
				echo "AGOSTO";
				} else if ($operation->cuota==9) {
				echo "SEPTIEMBRE";
				} else if ($operation->cuota==10) {
				echo "OCTUBRE";
				} else if ($operation->cuota==11) {
				echo "NOVIEMBRE";
				}else{
				echo "DICIEMBRE";
				}
				?></td>
				<td><?php echo $operation->ciclo; ?></td>
				<td><?php echo $operation->clase; ?></td>
		<td>$ <?php echo $operation->importe; ?></td>
		<td><?php echo $operation->fecha_pago; ?></td>
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
	<h2>No hay Pagos</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de Pagos.</p>
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