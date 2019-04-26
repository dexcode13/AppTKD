<?php

$statuses = DepartamentoData::getAll();


?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nuevo usuario</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre (s)*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido (s)*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
    </div>
  </div>

  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Banco</label>
    <div class="col-md-6">
<select name="banco" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="BBWA BAncomer">BBWA BAncomer</option>
    <option value="Santander">Santander</option>
    <option value="Banamex">Banamex</option>
    <option value="BanCoppel">BanCoppel</option>
    <option value="HSBC">HSBC</option>
    <option value="ScotianBank">ScotianBank</option>
</select> 
   </div>
  </div>-->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Banco</label>
    <div class="col-lg-4">
<select name="banco" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(BancoData::getAll() as $p):?>
    <option value="<?php echo $p->id_banco; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cuenta*</label>
    <div class="col-md-6">
      <input type="text" name="cuenta" class="form-control" id="email" placeholder="Cuenta Bancaria">
    </div>
  </div>

  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Clabe Interbancaria*</label>
    <div class="col-md-6">
      <input type="text" name="clabe" class="form-control" id="email" placeholder="Cuenta Bancaria">
    </div>
  </div>-->

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="fec_nac" class="form-control" id="fec_nac" placeholder="AAAA-MM-DD">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-4">
<select name="tipo" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(UserData::getByType() as $p):?>
    <option value="<?php echo $p->id_tipo; ?>"><?php echo $p->tipo; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>

  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
<select name="tipo" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1">Administrador</option>
    <option value="2">Usuario</option>
</select> 
   </div>
  </div>-->


    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Departamento</label>
    <div class="col-lg-4">
<select name="departamento" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($statuses as $p):?>
    <option value="<?php echo $p->id_departamento; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div> 

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Usuario</button>
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