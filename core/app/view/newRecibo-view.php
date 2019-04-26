<div class="container" >
<div class="row" id="contenedor">
	<div class="col-md-12">
	<h1>Datos del Recibo </h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=generarRecibo" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">RFC</label>
    <div class="col-md-6">
      <input type="text" name="rfc" class="form-control" id="name" placeholder="XXXXXXXXXX">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente*</label>
    <div class="col-md-6">
      <input type="text" name="cliente" required class="form-control" id="fec_sal" placeholder="Nombre del Cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Correo*</label>
    <div class="col-md-6">
      <input type="text" name="correo" required class="form-control" id="fec_sal" placeholder="example@dominio.com">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Concepto*</label>
    <div class="col-md-6">
      <input type="text" name="concepto"  required class="form-control" id="fec_ret" placeholder="Concepto">
    </div>
  </div>
      <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Monto*</label>
    <div class="col-md-6">
      <input type="text" name="monto" required class="form-control" id="phone1" placeholder="0.00">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Monto*</label>
    <div class="col-md-6">
      <input type="date" name="monto" required class="form-control" id="phone1" placeholder="0.00">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
		<input type="hidden" name="id_perfil" value="<?php echo $p->id_perfil;?>">
      <button type="submit" class="btn btn-primary">Generar Recibo</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>