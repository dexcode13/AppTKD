<?php
$request = ReportesData::RecibosGenerados();
if(count($request)>0){
?>
<h1>Recibos de Pagos</h1>
<a href="index.php?view=newRecibo" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nuevo Recibo</a><br><br>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Folio</th>
			<th>RFC</th>
            <th>Nombre</th>
			<th>Concepto</th>
			<th>Monto</th>
			<th>Fecha Emisión</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->folio; ?></td>
				<td><?php echo $request1->rfc;?></td>
				<td><?php echo $request1->nombre;?></td>
                <td><?php echo $request1->concepto; ?></td>
				<td>$ <?php echo $request1->monto; ?></td>
				<td><?php echo $request1->fecha; ?></td>
				<td>
				<center><button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-recibo.php?&folio=<?php echo $request1->folio; ?>','_blank')"><i class=" fa fa-print"></i></button></center>
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