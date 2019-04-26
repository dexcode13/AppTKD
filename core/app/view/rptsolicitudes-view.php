<?php
$request = ReportesData::Solicitudes();
if(count($request)>0){
?>
<h1>Reporte de Solicitudes</h1>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
            <th>Nombre</th>
			<th>Vales</th>
			<th>Efectivo</th>
			<th>Concepto</th>
			<th>Salida</th>
			<th>Retorno</th>
			<th>Estado</th>
			<th>Fecha Estado</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->id_solicitud; ?></td>
				<td><?php echo $request1->nombre;?></td>
                <td>$ <?php echo $request1->vales; ?></td>
				<td>$ <?php echo $request1->efectivo; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
				<td><?php echo $request1->fecha_retorno; ?></td>
				<td><?php echo $request1->status; ?></td>
				<td><?php echo $request1->fecha_status; ?></td>
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