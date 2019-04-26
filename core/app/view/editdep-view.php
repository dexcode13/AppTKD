<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo carga el formulario con los datos precargados de la base de datos, usando
la clase 
-->
<?php $user = DepartamentoData::getById($_GET["id"]);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Departamento</h2>


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatedep" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripción</label>
    <div class="col-md-6">
      <input type="text" name="descripcion" value="<?php echo $user->descripcion;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Gerente</label>
    <div class="col-md-6">
      <select name="gerente" class="form-control" required>
          <option value=""><?php echo $user->nombre;?></option>
          <?php foreach(UserData::getAll() as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name.' '.$p->lastname; ?></option>
            <?php endforeach; ?>
      </select>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_departamento" value="<?php echo $user->id_departamento;?>">
      <button type="submit" class="btn btn-primary">Actualizar Departamento</button>
    </div>
  </div>
</form>
</div>
</div>
