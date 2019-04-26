<div class="row">
	<div class="col-md-12">
      <h2 class="title">Asignación de Perfiles</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=add-asig-perfil" role="form">
    
    <div class="form-group"><!--inicio form-group-->
        <label for="inputEmail1" class="col-lg-1 control-label">Usuario</label>
        <div class="col-lg-3">
          <select name="usuario" class="form-control" required>
          <option value="">-- SELECCIONE --</option>
          <?php foreach(UserData::getAll() as $p):?>
              <option value="<?php echo $p->id; ?>"><?php echo $p->name.' '.$p->lastname; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <label for="inputEmail1" class="col-lg-1 control-label">Perfil</label>
        <div class="col-lg-3">
          <select name="perfil" class="form-control" required>
          <option value="">-- SELECCIONE --</option>
          <?php foreach(PerfilData::getAll() as $p):?>
              <option value="<?php echo $p->id_perfil; ?>"><?php echo $p->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar Perfil</button>
    </div><!--fin form-group-->
  </form>
</div>
</div>
 <?php
		$users = UserData::getPerfiles();
		if(count($users)>0){
			?>
			<div class="box box-primary">
			<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<!--<th>ID</th>-->
			<th>Nombre</th>
			<th>Perfil</th>
			<th style="width:80px;">Acción</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<!--<td><?php echo $user->id; ?></td>-->
				<td><?php echo $user->nombre; ?></td>
				<td><?php echo $user->perfil; ?></td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editperfilAsig&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="#" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
				</tr>
				<?php
			}
    }
    ?>
</table>
</div>
</div>
