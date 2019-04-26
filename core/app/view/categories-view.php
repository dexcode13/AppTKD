<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo muestra el modulo de perfiles hacienda referencia a su clase
-->
<div class="row">
	<div class="col-md-12">
      <h4 class="title">Perfiles</h4>
	<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Perfil</a>
<br><br>
		<?php

		$users = CategoryData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th style="width:80px;"></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="index.php?view=delcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
				</tr>
				<?php

			}
?>
</table>
</div>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>

</div>
</div>