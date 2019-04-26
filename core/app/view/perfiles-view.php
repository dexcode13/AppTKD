<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo muestra el modulo de perfiles hacienda referencia a su clase
-->
<div class="row">
	<div class="col-md-12">
      <h4 class="title">Perfiles</h4>
	<a href="index.php?view=newperfil" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Perfil</a>
<br><br>
		<?php

		$users = PerfilData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Días Max</th>
			<th>Monto Max</th>
			<th>Activo</th>
			<th style="width:80px;"></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->diasmax; ?></td>
				<td>$ <?php echo $user->montomax; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editperfil&id=<?php echo $user->id_perfil;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="index.php?view=delperfiles&id=<?php echo $user->id_perfil;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
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