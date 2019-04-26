<?php 
  $user = AlumnosData::getByAlumno($_GET["rgi"]);
  date_default_timezone_set('America/Merida');
  setlocale(LC_TIME, 'spanish');
  $mes = strftime("%B");
  $mes_mayus = strtoupper($mes);
  //$day = date('d');

  $day= date('d');
  if($day>=1 && $day<6)
  {
      $pago = 250;
  }
  else if ($day>5 && $day<11)
  {
      $pago = 300;
  }
  else if($day>=11 && $day<16)
  {
      $pago = 350;
  }
  else 
  {
    $pago = 250;
    $msj = "Pago Adelantado";
  }
?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title"><i class='fa fa-money'></i> Cobro de Mensualidad</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=pagarMes" role="form">
  <fieldset disabled>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">RGI:</label>
    <div class="col-md-2">
      <input type="text" name="name" value="<?php echo $user->rgi;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Alumno:</label>
    <div class="col-md-3">
      <input type="text" name="lastname" value="<?php echo $user->nombre." ".$user->apellido;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  </fieldset>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Importe:</label>
    <div class="col-md-3">
      <input type="text" name="monto" value="<?php echo $pago;?>" readonly class="form-control" id="campoDeshabilitado">
      <!--<div class="alert alert-info">
        <strong>¡<?php echo $msj;?>!</strong>
      </div>-->
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Mes:</label>
    <div class="col-md-3">
      <input type="text" name="mes" value="<?php echo $mes_mayus;?>" class="form-control" id="campoDeshabilitado" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="rgi" value="<?php echo $user->rgi;?>">
      <button type="submit" class="btn btn-primary">Pagar Mensualidad</button>
    </div>
  </div>
</form>
	</div>
</div>
