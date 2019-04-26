<?php
$request = ReportesData::Vales();
if(count($request)>0){
?>
<h1>Reporte de Vales</h1>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
            <th>Nombre</th>
			<th>Monto</th>
			<th>Concepto</th>
			<th>Salida</th>
			<th>Retorno</th>
			
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->id_solicitud; ?></td>
				<td><?php echo $request1->nombre;?></td>
                <td>$ <?php echo $request1->monto; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
				<td><?php echo $request1->fecha_retorno; ?></td>
				
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