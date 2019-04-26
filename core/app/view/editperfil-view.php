<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo carga el formulario con los datos precargados de la base de datos, usando
la clase 
-->
<?php $user = PerfilData::getById($_GET["id"]);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Perfil</h2>


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateperfil" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Días Max*</label>
    <div class="col-md-6">
      <input type="text" name="dias" value="<?php echo $user->diasmax;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Monto Max*</label>
    <div class="col-md-6">
      <input type="text" name="monto" value="<?php echo $user->montomax;?>" class="form-control" id="name" placeholder="Nombre">
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
    <input type="hidden" name="user_id" value="<?php echo $user->id_perfil;?>">
      <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </div>
  </div>
</form>
</div>
</div>
