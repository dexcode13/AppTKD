<?php
$request = AlumnosData::getAnualidadesGIM();
if(count($request)>0){
?>
	<div class="callout callout-info">
	<h2><i class='fa fa-file-text'></i> Reporte de Pagos Anualidades GIM</h2>
	</div>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
			<th>Folio</th>
            <th>Nombre</th>
            <th>Anualidad</th>
			<th>Fecha Pago</th>
			<th>Monto</th>
			<th>Status</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->rgi; ?></td>
				<td><?php echo $request1->folio; ?></td>
				<td><?php echo $request1->name; ?></td>
				<td><?php echo $request1->ciclo; ?></td>
                <td><?php echo $request1->fecha_pago; ?></td>
				<td>$ <?php echo $request1->monto; ?></td>
				<td><?php 
				if($request1->status==1){
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagado</p><br>"; 
				}
				/*else if($request1->status==2){
					echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Atrasado</p><br>"; 
				}*/else{
					echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p><br>";
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
}
?>