<?php
$request = AlumnosData::getPrintGrales();
if(count($request)>0){
?>
		<div class="callout callout-info">
	<h2><i class='fa fa-file-text'></i> Reimpresion de Tickets de Generales</h2>
	</div>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Concepto</th>
      <th>Fecha Pago</th>
			<th>Importe</th>
			<th>Acción</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->folio;?></td>
				<td><?php echo $request1->nombre; ?></td>
				<td><?php echo $request1->concepto; ?></td>
        <td><?php echo $request1->fecha_pago; ?></td>
				<td>$ <?php echo $request1->importe; ?></td>
				<td>
				<a href='./?action=ReimprimirCobro&id=<?php echo $request1->id_cobro;?>'><button type="button" class="btn btn-social-icon btn-success"><i class=" fa fa-print"></i></button></a>
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
	<strong>No hay Tickets en la base de datos!</strong><a href='./?view=index' class='alert-link'> Regresar</a>.
  </div>";
}
?>