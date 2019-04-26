<?php 
/*
* Archivo persons-view.php
* Contiene las vistas de mostrar Clientes, nueva Cliente y editar Cliente.
* @author evilnapsis
* @date 2016-11-11
*/
if(isset($_GET["op"]) && $_GET["op"]=="all"):?>
<section class="">
<div class="row">
	<div class="col-md-12">
		<h1>Clientes</h1>
	<a href="index.php?view=persons&op=new" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Cliente</a>
<br><br>
		<?php
		$users = PersonData::getAll();
		if(count($users)>0){
			?>
<div class="box box-primary">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>Codigo</th>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->code; ?></td>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=persons&op=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=persons&op=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

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
			echo "<p class='alert alert-danger'>No hay Clientes</p>";
		}
		?>
	</div>
</div>
</section>
<?php elseif(isset($_GET["op"]) && $_GET["op"]=="new"):?>
	<div class="container">
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=persons&op=add" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control"  id="address1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" id="phone1" placeholder="Telefono">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<?php elseif(isset($_GET["op"]) && $_GET["op"]=="edit"):?>
<div class="container">
<?php $user = PersonData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=persons&op=update" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control"  id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<?php endif; ?>
