<div class="row">
	<div class="col-md-12">

	<h1><i class='fa fa-birthday-cake'></i> Reporte de Cumpleaños</h1>
			<form>
					<input type="hidden" name="view" value="RptPagados">
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
							<select class="form-control" name="sd">
								<option value="">--SELECCIONE UN MES--</option>
								<option value="1">ENERO</option>
								<option value="2">FEBRERO</option>
								<option value="3">MARZO</option>
								<option value="4">ABRIL</option>
								<option value="5">MAYO</option>
								<option value="6">JUNIO</option>
								<option value="7">JULIO</option>
								<option value="8">AGOSTO</option>
								<option value="9">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
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
<br>
<div class="row">
	<div class="col-md-12">
		<?php if(isset($_GET["sd"])):?>
		<?php if($_GET["sd"]!=""):?>
			<?php 			
			$operations = array();

			$operations = AsistenciasData::getByCumpleMes($_GET["sd"]);
			
			?>
			 <?php if(count($operations)>0):?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
<table class="table table-bordered datatable">
	<thead>
		<th>RGI</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Cumpleaños</th>
		<th>Edad a cumplir</th>
		<th>curp</th>
		<th>correo</th>
	</thead>
<?php foreach($operations as $operation):
	?>
	<tr class="<?php //echo $msj;?>">
		<td><?php echo $operation->rgi; ?></td>
		<td><?php echo $operation->nombre; ?></td>
		<td><?php echo $operation->apellido; ?></td>
		<td><?php echo $operation->fecha_nac; ?></td>
		<td><?php echo $operation->cumple; ?> años</td>
		<td><?php echo $operation->curp; ?></td>
		<td><?php echo $operation->correo; ?></td>
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