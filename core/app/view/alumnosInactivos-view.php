<section class="">
<div class="row">
	<div class="col-md-12">
	<div class="callout callout-info">
	<h2><i class='fa fa-arrow-circle-down'></i> Alumnos con Baja Temporal</h2>
	</div>
	<!--<a href="index.php?view=newAlumno" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Alumno</a>-->
		<?php
      $request = SolicitudData::getAllAlumnosInactivos();
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador" class="table table-bordered datatable table-hover">
			<thead>
			<th>RGI</th>
      <th>Alumno</th>
		
			<th>Categoria</th>
			<th>Fecha Baja</th>
      <th>Motivo</th>
      <th>Ultima Asistencia</th>
			<th>Reingreso</th>
			<!--<th>Acción</th>-->
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
        <td id="id_rgi"><?php echo $request1->rgi;?></td>
        <td id="nombre"><?php echo $request1->nombre." ".$request1->apellido; ?></td>
				<td><?php echo $request1->name; ?></td>
				<td><?php echo $request1->fecha_baja; ?></td>		
				<td><?php echo $request1->motivo_baja; ?></td>
        <td><?php echo $request1->last_date_assistance; ?></td>
				<td>
				<a href="<?php echo $request1->rgi;?>" name="idsele" class="btn btn-success" data-toggle="modal" data-target="#myModal">Reingresar</a>
				</td>
				</tr>
				<?php
		}
			?>
			</table>
			<!-- Modal -->
<div class="modal modal-info fade" id="myModal">
<!--<div class="modal fade" id="myModal" role="dialog">-->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">ReIngresar Alumno</h4>
				<!--<h2 aling="center" id="msj"></h2>-->
      </div>
      <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="./?action=ReingresarAlumno">
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">RGI:</label>
    <div class="col-md-5">
    <input type="text" name="rgi" id="rgi" class="form-control" value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre:</label>
    <div class="col-md-5">
      <input type="text" name="alumno" id="alumno" class="form-control" value="" />
    </div>
	</div>
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit"  class="btn btn-success">Reingresar Alumno</button>
    </div>
  </div>
</form>
      </div>
    </div>
  </div>
</div>
<!--Fin modal-->
			</div>
			</div>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}
		//Si es usuario y Gerente
		?>
	</div>
</div>
</section>
<script>
			
                            $("body").on("click","#administrador a",function(event){
															
                                event.preventDefault();
                                idsele = $(this).attr("href");
                                id_rgi = $(this).parent().parent().children("td:eq(0)").text();
                                nombre = $(this).parent().parent().children("td:eq(1)").text();
																
                                //Cargamos en el formulario los valores del registro
                                $("#rgi").val(id_rgi);
                                $("#alumno").val(nombre);
                              });
				
      </script> 

