<div class="row">
	<div class="col-md-12">

      <h2 class="title">Asignar Permisos</h2>
	  <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=add-asig-permiso" role="form">
	  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">Perfil</label>
			<div class="col-lg-4">
				<select name="id_perfil" class="form-control" required>
				<option value="">-- SELECCIONE --</option>
				<?php foreach(PerfilData::getAll() as $p):?>
          <option value="<?php echo $p->id_perfil; ?>"><?php echo $p->name; ?></option>
        <?php endforeach; ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Asignar Permiso</button>
			</div>
	


	<!--<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Usuario</a>-->
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

		$users = UserData::Modulos();
		if(count($users)>0){
			// si hay usuarios
			?>
			
			<div class="box box-primary">
			<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Módulo</th>
			<th>Consultar</th>
			<th>Agregar</th>
			<th>Editar</th>
			<th>Eliminar</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td>
				<input type="hidden" name="id_modulo" value="<?php echo $user->id_modulo; ?>">
				<?php echo $user->nombre; ?>
				</td>
				<td>
				<div class="col-md-6">
					<div class="checkbox">
						<label>
						
						<input type="checkbox" name="consultar"> 
						</label>
					</div>
				</div>
				</td>
				<td>
				<div class="col-md-6">
				<div class="checkbox">
					<label>
					
					<input type="checkbox" name="agregar"> 
					</label>
				</div>
				</div>
				</td>
				<td>
				<div class="col-md-6">
				<div class="checkbox">
					<label>
					
					<input type="checkbox" name="editar"> 
					</label>
				</div>
				</div>
				</td>
				<td>
				<div class="col-md-6">
				<div class="checkbox">
					<label>
					
					<input type="checkbox" name="eliminar"> 
					</label>
				</div>
				</div>
				</td>
				<!--<td style="width:180px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
<a href="index.php?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>-->
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			</form>
			<?php



		}else{
			// no hay usuarios
			echo "No hay modulos";
		}


		?>

</div>
</div>