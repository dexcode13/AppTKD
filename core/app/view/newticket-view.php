<?php
$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();

$statuses = StatusData::getAll();
$kinds = KindData::getAll();

?>

<div class="row">
<div class="col-md-8">
      <h2 class="title">Nuevo Ticket</h2>
<form class="form-horizontal" role="form" method="post" action="./?action=addticket" enctype="multipart/form-data">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-10">
<select name="kind_id" class="form-control" required>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" required placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Adjunto</label>
    <div class="col-lg-10">
      <input type="file" name="file">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-4">
<select name="project_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Pefil</label>
    <div class="col-lg-4">
<select name="category_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach(CategoryData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
    <div class="col-lg-4">
<select name="priority_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($priorities as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Departamento</label>
    <div class="col-lg-4">
<select name="status_id" class="form-control" required>
  <?php foreach($statuses as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-lg-10">
<select name="person_id" class="form-control" >
<option value="">-- SELECCIONE --</option>
  <?php foreach(PersonData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Asignar a</label>
    <div class="col-lg-10">
<select name="asigned_id" class="form-control" >
<option value="">-- SELECCIONE --</option>
  <?php foreach(UserData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>

  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Ticket</button>
    </div>
  </div>
</form>
</div>
</div>