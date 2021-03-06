<?php 
/*
* Archivo comprobaciones-view.php
* Contiene las vistas de comprobaciones de las solicitudes dependiendo el perfil
* @author Ing. Iván Hernández
* @date 2017-07-08
*/
if(isset($_GET["op"]) && $_GET["op"]=="all"):?>
<section class="">
<div class="row">
	<div class="col-md-12">
		<h1>Comprobación de Viaticos</h1>
	<!--<a href="index.php?view=solicitudes&op=new" class="btn btn-default"><i class='fa fa-user'></i> Nueva Solicitud</a>-->
<br><br>
		<?php
    $p=UserData::getById($_SESSION["user_id"]);
    //Si es admin
    if($p->id_tipo==1){
      $request = ComprobantesData::getAll();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
      <th>Usuario</th>
			<th>Fecha</th>
			<th>Comisión</th>
			<th>Fecha Limite</th>
			<th>Comprob.</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
        <td>
        <a href='./?view=opencomprobTes&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
        </td>
        <td><?php echo $request1->name." ".$request1->lastname; ?></td>
				<td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fec_lim_comprob; ?></td>
     	  <td style="width:100px;"><center>
		 <?php  
		if($request1->comprobacion) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
		echo $request1->fecha_comprob;}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center>
		 </td>
		 <td>
		 <?php
			 if($request1->comprobacion==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.4.0/core/app/view/formato-comprob.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
		 ?>
		 </td>
				</tr>
				<?php
			}
			?>
			</table>
			</div>
			</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>Aun n tienes Solicitudes por comprobar</p>";
		}
		}
		//Si es es usuario y aux contable
		else if ($p->id_tipo==2 and $p->id_perfil==10) {
			$request = ComprobantesData::getAll();
if(count($request)>0){
	?>
<div class="box box-primary">
<div class="box-body">
<div class="table-responsive">
	<table class="table table-bordered datatable table-hover">
	<thead>
	<th>ID</th>
	<th>Usuario</th>
	<th>Fecha</th>
	<th>Comisión</th>
	<th>Fecha Limite</th>
	<th>Comprob.</th>
	<th>Imprimir</th>
	</thead>
	<?php
	foreach($request as $request1){
		?>
		<tr>
		<td><a href='./?view=opencomprobTes&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a></td>
		<td><?php echo $request1->name." ".$request1->lastname; ?></td>
		<td><?php echo $request1->fecha_solic; ?></td>
		<td><?php echo $request1->concepto; ?></td>
		<td><?php echo $request1->fec_lim_comprob; ?></td>
 <td style="width:100px;"><center>
 <?php  
if($request1->comprobacion) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
echo $request1->fecha_comprob;}
else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
 ?>
 </center>
 </td>
 <td>
 <?php
	 if($request1->comprobacion==1)
			{

					?>
					<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.4.0/core/app/view/formato-comprob.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
			<?php
			}
			else
			{
				?>
				<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
			<?php
			}
 ?>
 </td>
 
		</tr>
		<?php

	}
	?>
	</table>
	</div>
	</div>
	</div>
	<?php
}else{
	echo "<p class='alert alert-danger'>No hay Solicitudes</p>";
}
}
		//Si es usuario y Tesorero
    else if ($p->id_tipo==2 and $p->id_perfil==7) {
      		$request = ComprobantesData::getAllTesoreria();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="box-body">
<div class="table-responsive">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
      <th>Usuario</th>
			<th>Fecha</th>
			<th>Comisión</th>
			<th>Fecha Limite</th>
			<th>Comprob.</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><a href='./?view=opencomprobTes&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a></td>
				<td><?php echo $request1->name." ".$request1->lastname; ?></td>
        <td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fec_lim_comprob; ?></td>
     <td style="width:100px;"><center>
		 <?php  
		if($request1->comprobacion) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
		echo $request1->fecha_comprob;}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center>
		 </td>
		 <td>
		 <?php
			 if($request1->comprobacion==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.4.0/core/app/view/formato-comprob.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
		 ?>
		 </td>
     
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Solicitudes</p>";
		}
		}
		// SI ES JURIDICO
		else if ($p->id_tipo==2 and $p->id_perfil==9) {
			$request = ComprobantesData::getAllByUser();
if(count($request)>0){
	?>
<div class="box box-primary">
<div class="box-body">
<div class="table-responsive">
	<table class="table table-bordered datatable table-hover">
	<thead>
	<th>ID</th>
	<th>Fecha</th>
	<th>Comisión</th>
	<th>Fecha Limite</th>
	<th>Comprob.</th>
	<th>Imprimir</th>
	</thead>
	<?php
	foreach($request as $request1){
		?>
		<tr>
		<td>
		<?php
				$fecha_actual=date("Y-m-d");
				if($request1->solovales==0){
					if($request1->fec_lim_comprob>$fecha_actual){
						?><a href='./?view=opencomprob&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
					<?php
					}
					else{
						?><a href='#' data-toggle="tooltip" data-placement="right" title="Ha pasado su fecha limite"><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
					<?php
					}
				}
				else{
					?><a href='./?view=opencomprobVales&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
				<?php
				}
				?>
		</td>
		<td><?php echo $request1->fecha_solic; ?></td>
		<td><?php echo $request1->concepto; ?></td>
		<td><?php echo $request1->fec_lim_comprob; ?></td>
 <td style="width:100px;"><center>
 <?php  
if($request1->comprobacion) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
echo $request1->fecha_comprob;}
else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
 ?>
 </center>
 </td>
 <td>
 <center>
 <?php
	 if($request1->comprobacion==1)
			{

					?>
					<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.4.0/core/app/view/formato-comprob.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
			<?php
			}
			else
			{
				?>
				<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
			<?php
			}
 ?>
 </center>
 </td>
 
		</tr>
		<?php

	}
	?>
	</table>
	</div>
	</div>
	</div>
	<?php
}else{
	echo "<p class='alert alert-danger'>No hay Solicitudes</p>";
}
}
		//Si es usuario comisionado normal
    else{
      $request = ComprobantesData::getAllByUser();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="box-body">
<div class="table-responsive">
			<table class="table table-bordered datatable table-hover">
			<thead>
			<th>ID</th>
			<th>Fecha</th>
			<th>Comisión</th>
			<th>Fecha Salida</th>
      <th>Fecha Retorno</th>
			<th>Fecha Limite</th>
      <th>Comprob.</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td>
				<?php
				$fecha_actual=date("Y-m-d");
				if($request1->solovales==0){
					if($request1->fec_lim_comprob>$fecha_actual){
						?><a href='./?view=opencomprob&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
					<?php
					}
					else{
						?><a href='#' data-toggle="tooltip" data-placement="right" title="Ha pasado su fecha limite"><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
					<?php
					}
				}
				else{
					?><a href='./?view=opencomprobVales&id=<?php echo $request1->id_solicitud;?>'><i class="fa fa-eye fa-fw"></i><?php echo $request1->id_solicitud; ?></a>
				<?php
				}
				?>
        </td>
				<td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>
				<td><?php echo $request1->fec_lim_comprob; ?></td>
		 		 <td style="width:100px;"><center>
		 <?php  
		if($request1->comprobacion==1 and $request1->solovales==0) { 
			echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
			echo $request1->fecha_comprob;
		}
		else if($request1->comprobacion==1 and $request1->solovales=1)
		{ 
			echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>"; 
			echo $request1->fecha_vales;
		}
		else if($request1->comprobacion==0 || $request1->solovales==0 || $request1->solovales==1)
		{ 
			echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; 
		}
		 ?>
		 </center>
		 </td>
		 <td><center>
		 <?php
				 if($request1->comprobacion==1 and $request1->solovales==0)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.4.0/core/app/view/formato-comprob.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						echo "N/A";
					}
		 ?>
		 </center>
		 </td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>Aun no tiene Solicitudes por comprobar</p>";
		}
    }
		?>
	</div>
</div>
</section>
<?php elseif(isset($_GET["op"]) && $_GET["op"]=="new"):?>
	<div class="container" >
<div class="row" id="contenedor">
	<div class="col-md-12">
	<h1>Solicitud de Comisión</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=solicitudes&op=add" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Datos de la comisión*</label>
    <div class="col-md-6">
      <input type="text" name="datos" required class="form-control" id="name" placeholder="Datos de Comisión">
    </div>
  </div>

<!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Responsable del Departamento*</label>
    <div class="col-lg-4">
<select name="responsable" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(UserData::getByIdPerfil() as $p):?>
    <option value="<?php echo $p->id_perfil; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>-->
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Responsable del Departamento</label>
    <div class="col-md-6">
      <input type="text" readonly value="<?php echo UserData::getById($_SESSION["user_id"])->gerente;?>" name="comisionado" class="form-control"  id="address1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del Comisionado</label>
    <div class="col-md-6">
      <input type="text" readonly value="<?php echo UserData::getById($_SESSION["user_id"])->name." ".UserData::getById($_SESSION["user_id"])->lastname;?>" name="comisionado" class="form-control"  id="address1" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cargo</label>
    <div class="col-md-6">
      <input type="text" readonly value="<?php echo UserData::getByCargo($_SESSION["user_id"])->name;?>" name="cargo" class="form-control" id="email1" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Salida*</label>
    <div class="col-md-6">
      <input type="text" name="fec_sal" required class="form-control" id="fec_sal" placeholder="AAAA-MM-DD">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Retorno*</label>
    <div class="col-md-6">
      <input type="text" name="fec_ret"  required class="form-control" id="fec_ret" placeholder="AAAA-MM-DD">
    </div>
  </div>
      <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lugar de Comisión*</label>
    <div class="col-md-6">
      <input type="text" name="lugar" required class="form-control" id="phone1" placeholder="Lugar">
    </div>
  </div>
	<!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Itinerario*</label>
    <div class="col-md-6">
      <input type="text" name="itinerario[]" required class="form-control" id="itinerario" placeholder="Itinerario">
    </div>
		<button type="button" class="btn btn-success btn-xs" title="Agregar" onclick="agregar();" ><i class=" fa fa-plus-square"></i> &nbsp; Agrerar Otro</button>
		<button type="button" class="btn btn-success btn-xs" title="Eliminar" onclick="eliminarFila();" ><i class=" fa fa-plus-square"></i> &nbsp; Eliminar</button>
  </div>

	<div class="form-group" id="addfila">

	</div>-->
	
	
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Gasolina (Vales)*</label>
    <div class="col-md-6">
      <input type="number" name="gasolina_vales" required class="form-control" id="phone1" placeholder="$">
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Gasolina (Efectivo)*</label>
    <div class="col-md-6">
      <input type="number" name="gasolina_efectivo" required class="form-control" id="phone1" placeholder="$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Alimentación*</label>
    <div class="col-md-6">
      <input type="number" name="alimentos" required class="form-control" id="phone1" placeholder="$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Casetas</label>
    <div class="col-md-6">
      <input type="number" name="casetas" required class="form-control" id="phone1" placeholder="$">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Hospedaje</label>
    <div class="col-md-6">
      <input type="number" name="hospedaje" required class="form-control" id="phone1" placeholder="$">
    </div>
  </div>
     <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Objetivo de la comisión*</label>
    <div class="col-md-6">
      <textarea name="objetivo" class="form-control" required id="phone1" placeholder="Describa el objetivo de su comisión..."></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
		<input type="hidden" name="id_perfil" value="<?php echo $p->id_perfil;?>">
      <button type="submit" class="btn btn-primary">Agregar Solicitud</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#fec_sal').pickadate({
        format: 'yyyy/mm/dd',
				min: new Date(),
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
				//disable: [ 1, 7]
    });

    $('#fec_ret').pickadate({
        format: 'yyyy/mm/dd',
				min: new Date(),
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
				//disable: [1, 7]
    });
});
</script>
<!--<script type="text/javascript">

function agregar() {

	var n = $("#addfila").length;
	var num = n-1;

	
campo='<div class="form-group id="addfila'+num+'><div class="col-md-6"><input type="text" name="itinerario[]" required class="form-control" id="itinerario" placeholder="Itinerario"></div></div>';
	

	$("#addfila").append(campo);

}
function eliminarFila() {
	var n = $("#addfila").length;
	var filadelete = n-2;					
	$('#campo'+filadelete).remove();
}

</script>-->
<?php elseif(isset($_GET["op"]) && $_GET["op"]=="edit"):?>
<div class="container">
<?php $user = PersonData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=persons&op=update" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control"  id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
<?php endif; ?>
