<div class="row">
	<div class="col-md-12">
      <h2 class="title">Nuevo Proveedor</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addproveedor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Razón Social*</label>
    <div class="col-md-6">
      <input type="text" name="razon" class="form-control" id="razon" placeholder="Razón Social">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">RFC*</label>
    <div class="col-md-6">
      <input type="text" name="rfc" required class="form-control" id="rfc" placeholder="RFC">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dirección*</label>
    <div class="col-md-6">
      <input type="text" name="direccion" class="form-control" required id="direccion" placeholder="Dirección Completa">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Código Postal*</label>
    <div class="col-md-6">
      <input type="text" name="cp" class="form-control" id="cp" placeholder="Código Postal">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Correo*</label>
    <div class="col-md-6">
      <input type="text" name="correo" class="form-control" id="correo" placeholder="example@dominio.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="telefono" class="form-control" id="telefono" placeholder="000-00-0-00-00">
    </div>
  </div>

<!--
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-md-6">
<select name="kind" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1">Administrador</option>
    <option value="2">Usuario</option>
</select> 
   </div>
  </div>-->

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>