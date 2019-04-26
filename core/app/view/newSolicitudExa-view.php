<div class="container" >
<div class="row" id="contenedor">
	<div class="col-md-12">
	<h1>Buscar Alumno</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=generarRecibo" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del alumno:</label>
    <div class="col-md-6">
      <input type="text" name="alumno" class="form-control" id="alumno" placeholder="Escriba el nombre del alumno...">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
		<input type="hidden" name="id_alumno" value="<?php echo $p->id_perfil;?>">
      <button type="submit" class="btn btn-primary">Generar Exámen</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
