<?php $user = SolicitudData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Autorizar y dar Vobo a la Solicitud</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=autorizarVobosolic" role="form">


  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Solicitud</label>
    <div class="col-md-6">
      <input type="text" name="name" readonly="readonly" value="<?php echo $user->fecha_solic;?>" class="form-control" id="name">
    </div>
  </div>-->
  <fieldset disabled>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Fecha Solicitud</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->fecha_solic;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Concepto</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->concepto;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Objetivo</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $user->objetivo;?>" class="form-control" id="campoDeshabilitado" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Lugar</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->lugar;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>

<div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Fecha Salida</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->fecha_salida;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Fecha Retorno</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->fecha_retorno;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Alimentación:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->alimentacion;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Gasolina (Vales):</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->gasolina_vales;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Gasolina (Efectivo):</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->gasolina_efectivo;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Hospedaje:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->hospedaje;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Casetas:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->casetas;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Monto Total:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->total_solic;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
 </fieldset>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Vo.Bo.</label>
    <div class="col-md-6">
<select name="vobo" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1">Autorizar</option>
    <option value="0">Cancelar</option>
</select> 
   </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-md-6">
<select name="kind" class="form-control" required>
    <option value="">-- SELECCIONE --</option>
    <option value="1">Autorizar</option>
    <option value="2">Cancelar</option>
    <option value="3">Pendiente</option>
</select> 
   </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_solicitud" value="<?php echo $user->id_solicitud;?>">
      <button type="submit" class="btn btn-primary">Autorizar Solicitud</button>
    </div>
  </div>
</form>
	</div>
</div>
