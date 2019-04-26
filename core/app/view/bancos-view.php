<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo muestra el modulo de perfiles hacienda referencia a su clase
-->
<div class="row">
	<div class="col-md-12">
      <h4 class="title">Catálogo Bancos</h4>
	<a href="index.php?view=newbanco" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Banco</a>
<br><br>
		<?php

		$users = BancoData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Clave</th>
			<th>Nombre</th>
			<th>Razón social</th>
			<th>Activo</th>
			<th style="width:80px;"></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->id_banco; ?></td>
				<td><?php echo $user->nombre ?></td>
				<td><?php echo $user->razon_social; ?></td>
				<td>
					<?php if($user->status):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editbanco&id=<?php echo $user->id_banco;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="#" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
				</tr>
				<?php

			}
?>
</table>
</div>
</div>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>

</div>
</div>