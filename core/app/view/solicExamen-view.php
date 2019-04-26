<?php
$request = AlumnosData::getAllAlumnosActivos();
if(count($request)>0){
?>
	<div class="callout callout-info">
	<h2><i class='fa fa-file-text'></i> Solicitud de Exámen de KUP</h2>
	</div>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
            <th>Nombre</th>
			<th>Fecha Nacimiento</th>
			<th>CURP</th>
			<th>Categoria</th>
			<th>Solicitar</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->rgi; ?></td>
				<td><?php echo $request1->nombre." ".$request1->apellido; ?></td>
                <td><?php echo $request1->fecha_nac; ?></td>
				<td><?php echo $request1->curp; ?></td>
				<td><?php echo $request1->categoria; ?></td>
				<td>
				<center>
				<a href='./?view=examen&id=<?php echo $request1->rgi;?>'><i class='fa fa-pencil-square-o fa-2x'></i></a>
					<!--<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-examen.php?&rgi=<?php echo $request1->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>-->
				</center>
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
}
?>