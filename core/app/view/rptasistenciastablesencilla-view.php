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
			$operations = array();

			
			$operations = AsistenciasData::getAllByDateOfficial($_GET["sd"],$_GET["ed"]);
			
			?>
			 <?php if(count($operations)>0):?>
<table class="table table-bordered">
	<thead>
		<th>Id asistencia</th>
		<th>id_alumno</th>
		<th>rgi</th>
		<th>fecha</th>
		<th>status</th>
		<th>hora entrada</th>
	</thead>
<?php foreach($operations as $operation):?>
	<tr>
		<td><?php echo $operation->id_asistencia; ?></td>
		<td><?php echo $operation->id_alumno; ?></td>
		<td><?php echo $operation->rgi; ?></td>
		<td><?php echo $operation->fecha; ?></td>
		<td><?php echo $operation->status; ?></td>
		<td><?php echo $operation->hora_entrada; ?></td>
	</tr>
<?php endforeach; ?>
</table>
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
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<!--<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
			<th>Alumno</th>
            <th>Fecha</th>
			<th>Asistencia</th>
			<th>Hora Entrada</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->rgi;?></td>
				<td><?php echo $request1->alumno; ?></td>
				<td><?php echo $request1->fecha; ?></td>
                <td style="text-align:center">
				<?php 
				if($request1->status==1){
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Asistencia</p><br>"; 
				}
				else if($request1->status==2){
					echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Retardo</p><br>"; 
				}else if($request1->status==3){
					echo "<p class='label label-info'><i class='glyphicon glyphicon-bullhorn'></i> Justificación</p><br>";
				}else{
					echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Falta</p><br>";
				}
				?>
				</td>
				<td><?php 
				if ($request1->status==0){
					echo "";
					}else{
						echo $request1->hora;
					}
				?></td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			</div>
			</div>-->