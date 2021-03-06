<div class="row">
	<div class="col-md-12">

      <h2 class="title">Usuarios</h2>


	<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Usuario</a>
<br><br>
		<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "Agustin";
		$u->lastname = "Ramos";
		$u->email = "evilnapsis@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Email</th>
			<th>Username</th>
			<th>Activo</th>
			<th>Tipo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->username; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->id_tipo==1):?>
					Administrador
					<?php elseif($user->id_tipo==2):?>
					Usuario
					<?php endif; ?>
				</td>
				<td style="width:180px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
<a href="index.php?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			// no hay usuarios
		}


		?>

</div>
</div>
