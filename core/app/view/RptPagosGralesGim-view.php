<?php
$request = AlumnosData::getPagosGralesGim();
if(count($request)>0){
?>
	<div class="callout callout-info">
	<h2><i class='fa fa-bar-chart'></i> Reporte de Pagos Generales por Mes <strong>GIMNASIA</strong></h2>
	</div>
<!--<a href="index.php?view=newSolicitudExa" class="btn btn-default"><i class='fa fa-file-text-o'></i> Nueva Solicitud</a><br><br>-->
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
            <th>Nombre</th>
			<th>Mayo</th>
			<th>Junio</th>
			<th>Julio</th>
			<th>Agosto</th>
			<th>Septiembre</th>
			<th>Octubre</th>
			<th>Noviembre</th>
			<th>Diciembre</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->rgi; ?></td>
				<td><?php echo $request1->alumno; ?></td>
				<?php
				if ($request1->Mayo>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
                <td class="<?php echo $valor;?>"><?php echo $request1->Mayo; ?></td>
				<?php
				if ($request1->Junio>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Junio; ?></td>
				<?php
				if ($request1->Julio>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Julio; ?></td>
				<?php
				if ($request1->Agosto>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Agosto; ?></td>
				<?php
				if ($request1->Septiembre>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Septiembre; ?></td>
				<?php
				if ($request1->Octubre>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Octubre; ?></td>
				<?php
				if ($request1->Noviembre>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Noviembre; ?></td>
				<?php
				if ($request1->Diciembre>0) {
					$valor = "success";
				} else {
					$valor = "danger";
				}
				?>
				<td class="<?php echo $valor;?>"><?php echo $request1->Diciembre; ?></td>
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