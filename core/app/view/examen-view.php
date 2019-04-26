<?php $user = AlumnosData::getByAlumnoExa($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">  
  <div class="box box-primary">
      <div class="box-header">
      <h2 class="title"><i class="fa fa-file-text" aria-hidden="true"></i> Exámen de <?php echo $user->nombre." ".$user->apellido;?></h2>  
    <form class="form-horizontal" method="post" target="_blank" action="./?action=CrearExa" role="form">
    <div class=" col-md-8 col-lg-8">
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">RGI:</label>
    <div class="col-md-4">
      <input type="text" name="rgi" readonly value="<?php echo $user->rgi;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-4">
      <input type="text" name="name" value="<?php echo $user->nombre;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-4">
      <input type="text" name="lastname" value="<?php echo $user->apellido;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Examen Anterior:</label>
    <div class="col-md-4">
      <input type="text" name="fecha_exa_ant" readonly  value="<?php echo $user->ant;?>" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grado y Cinta Actual:</label>
    <div class="col-md-4">
      <input type="text" name="grado_cinta_actual" readonly value="<?php echo $user->cinta;?>" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Examen:</label>
    <div class="col-md-4">
      <input type="date" name="fecha_exa"  value="" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Grado y Cinta a Pasar:</label>
    <div class="col-md-4">
      <input type="text" name="grado_cinta_apasar" value="" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <!--<input type="hidden" name="rgi" value="<?php echo $user->rgi;?>">-->
    <input type="hidden" name="id_alumno" value="<?php echo $user->id_alumno;?>">
      <button type="submit" class="btn btn-success">Generar Exámen</button>
      <!--<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-examen.php?&rgi=<?php echo $user->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>-->
    </div>
  </div>
  </div><!--fin datos izquierda-->
  <div class=" col-md-4 col-lg-4">
  <img src="<?php echo $user->dir_foto;?>" class="img-responsive" alt="Alumno"> 
  </div><!--fin datos derecha-->
</form>
	</div>
</div>
</div>
</div>
