<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo carga el formulario con los datos precargados de la base de datos, usando
la clase 
-->
<?php $user = BancoData::getById($_GET["id"]);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<div class="row">
	<div class="col-md-12">
      <h2 class="title">Editar Banco</h2>


		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatebanco" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->nombre;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Razón Social</label>
    <div class="col-md-6">
      <input type="text" name="razon" value="<?php echo $user->razon_social;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($user->status){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_banco" value="<?php echo $user->id_banco;?>">
      <button type="submit" class="btn btn-primary">Actualizar Banco</button>
    </div>
  </div>
</form>
</div>
</div>
