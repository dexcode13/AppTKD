<?php
$request = BancoData::Cuentas();
if(count($request)>0){
?>
<h1>Cuentas Bancarias</h1>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Cuenta</th>
            <!--<th>Clabe</th>-->
			<th>Banco</th>
			<th>Usuario</th>
			<th>Correo</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><?php echo $request1->cuenta; ?></td>
				<!--<td><?php echo $request1->clabe_ban;?></td>-->
                <td><?php echo $request1->nombre; ?></td>
				<td><?php echo $request1->name." ".$request1->lastname; ?></td>
				<td><?php echo $request1->email; ?></td>
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