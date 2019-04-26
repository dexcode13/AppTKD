<?php $user = AlumnosData::getByAlumnoGim($_GET["id"]);?>
<?php $Asistencia = AsistenciasData::getByAlumAsistencia($_GET["id"]);?>
<?php $Plan = AlumnosData::getByAlumnoPlanGim($_GET["id"]);?>
<?php $tutores = AlumnosData::getByAlumnoTutor($_GET["id"]);?>
<?php $examen = AlumnosData::getByAlumExamen($_GET["id"]);?>

<div class="row">
	<div class="col-md-12">  
  <div class="box box-primary">
      <div class="box-header">
      <h2 class="title"><i class="fa fa-archive" aria-hidden="true"></i> Expediente de <span class="label label-success label-as-badge"><?php echo $user->nombre." ".$user->apellido;?></span></h2>
      <!-- /.nav-tabs-custom -->
      <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#personales">Datos Personales</a></li>
        <li><a data-toggle="tab" href="#padres">Datos Padres</a></li>
        <!--<li><a data-toggle="tab" href="#examenes">Exámenes</a></li>-->
        <li><a data-toggle="tab" href="#asistencias">Asistencias</a></li>
        <li><a data-toggle="tab" href="#pagos">Plan de Pagos</a></li>
        <!--<li><a data-toggle="tab" href="#baja">Estatus Alumno</a></li>-->
      </ul>
      </div>
    <!-- /.nav-tabs-custom -->
      <div class="tab-content">
  <div id="personales" class="tab-pane fade in active"><br>
    <form class="form-horizontal" method="post" action="index.php?view=updateAlumGim" role="form" enctype="multipart/form-data">
    <div class=" col-md-8 col-lg-8">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->nombre;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->apellido;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-4">
<select name="categoria" class="form-control" required>
<option value="<?php echo $user->id_categoria; ?>" selected><?php echo $user->categoria; ?></option>
 <?php foreach(AlumnosData::getAllCategoriasGIM() as $p):?>
    <option value="<?php echo $p->id_categoria; ?>"><?php echo $p->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Ingreso</label>
    <div class="col-md-6">
      <input type="text" name="ingreso" readonly value="<?php echo $user->fecha_ingreso;?>" class="form-control" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="fec_nac" class="form-control" value="<?php echo $user->fecha_nac;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">CURP</label>
    <div class="col-md-6">
      <input type="text" name="curp" class="form-control" value="<?php echo $user->curp;?>">
<!--<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>-->
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Dirección</label>
    <div class="col-md-6">
      <input type="text" name="direccion" value="<?php echo $user->domicilio;?>" class="form-control" required id="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Colonia</label>
    <div class="col-md-6">
      <input type="text" name="colonia" value="<?php echo $user->colonia;?>" class="form-control" required id="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">C.P.</label>
    <div class="col-md-6">
      <input type="text" name="cp" value="<?php echo $user->cp;?>" class="form-control" required id="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cargar Foto</label>
    <div class="col-md-6">
      <input type="file" name="foto" value="<?php echo $user->dir_foto;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_alumno" value="<?php echo $user->id_alumno;?>">
    <input type="hidden" name="rgi" value="<?php echo $user->rgi;?>">
      <button type="submit" class="btn btn-success">Actualizar Alumno</button>
    </div>
  </div>
  </div><!--fin datos izquierda-->
  <div class=" col-md-4 col-lg-4">
  <img src="<?php echo $user->dir_foto;?>" class="img-responsive" alt="Alumno"> 
  </div><!--fin datos derecha-->
</form>
</div><!--tab datos personales-->
<div id="padres" class="tab-pane fade in"><br>
<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatePadres" role="form">
    <div class=" col-md-6 col-lg-6">
<h3>Datos del Padre</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre_p" value="<?php echo $tutores->nombre_padre;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Labor:*</label>
    <div class="col-md-6">
      <input type="text" name="labor_p" value="<?php echo $tutores->labor_padre;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono:</label>
    <div class="col-md-6">
      <input type="text" name="telefono_p" value="<?php echo $tutores->telefono_padre;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="tutor_id" value="<?php echo $tutores->id_tutor;?>">
    <input type="hidden" name="id_rgi" value="<?php echo $tutores->rgi;?>">
      <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </div>
  </div>
  </div><!--fin datos izquierda-->
  <div class=" col-md-6 col-lg-6">
  <h3>Datos de la Madre</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre:*</label>
    <div class="col-md-6">
      <input type="text" name="nombre_m" value="<?php echo $tutores->nombre_madre;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Labor*</label>
    <div class="col-md-6">
      <input type="text" name="labor_m" class="form-control" value="<?php echo $tutores->labor_madre;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono:</label>
    <div class="col-md-6">
      <input type="text" name="telefono_m" class="form-control" value="<?php echo $tutores->telefono_madre;?>">
    </div>
  </div>
  </div><!--fin datos derecha-->
</form>
</div>
<div id="examenes" class="tab-pane fade"><br>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador"class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
      <!--<th>Alumno</th>
      <th>Categoria</th>-->
			<th>Grado y Cinta Actual</th>
			<th>Fecha Exámen Anterior</th>
      <th>Grado y Cinta a Pasar</th>
      <th>Fecha Exámen</th>
			<th>Estado</th>
			</thead>
			<?php
			foreach($examen as $exa){
				?>
				<tr>
				<td><?php echo $exa->rgi; ?></td>
				<!--<td><?php echo $exa->nombre." ".$exa->apellido; ?></td>
        <td>
        <?php 
        if($exa->id_categoria==1){
          echo "PRE-ESCOLAR";
          }else if($exa->id_categoria==2){
            echo "INFANTIL-JUVENIL";
          }else{
            echo "INFANTIL-JUVENIL ADULTOS";
          } ?>
        </td>-->
        <td><?php echo $exa->grado_cinta_actual; ?></td>
				<td><?php echo $exa->fecha_exa_ant; ?></td>
        <td class="success"><?php echo $exa->grado_cinta_apasar; ?></td>
				<td class="success"><?php echo $exa->fecha_exa; ?></td>
				<td><center>
        <?php 
        if($exa->status==1){
          echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Aprobado</p><br>";
          }else if ($exa->status==2){ 
            echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> No Aprobado</p><br>";
          }else{
            echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p><br>";
          }
        ?></center>
        </td>
		 <!--<td>
			<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-expediente.php?&rgi=<?php echo $lista->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>	 
		 </td>-->
				</tr>
				<?php
		}
			?>
			</table>
			</div>
			</div>
			</div>
</div>
<div id="asistencias" class="tab-pane fade"><br>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador"class="table table-bordered datatable table-hover">
			<thead>
			<th>ID Asistencia</th>
      <th>Alumno</th>
			<th>Fecha</th>
			<th>Categoria</th>
			<th>Hora Entrada</th>
			<th>Estado</th>
			<th>Grado</th>
			<!--<th>Acción</th>-->
			</thead>
			<?php
			foreach($Asistencia as $lista){
				?>
				<tr>
				<td><?php echo $lista->id_asistencia; ?></td>
				<td><?php echo $lista->nombre." ".$lista->apellido; ?></td>
				<td><?php echo $lista->fecha; ?></td>
				<td>
        <?php 
        if($lista->id_categoria==1){
          echo "PRE-ESCOLAR";
          }else if($lista->id_categoria==2){
            echo "INFANTIL-JUVENIL";
          }else{
            echo "INFANTIL-JUVENIL ADULTOS";
          } ?>
        </td>
        <td><?php 
        if($lista->status==0){
          echo "";
        }else{
          echo $lista->hora;
        }
        ?></td>
				<td><center>
        <?php 
        if($lista->status==1){
          echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Asistencia</p><br>";
          }else if($lista->status==2){
            echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Retardo</p><br>";
          }else if($lista->status==3){
            //$obs = array();
           // $obs = AsistenciasData::getByIDAsistencia($lista->id_asistencia);
            
            ?>
            <a href="" data-toggle="modal" data-target="#myModal" onclick="mostrardatmodal('<?=$lista->id_asistencia;?>')">
            <p class='label label-info'><i class='glyphicon glyphicon-bullhorn'></i> Justificación</p></a><br>
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Observación de la Justificación</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body" id="resp_data">
                    <!-- ?php echo $obs->observacion;?-->
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>

                </div>
              </div>
            </div>
          <?php
          }else{
            echo "<p class='label label-danger'><i class='glyphicon glyphicon-remove'></i> Falta</p><br>";
          }
        ?></center>
        </td>
        <td><?php echo $lista->grado; ?></td>
		 <!--<td>
			<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-expediente.php?&rgi=<?php echo $lista->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>	 
		 </td>-->
				</tr>
				<?php
		}
			?>
			</table>
			</div>
			</div>
			</div>
</div>
<div id="pagos" class="tab-pane fade"><br>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador"class="table table-bordered datatable table-hover">
			<thead>
			<th>Folio</th>
      <th>Alumno</th>
			<th>Fecha Vencimiento</th>
			<th>Cuota</th>
      <th>Ciclo</th>
      <th>Importe</th>
			<th>Estado</th>
      <th>Fecha Pago</th>

			<!--<th>Acción</th>-->
			</thead>
			<?php
			foreach($Plan as $pagos){
				?>
				<tr>
				<td><?php echo $pagos->folio_recibo; ?></td>
				<td><?php echo $pagos->nombre." ".$pagos->apellido; ?></td>
				<td><?php echo $pagos->fecha_vencimiento; ?></td>
				<td>
        <?php if ($pagos->cuota==1) {
          echo "Enero";
        } else if ($pagos->cuota==2) {
          echo "Febrero";
        } else if ($pagos->cuota==3) {
          echo "Marzo";
        } else if ($pagos->cuota==4) {
          echo "Abril";
        } else if ($pagos->cuota==5) {
          echo "Mayo";
        } else if ($pagos->cuota==6) {
          echo "Junio";
        } else if ($pagos->cuota==7) {
          echo "Julio";
        } else if ($pagos->cuota==8) {
          echo "Agosto";
        } else if ($pagos->cuota==9) {
          echo "Septiembre";
        } else if ($pagos->cuota==10) {
          echo "Octubre";
        } else if ($pagos->cuota==11) {
          echo "Noviembre";
        }else{
          echo "Diciembre";
        }
         ?>
        </td>
        <td><?php echo $pagos->ciclo; ?>
        </td>
        <td>$ <?php echo $pagos->importe; ?>
        </td>
				<td><center>
        <?php 
        if($pagos->status==1){
          echo "<p class='label label-success'><i class='glyphicon glyphicon-ok'></i> Pagado</p><br>";
          }else if($pagos->status==2){
            echo "<p class='label label-danger'><i class='glyphicon glyphicon-time'></i> Atrasado</p><br>";
          }else{
            echo "<p class='label label-warning'><i class='glyphicon glyphicon-time'></i> Pendiente</p><br>";
          }
        ?></center>
        </td>
        <td><?php echo $pagos->fecha_pago; ?>
        </td>
		 <!--<td>
			<button type="button" class="btn btn-social-icon btn-success" title="Imprimir" id="view" onclick="window.open('/AppTKD_/core/app/view/formato-expediente.php?&rgi=<?php echo $lista->rgi; ?>','_blank')"><i class=" fa fa-print"></i></button>	 
		 </td>-->
				</tr>
				<?php
		}
			?>
			</table>
			</div>
			</div>
			</div>
</div>
<div id="baja" class="tab-pane fade in"><br>
<!--<div class="jumbotron">
	<h2>Módulo en Desarrollo...</h2>
	<p>Estamos trabajando en este módulo para tenerlo lo más pronto posible.</p>
</div>-->
<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=bajauser" role="form">
    <div class=" col-md-6 col-lg-6">
<h3><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> Baja del Alumno</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->nombre." ".$user->apellido;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="status" <?php if($user->status){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Motivo:</label>
    <div class="col-md-6">
    <textarea name="motivo" required class="form-control" rows="5" id="comment" placeholder="Describa el motivo de la baja..."></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    
    <input type="hidden" name="user_id" value="<?php echo $user->rgi;?>">
      <button type="submit" class="btn btn-success">Baja Temporal</button>
    </div>
  </div>
  </div><!--fin datos izquierda-->
  <!--<div class=" col-md-6 col-lg-6">
  <h3>Datos de la Madre</h3>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre:*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $tutores->nombre_madre;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Labor*</label>
    <div class="col-md-6">
      <input type="text" name="fec_nac" class="form-control" value="<?php echo $tutores->labor_madre;?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono:</label>
    <div class="col-md-6">
      <input type="text" name="curp" class="form-control" value="<?php echo $tutores->telefono_madre;?>">
    </div>
  </div>
  </div><!--fin datos derecha-->
</form>
</div>
</div><!--tab content-->
	</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#fec_nac').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true,
        selectMonths:true,
        selectYears: true,  
        min: new Date(1950,1,1),
  max: new Date(1994,11,15)
    });
});

function mostrardatmodal(id){
$.ajax({
  url : "core/app/view/data-view.php?id="+id,
  type: "post",
}).done(function(resp){
  $("#resp_data").html(resp);
})
}
</script>
