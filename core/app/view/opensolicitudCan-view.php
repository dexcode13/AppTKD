<?php $user = SolicitudData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Vista de la Solicitud</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=autorizarsolic" role="form">


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
      <input type="text" name="username" value="<?php echo $user->objetivo;?>" class="form-control" id="campoDeshabilitado" placeholder="Objetivo">
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
  <!--
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Alimentación:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->alimentacion;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Gasolina:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->gasolina;?>" class="form-control" id="campoDeshabilitado">
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
  </div>-->
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Monto Total:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="$ <?php echo $user->total_solic;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
    <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Estado:</label>
    <div class="col-md-6">
      <?php
      if($user->id_status==2)
      {
        $status="Cancelada";
      }
      ?>
      <input type="text" name="email" value="<?php echo $status;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
     <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Observación:</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->observacion;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
 </fieldset>
</form>
	</div>
</div>
