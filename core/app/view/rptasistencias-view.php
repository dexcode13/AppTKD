<div class="row">
	<div class="col-md-12">

	<h1><i class='fa fa-bar-chart'></i> Reporte de Asistencias de Alumnos</h1>
			<form>
					<input type="hidden" name="view" value="rptasistencias">
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
<br>
<div class="row">
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
		<?php if($_GET["sd"]!="" && $_GET["ed"]!=""):?>
			<?php 
			$inicio = new DateTime($_GET["sd"]);
			$intervalo = new DateInterval('P1D');
			$fin = new DateTime($_GET["ed"]);
			
			$periodo = new DatePeriod($inicio, $intervalo, $fin);
			$holidays = [
				'2018-05-01' => true
			  ];
			  $cont = 1;
			foreach ($periodo as $fecha) {
				$weekDay = $fecha->format('N');
			   
				if ($weekDay !== '2' && $weekDay !== '4' && $weekDay !== '6' &&  $weekDay !== '7' && !isset($holidays[$fecha->format('Y-m-d')])) 
				{
					//echo $fecha->format('Y-m-d')."<br>";
					
					$cont++;
				}   
			}
			$DiasClase = $cont; 
			$operations = array();

			
			$operations = AsistenciasData::getAllByDateOfficial($_GET["sd"],$_GET["ed"], $DiasClase);
			
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
		<th>TOTAL</th>
		<th>PORCENTAJE</th>
	</thead>
<?php foreach($operations as $operation):
	if ($operation->porcentaje>=80) {
		$msj = "success";
	} else {
		$msj = "danger";
	}
	?>
	<tr class="<?php echo $msj;?>">
		<td><?php echo $operation->rgi; ?></td>
		<td><?php echo $operation->nombre; ?></td>
		<td><?php echo $operation->apellido; ?></td>
		<td><?php echo $operation->total; ?></td>
		<td><?php echo number_format($operation->porcentaje,2); ?> %</td>
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
	<h2>No hay Asistencias</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de Asistencias.</p>
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