<?php 
$cat1 = AlumnosData::getAllCat1();
$cat2 = AlumnosData::getAllCat2();
$cat3 = AlumnosData::getAllCat3();
$cat7 = AlumnosData::getAllCat7();
?>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-12">
  <div class="box box-primary">
      <div class="box-header">
  <h2><i class="fa fa-clock-o" aria-hidden="true"></i> Configuración de Horarios</h2>
<br>
<form class="form-horizontal" method="post" action="index.php?view=updatehorarioInf" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Categoria Infantiles:</label>
    <div class="col-md-6">
      <input type="time" class="form-control" name="infantil" value="<?php echo $cat1->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
      <input type="hidden" name="id_inf" value="<?php echo $cat1->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
<form class="form-horizontal"+ method="post" action="index.php?view=updatehorarioJuv" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Categoria Juveniles</label>
    <div class="col-md-6">
      <input type="time" class="form-control"  name="juvenil" value="<?php echo $cat2->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
    <input type="hidden" name="id_juv" value="<?php echo $cat2->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
<form class="form-horizontal"+ method="post" action="index.php?view=updatehorarioAdul" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Categoria Juveniles-Adultos</label>
    <div class="col-md-6">
      <input type="time" class="form-control" name="adulto" value="<?php echo $cat3->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
    <input type="hidden" name="id_adul" value="<?php echo $cat3->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
</form>
<form class="form-horizontal"+ method="post" action="index.php?view=updatehorarioNegras" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Categoria Cintas Negras</label>
    <div class="col-md-6">
      <input type="time" class="form-control" name="negra" value="<?php echo $cat7->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
    <input type="hidden" name="id_negra" value="<?php echo $cat7->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
	</div>
</div>
</div>
</div>

