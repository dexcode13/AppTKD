<?php
$request = AsistenciasData::getAllFaltas();
if(count($request)>0){
?>
	<div class="callout callout-info">
	<h2><i class='fa fa-edit'></i> Justificación de Faltas TKD</h2>
	</div>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
			<th>Alumno</th>
			<th>Fecha</th>
			<th>Categoria</th>
			<th>Horario</th>
			<th>Asistencia</th>
			
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td>
				<?php 
				if ($request1->status==0) {
					?>
					<a href='./?view=editAsistencia&id=<?php echo $request1->rgi;?>&fecha=<?php echo $request1->fecha;?>'><?php echo $request1->rgi; ?></a>
				<?php
				} else {
					echo $request1->rgi;
				}
				?>
				</td>
				<td><?php echo $request1->alumno; ?></td>
				<td><?php echo $request1->fecha; ?></td>
				<td><?php if($request1->id_categoria==1){
					echo "PRE-ESCOLAR";
					}else if($request1->id_categoria==2){
						echo "INFANTIL-JUVENIL";
					}else{
						echo "INFANTIL-JUVENIL ADULTOS";
					}?></td>
				<td><?php echo $request1->horario; ?></td>
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
	<strong>No hay Faltas en la base de datos!</strong> Regresar <a href='./?view=index' class='alert-link'>read this message</a>.
  </div>";
}
?>