<?php $user = SolicitudData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Actualizar Solicitud</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatesolic" role="form">


  <!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Solicitud</label>
    <div class="col-md-6">
      <input type="text" name="name" readonly="readonly" value="<?php echo $user->fecha_solic;?>" class="form-control" id="name">
    </div>
  </div>-->
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Concepto</label>
    <div class="col-md-6">
      <input type="text" name="concepto" value="<?php echo $user->concepto;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Objetivo</label>
    <div class="col-md-6">
      <input type="text" name="objetivo" value="<?php echo $user->objetivo;?>" class="form-control" id="campoDeshabilitado" placeholder="Objetivo">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Lugar</label>
    <div class="col-md-6">
      <input type="text" name="lugar" value="<?php echo $user->lugar;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Salida*</label>
    <div class="col-md-6">
      <input type="text" name="fec_sal" value="<?php echo $user->fecha_salida;?>"required class="form-control" id="fec_sal" placeholder="AAAA-MM-DD">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Retorno*</label>
    <div class="col-md-6">
      <input type="text" name="fec_ret"  value="<?php echo $user->fecha_retorno;?>"required class="form-control" id="fec_ret" placeholder="AAAA-MM-DD">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Alimentación:</label>
    <div class="col-md-6">
      <input type="text" name="alimentacion" value="<?php echo $user->alimentacion;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Gasolina (Vales):</label>
    <div class="col-md-6">
      <input type="text" name="gasolina_vales" value="<?php echo $user->gasolina_vales;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Gasolina (Efectivo):</label>
    <div class="col-md-6">
      <input type="text" name="gasolina_efectivo" value="<?php echo $user->gasolina_efectivo;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Hospedaje:</label>
    <div class="col-md-6">
      <input type="text" name="hospedaje" value="<?php echo $user->hospedaje;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Casetas:</label>
    <div class="col-md-6">
      <input type="text" name="casetas" value="<?php echo $user->casetas;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_solicitud" value="<?php echo $user->id_solicitud;?>">
      <button type="submit" class="btn btn-primary">Actualizar Solicitud</button>
    </div>
  </div>
</form>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#fec_sal').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    });

    $('#fec_ret').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    });
});
</script>
