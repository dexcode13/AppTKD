<div class="row">
	<div class="col-md-12">

      <h2 class="title">Proyectos</h2>
	<a href="index.php?view=newproject" class="btn btn-default"><i class='fa fa-flask'></i> Nuevo Proyecto</a>
	<br><br>	<?php

		$users = ProjectData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td style="width:280px;">
				<a href="index.php?view=editproject&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delproject&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay Proyectos</p>";
		}


		?>


	</div>
</div>