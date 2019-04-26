<?php $user = UserData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Usuario</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateuser" role="form">


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
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" readonly="readonly" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="fec_nac" class="form-control" id="fec_nac" value="<?php echo $user->fecha_nac;?>">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Banco</label>
    <div class="col-lg-4">
<select name="banco" class="form-control" required>
<option value="<?php echo $user->id_banco; ?>" selected><?php echo $user->nombre; ?></option>
 <?php foreach(BancoData::getAll() as $p):?>
    <option value="<?php echo $p->id_banco; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cuenta Bancaria*</label>
    <div class="col-md-6">
      <input type="text" name="cuenta" value="<?php echo $user->cuenta;?>" class="form-control" required id="username">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
<select name="tipo" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1" <?php if($user->id_tipo==1){ echo "selected"; }?>>Administrador</option>
    <option value="2" <?php if($user->id_tipo==2){ echo "selected"; }?>>Usuario</option>
</select> 
   </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#fec_nac').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true,
        selectMonths:true,
        selectYears: true,  
        min: new Date(1950,1,1),
  max: new Date(1994,11,15)
    });
});
</script>
