<?php 
  $user = AlumnosData::getByFaltas($_GET["id"], $_GET["fecha"]);
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
    $msj="Pago Adelantado";
  }
?>
<div class="row">
	<div class="col-md-12">
      <h2 class="title"><i class='fa fa-edit'></i> Justificar Falta</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateFalta" role="form">
  <fieldset disabled>
   <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">RGI:</label>
    <div class="col-md-4">
      <input type="text" name="name" value="<?php echo $user->rgi;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Alumno:</label>
    <div class="col-md-4">
      <input type="text" name="lastname" value="<?php echo $user->nombre." ".$user->apellido;?>" class="form-control" id="campoDeshabilitado">
    </div>
  </div>
  </fieldset>
  <div class="form-group">
    <label for="disabledTextInput" class="col-lg-2 control-label">Fecha Clase:</label>
    <div class="col-md-4">
      <input type="text" name="fecha" value="<?php echo $user->fecha;?>" readonly class="form-control" id="campoDeshabilitado">
      <!--<div class="alert alert-info">
        <strong>¡<?php echo $msj;?>!</strong>
      </div>-->
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Asistencia:</label>
    <div class="col-lg-4">
      <select name="status" class="form-control" required>
          <option value="">-- SELECCIONE --</option>
          <!--<option value="<?php echo $user->status; ?>">Falta</option>-->
          <option value="3">Justificación</option>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Observación:</label>
    <div class="col-lg-4">
    <textarea class="form-control" rows="5" name="observacion"></textarea>
    </div> 
    </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_asistencia" value="<?php echo $user->id_asistencia;?>">
    <input type="hidden" name="rgi" value="<?php echo $user->rgi;?>">
    <input type="hidden" name="id_alumno" value="<?php echo $user->id_alumno;?>">
      <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </div>
  </div>
</form>
	</div>
</div>
