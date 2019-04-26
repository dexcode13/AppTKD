<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo muestra el modulo de Proveedores haciendo referencia a su clase
-->
<div class="row">
	<div class="col-md-12">

      <h2 class="title">Proveedores</h2>


	<a href="index.php?view=newproveedor" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Proveedor</a>
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
		$users = ProveedorData::getAll();
		
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Razón Social</th>
			<th>RFC</th>
			<th>Dirección</th>
			<th>Código Postal</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->rfc; ?></td>
				<td><?php echo $user->direccion; ?></td>
				<td><?php echo $user->cp; ?></td>
				<td><?php echo $user->correo; ?></td>
				<td><?php echo $user->telefono; ?></td>
				<td style="width:180px;">
				<a href="index.php?view=editproveedor&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
<a href="index.php?view=delproveedor&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			<?php



		}else{
			// no hay usuarios
			echo "<p class='alert alert-danger'>No hay Proveedores</p>";
		}


		?>

</div>
</div>
