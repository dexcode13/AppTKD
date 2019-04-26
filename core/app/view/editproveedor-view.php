<?php $user = ProveedorData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">

      <h2 class="title">Editar Proveedor</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateproveedor" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Razon Social*</label>
    <div class="col-md-6">
      <input type="text" name="razon" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">RFC*</label>
    <div class="col-md-6">
      <input type="text" name="rfc" value="<?php echo $user->rfc;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dirección*</label>
    <div class="col-md-6">
      <input type="text" name="direccion" value="<?php echo $user->direccion;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Código Postal*</label>
    <div class="col-md-6">
      <input type="text" name="cp" value="<?php echo $user->cp;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Correo*</label>
    <div class="col-md-6">
      <input type="text" name="correo" value="<?php echo $user->correo;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="telefono" value="<?php echo $user->telefono;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
    </div>
  </div>
</form>
</div>
</div>
