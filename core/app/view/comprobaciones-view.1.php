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
			<th>Comprob.</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
        <td>
        <?php
				//Si es admin y gerente y el departamento es Administracion
        if ($p->id_tipo==1 and $p->id_perfil==2 and $request1->id_departamento==3){
          ?><a href='./?view=opensolicAdmin&id=<?php echo $request1->id_solicitud;?>'><?php echo $request1->id_solicitud; ?></a><?php
        }else
        {
          ?><a href='./?view=opensolicitud&id=<?php echo $request1->id_solicitud;?>'><?php echo $request1->id_solicitud; ?></a><?php
        }
        ?>
        </td>
        <td><?php echo $request1->name." ".$request1->lastname; ?></td>
				<td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<!--<td><?php echo $request1->objetivo; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>-->
     <!--<td style="width:100px;"><center><?php  
		if($request1->vobo) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>"; 
		echo $request1->fecha_vobo;}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center><?php  
		if($request1->id_status==3) 
		{ echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		else if($request1->id_status==1)
		{ echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>";
		  echo $request1->fecha_status; }
		else if ($request1->id_status==2)
		{echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Cancelada</p><br>";
		echo $request1->fecha_status; }
		else
		{echo "<p class='label label-primary'><i class='glyphicon glyphicon-ok'></i> Pagada</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center>
		 <?php  
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
				echo "N/A";
		 }
		 else{
				if($request1->pagada) 
				{ 
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagada</p><br>"; 
					echo $request1->fecha_pago;
				}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 }
		
		 ?>
		 </center></td>-->
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
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
					echo "N/A";
		 }
		 else{
			 if($request1->vobo==1 && $request1->pagada==1 && $request1->id_status==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.3.0/core/app/view/formato-solicitud.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
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
		//Si es usuario y Gerente
    }else if($p->id_tipo==2 and $p->id_perfil==2){
		$request = ComprobantesData::getAllByUser();
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
			<th>Objetivo</th>
			<th>Fecha Salida</th>
      <th>Fecha Retorno</th>
      <th>Vo.Bo.</th>
      <th>Estado</th>
      <th>Pagada</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><a href='./?view=opensolicVobo&id=<?php echo $request1->id_solicitud;?>'><?php echo $request1->id_solicitud; ?></a></td>
				<td><?php echo $request1->name_u." ".$request1->lastname; ?></td>
        <td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->objetivo; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>
     <td style="width:100px;"><center><?php  
		if($request1->vobo) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>";
		echo $request1->fecha_vobo; }
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center><?php  
		if($request1->id_status==3) 
		{ echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		else if($request1->id_status==1)
		{ echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>"; 
		echo $request1->fecha_status;
		}
		else if ($request1->id_status==2)
		{echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Cancelada</p><br>"; 
		echo $request1->fecha_status;
		}
		else
		{echo "<p class='label label-primary'><i class='glyphicon glyphicon-ok'></i> Pagada</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center>
		 <?php  
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
				echo "N/A";
		 }
		 else{
				if($request1->pagada) 
				{ 
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagada</p><br>"; 
					echo $request1->fecha_pago;
				}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 }
		
		 ?>
		 </center></td>
		 <td><?php
		 if($request1->vobo==1 && $request1->pagada==1 && $request1->id_status==1 && $request1->id==UserData::getById($_SESSION["user_id"])->id)
		 {

				?>
				<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.3.0/core/app/view/formato-solicitud.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
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
      		$request = ComprobantesData::getAllByUser();
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
			<!--<th>Comisión</th>
			<th>Objetivo</th>-->
			<th>Fecha Salida</th>
      <th>Fecha Retorno</th>
      <th>Estado</th>
      <th>Pago</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td><a href='./?view=opensolicPago&id=<?php echo $request1->id_solicitud;?>'><?php echo $request1->id_solicitud; ?></a></td>
				<td><?php echo $request1->name." ".$request1->lastname; ?></td>
        <td><?php echo $request1->fecha_solic; ?></td>
				<!--<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->objetivo; ?></td>-->
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>
     <td style="width:100px;"><center><?php  
		if($request1->id_status) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>"; 
		echo $request1->fecha_status;}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center>
		 <?php  
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
				echo "N/A";
		 }
		 else{
				if($request1->pagada) 
				{ 
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagada</p><br>"; 
					echo $request1->fecha_pago;
				}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 }
		
		 ?>
		 </center></td>
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
		//Si es usuario y juridico
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
      <th>Usuario</th>
			<th>Comisión</th>
			<th>Objetivo</th>
			<th>Fecha Salida</th>
      <th>Fecha Retorno</th>
      <th>Estado</th>
      <th>Pago</th>
            <th>Acción</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td>
				<?php //Si status es cancelado o pendiente que muestre link para ver la solicitud
				if($request1->id_status==2)
        {
          ?><a href='./?view=opensolicitudCan&id=<?php echo $request1->id_solicitud;?>'>#<?php echo $request1->id_solicitud; ?></a><?php
        }else if($request1->id_status==3)
        {
          ?><a href='./?view=opensolicitudPen&id=<?php echo $request1->id_solicitud;?>'>#<?php echo $request1->id_solicitud; ?></a><?php
        }
				else
				{
					?><?php echo $request1->id_solicitud;?><?php
				}
        ?>
				</td>
				<td><?php echo $request1->name." ".$request1->lastname; ?></td>
        <td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->objetivo; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>
     <td style="width:100px;"><center><?php  
		if($request1->id_status==3) 
		{ echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		else if($request1->id_status==1)
		{ echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>"; 
		echo $request1->fecha_status;
		}
		else if ($request1->id_status==2)
		{echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Cancelada</p><br>"; 
		echo $request1->fecha_status;
		}
		else
		{echo "<p class='label label-primary'><i class='glyphicon glyphicon-ok'></i> Pagada</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center><?php  
		if($request1->pagada) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagada</p><br>"; 
		echo $request1->fecha_pago;
				}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center></td>
		 <td>
		 <?php
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
					echo "N/A";
		 }
		 else{
			 if($request1->vobo==1 && $request1->pagada==1 && $request1->id_status==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppViatics.3.0/core/app/view/formato-solicitud.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
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
      <!--<th>Vo.Bo.</th>
      <th>Estado</th>
			<th>Pagado</th>
			<th>Imprimir</th>-->
			<th>Comprob.</th>
			<th>Imprimir</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td>
				<a href='./?view=opencomprob&id=<?php echo $request1->id_solicitud;?>'>#<?php echo $request1->id_solicitud; ?></a>
        </td>
				<td><?php echo $request1->fecha_solic; ?></td>
				<td><?php echo $request1->concepto; ?></td>
				<td><?php echo $request1->fecha_salida; ?></td>
        <td><?php echo $request1->fecha_retorno; ?></td>
     <!--<td style="width:100px;"><center><?php  
		if($request1->vobo) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>";
		echo $request1->fecha_vobo; }
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center><?php  
		if($request1->id_status==3) 
		{ echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		else if($request1->id_status==1)
		{ echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Autorizada</p><br>"; 
		echo $request1->fecha_status;
		}
		else if ($request1->id_status==2)
		{echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Cancelada</p><br>"; 
		echo $request1->fecha_status;
		}
		else
		{echo "<p class='label label-primary'><i class='glyphicon glyphicon-ok'></i> Pagada</p>"; }
		 ?>
		 </center></td>
     <td style="width:100px;"><center>
		 <?php  
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
				echo "N/A";
		 }
		 else{
				if($request1->pagada) 
				{ 
					echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagada</p><br>"; 
					echo $request1->fecha_pago;
				}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 }
		
		 ?>
		 </center></td>-->
		 <!--<td><center>
		 <?php
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
					echo "N/A";
		 }
		 else{
			 if($request1->vobo==1 && $request1->pagada==1 && $request1->id_status==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTest/core/app/view/formato-solicitud.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
		 }
		 ?>
		 </center>
		 </td>-->
		 <td style="width:100px;"><center>
		 <?php  
		if($request1->comprobacion) { echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Comprobado</p><br>";
		echo $request1->fecha_comprob;}
		else { echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p>"; }
		 ?>
		 </center>
		 </td>
		 <td><center>
		 <?php
		 if($request1->gasolina_efectivo==0 and $request1->alimentacion==0 and $request1->hospedaje==0 and $request1->casetas==0){
					echo "N/A";
		 }
		 else{
			 if($request1->vobo==1 && $request1->pagada==1 && $request1->id_status==1)
					{

							?>
							<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTest/core/app/view/formato-solicitud.php?&id=<?php echo $request1->id_solicitud; ?>','_blank')"><i class=" fa fa-print"></i></button>
					<?php
					}
					else
					{
						?>
						<button type="button" class="btn btn-social-icon btn-danger" title="Imprimir" id="view"><i class="fa fa-print"></i></button>
					<?php
					}
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
