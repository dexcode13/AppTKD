<?php
$request = ReportesData::Comprobaciones();
if(count($request)>0){
?>
<h1>Reporte de Comprobaciones</h1>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
            <th>Nombre</th>
			<!--<th>Concepto</th>-->
			<th>Gasolina</th>
			<th>Alimentacion</th>
			<th>Casetas</th>
			<th>Hospedaje</th>
			<th>Total S</th>
			<th>Gasolina</th>
			<th>Alimentacion</th>
			<th>Casetas</th>
			<th>Hospedaje</th>
			<th>Total C</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->id_solicitud; ?></td>
				<td><?php echo $request1->nombre;?></td>
                <!--<td><?php echo $request1->concepto; ?></td>-->
				<td>$ <?php echo $request1->gasolina_efectivo; ?></td>
				<td>$ <?php echo $request1->alimentacion; ?></td>
				<td>$ <?php echo $request1->casetas; ?></td>
				<td>$ <?php echo $request1->hospedaje; ?></td>
				<td class="danger">$ <?php echo $request1->total_solicitado; ?></td>
				<td>$ <?php echo $request1->gasolina_c; ?></td>
				<td>$ <?php echo $request1->alimentacion_c; ?></td>
				<td>$ <?php echo $request1->casetas_c; ?></td>
				<td>$ <?php echo $request1->hospedaje_c; ?></td>
				<td class="danger">$ <?php echo $request1->total; ?></td>
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