<?php 
$cat4 = AlumnosData::getAllCat4();
$cat5 = AlumnosData::getAllCat5();
$cat6 = AlumnosData::getAllCat6();
?>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-12">
  <div class="box box-primary">
      <div class="box-header">
  <h2><i class="fa fa-clock-o" aria-hidden="true"></i> Configuración Horarios de GIMNASIA</h2>
<br>
<form class="form-horizontal" method="post" action="index.php?view=updatehorarioKIDS" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Categoria KIDS:</label>
    <div class="col-md-6">
      <input type="time" class="form-control" name="kids" value="<?php echo $cat4->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
      <input type="hidden" name="id_kids" value="<?php echo $cat4->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
<form class="form-horizontal"+ method="post" action="index.php?view=updatehorarioinfan" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Categoria INFANTIL</label>
    <div class="col-md-6">
      <input type="time" class="form-control"  name="infan" value="<?php echo $cat5->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
    <input type="hidden" name="id_infan" value="<?php echo $cat5->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
<form class="form-horizontal"+ method="post" action="index.php?view=updatehorarioAvanz" role="form">
<div class="col-md-4">
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-4 control-label">Categoria AVANZADOS</label>
    <div class="col-md-6">
      <input type="time" class="form-control" name="avanz" value="<?php echo $cat6->horario;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-4 col-lg-8">
    <input type="hidden" name="id_avanz" value="<?php echo $cat6->id_categoria;?>">
      <button type="submit" class="btn btn-success ">Actualizar</button>
    </div>
  </div>
  </div>
</form>
	</div>
</div>
</div>
</div>

