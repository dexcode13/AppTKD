<?php
$request = AsistenciasData::getAllAsistencias();
if(count($request)>0){
?>
	
<h1><i class='fa fa-bar-chart'></i> Asistencias de Alumnos</h1>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
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
			</div>
            <?php
}else{
	echo "<div class='alert alert-warning'>
	<strong>No hay Asistencias en la base de datos!</strong> Regresar <a href='./?view=index' class='alert-link'>read this message</a>.
  </div>";
}
?>