<!--
Desarrollado por: Ing. Iván Hernández
Fecha: 26/04/2017
Función: Archivo que permite visualizar los registros de tickets filtrando por status
-->
<?php
if(!isset($_GET["status"])){ Core::alert("Error!"); Core::redir("./");}
$stat = DepartamentoData::getById($_GET["status"]);
?>

<div class="">
<div class="row">
<div class="col-md-12">

<h2 class="title">Tickets [<?php echo $stat->name; ?>]</h2>


<a href="./index.php?view=newticket" class="btn btn-info">Nuevo Ticket</a>
<br><br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="tickets">
        <?php
$projects = ProveedorData::getAll();
$categories = PerfilData::getAll();
        ?>

  <div class="form-group">
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-search"></i></span>
		  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-flask"></i></span>
<select name="project_id" class="form-control">
<option value="">PROYECTO</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id_proveedor; ?>" <?php if(isset($_GET["project_id"]) && $_GET["project_id"]==$p->id_proveedor){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
<select name="category_id" class="form-control">
<option value="">CATEGORIA</option>
  <?php foreach($categories as $p):?>
    <option value="<?php echo $p->id_perfil; ?>" <?php if(isset($_GET["category_id"]) && $_GET["category_id"]==$p->id_perfil){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-4">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		  <input type="date" name="date_at" value="<?php if(isset($_GET["date_at"]) && $_GET["date_at"]!=""){ echo $_GET["date_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>

    <div class="col-lg-2">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>

<?php
$users= array();
if((isset($_GET["q"]) && isset($_GET["project_id"]) && isset($_GET["category_id"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["project_id"]!="" || $_GET["category_id"]!="" || $_GET["date_at"]!="") ) {
$sql = "select * from ticket  ";
if($_GET["q"]!=""){
	$sql .= " (title like '%$_GET[q]%' or description like '%$_GET[q]%') ";
}

if($_GET["project_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " id_proveedor = ".$_GET["project_id"];
}

if($_GET["category_id"]!=""){
if($_GET["q"]!=""||$_GET["project_id"]!=""){
	$sql .= " and ";
}

	$sql .= " id_perfil = ".$_GET["category_id"];
}



if($_GET["date_at"]!=""){
if($_GET["q"]!=""||$_GET["project_id"]!="" ||$_GET["category_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " date(created_at) = \"".$_GET["date_at"]."\"";
}

	$sql .= " and id_departamento=$_GET[status]";

		$users = TicketData::getBySQL($sql);
}else{
		$users = TicketData::getAllByStatus($_GET["status"]);

}
?>

<?php
if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Id</th>
			<th>Asunto</th>
			<th>Proyecto</th>
			<th>Prioridad</th>
			<th>Cliente</th>
			<th>Asignado</th>
			<th>Estado</th>
			<th>Fecha</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$project  = $user->getProject();
				$medic = $user->getPriority();
				?>
				<tr>
				<td><a href='./?view=openticket&id=<?php echo $user->id_ticket;?>'>#<?php echo $user->id_ticket; ?></a></td>
				<td><?php echo $user->title; ?></td>
				<td><?php echo $project->name; ?></td>
				<td><?php echo $medic->name; ?></td>
				<td>
					<?php
					if($user->id_person!=null){
						$cli = PersonData::getById($user->id_person);
						echo $cli->name." ".$cli->lastname; 
					}
					?>
				</td>
				<td>
					<?php
					if($user->id_asigned!=null){
						$cli = UserData::getById($user->id_asigned);
						echo $cli->name." ".$cli->lastname; 
					}
					?>					
				</td>
				<td><?php echo $user->getStatus()->name; ?></td>
				<td><?php echo $user->created_at; ?></td>
				<td style="width:180px;">

				<a href="index.php?view=editticket&id=<?php echo $user->id_ticket;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=delticket&id=<?php echo $user->id_ticket;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay tickets</p>";
		}
		?>

</div>
</div>
</div>
