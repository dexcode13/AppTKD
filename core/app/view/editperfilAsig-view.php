<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo carga el formulario con los datos precargados de la base de datos, usando
la clase 
-->
<?php $user = PerfilData::getByIdAsig($_GET["id"]);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Perfil Asignado</h2>


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateperfilAsig" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->usuario;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

   <div class="form-group">
   <label for="inputEmail1" class="col-lg-2 control-label">Perfil*</label>
    <div class="col-md-6">
          <select name="perfil" class="form-control" required>
          <option value="<?php echo $user->id_p; ?>" selected><?php echo $user->perfil; ?></option>
          <?php foreach(PerfilData::getAll() as $p):?>
              <option value="<?php echo $p->id_perfil; ?>"><?php echo $p->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </div>
  </div>
</form>
</div>
</div>
