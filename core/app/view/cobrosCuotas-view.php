<div class="row">
	<div class="col-md-12">
	<!--<div class="callout callout-info">
	<h2><i class='glyphicon glyphicon-usd'></i> Pagos de Mensualidades</h2>
	</div>-->
	<h1><i class='fa fa-money'></i> Pagos de Mensualidades</h1>
		<?php
	  $request = AlumnosData::getCuotasPago($_GET["rgi"]);
	 
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered table-hover" id="cuotasAlumno">
			<thead>
			<th>ID Cuota</th>
      <th>Alumno</th>
			<th>Cuota</th>
			<th>Importe</th>
			<th>Fecha Pago</th>
			<th>Estado</th>
			<?php //$user = AlumnosData::getByCuota($_GET["id"]);?>
			<th>Acción</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td id="id_cuota"><?php echo $request1->id_cuota;?></td>
				<td id="name"><?php echo $request1->nombre." ".$request1->apellido; ?></td>
				<!--<td class="btn-info">-->
				<td id="mes"><?php if($request1->cuota==1) {
				echo "Enero";
				} else if ($request1->cuota==2) {
				echo "Febrero";
				} else if ($request1->cuota==3) {
				echo "Marzo";
				} else if ($request1->cuota==4) {
				echo "Abril";
				} else if ($request1->cuota==5) {
				echo "Mayo";
				} else if ($request1->cuota==6) {
				echo "Junio";
				} else if ($request1->cuota==7) {
				echo "Julio";
				} else if ($request1->cuota==8) {
				echo "Agosto";
				} else if ($request1->cuota==9) {
				echo "Septiembre";
				} else if ($request1->cuota==10) {
				echo "Octubre";
				} else if ($request1->cuota==11) {
				echo "Noviembre";
				}else{
				echo "Diciembre";
				}
				?></td>
				<td><?php echo $request1->importe; ?></td>
				<td><?php echo $request1->fecha_pago; ?></td>
				<td><?php 
				if ($request1->status==0){
					echo "<span class='label label-warning label-as-badge'>Pendiente</span>";
				}else if($request1->status==2){
					echo "<span class='label label-danger label-as-badge'>Atrasado</span>";
				}else{
					echo "<span class='label label-success label-as-badge'>Pagado</span>";
				}
				?></td>
		 		<td>
				 <a href="<?php echo $request1->id_cuota?>" name="idsele" class="btn btn-success" data-toggle="modal" data-target="#myModal">Pagar</a></td>
				</tr>
				<?php
		}
			?>
			</table>
			<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pago de Cuota Mensual</h4>
      </div>
      <div class="modal-body">

<form class="form-horizontal" role="form" method="post" target="_blank" action="./?action=pagarCuota">
<input type="hidden" name="id" value="<?php echo $request1->id_cuota; ?>">
<input type="hidden" name="id_rgi" value="<?php echo $request1->rgi; ?>">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">ID Cuota:</label>
    <div class="col-md-4">
    <input type="text" name="espe" id="espe" class="form-control" value="" />
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Mes:</label>
    <div class="col-md-4">
      <input type="text" name="month" id="month" class="form-control" value="" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre:</label>
    <div class="col-md-5">
      <input type="text" name="nombre" id="nombre" class="form-control" value="" />
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Fecha Pago:</label>
    <div class="col-md-4">
      <input type="date" name="fecha" id="fecha" class="form-control" required onchange="diaSemana();" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Importe:</label>
    <div class="col-md-4">
      <input type="text" name="pago" class="form-control" required id="pago"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit" id="pagar" class="btn btn-success">Efectuar Pago</button>
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
<!--Fin estructura tabla-->
		<?php
		}else
		{
			echo "<p class='alert alert-warning'>No hay Cuotas <strong>PENDIENTES NI VENCIDAS</strong></p>";
		}
?>
</div>
			</div>
			<script>
			
                            $("body").on("click","#cuotasAlumno a",function(event){
                                event.preventDefault();
                                idsele = $(this).attr("href");
                                id_cuota = $(this).parent().parent().children("td:eq(0)").text();
                                name = $(this).parent().parent().children("td:eq(1)").text();
																mes = $(this).parent().parent().children("td:eq(2)").text();
															
                                //Cargamos en el formulario los valores del registro
                                $("#espe").val(id_cuota);
                                $("#nombre").val(name);
																$("#month").val(mes);	                                
                              });
				/*let dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"];
				let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
				function diaSemana(){
					let date  = new Date(document.getElementById("fecha").value);
					let fechaNum = date.getUTCDate();
					let mes_name = date.getMonth();
					//alert(dias[date.getDay()] + " " + fechaNum + " de " + meses[mes_name] + " de " +         date.getFullYear());
					if (fechaNum === 01) {
							document.getElementById("montopago").innerHTML = "250";
					}
				}*/
				$(document).ready(function(){
    // Show the Modal on load
						//$("#myModal").modal("show");
						
						// Hide the Modal
						$("#pagar").click(function(){
								$("#myModal").modal("hide");
					
								location.href ="http://localhost:8080/AppTKD_/?view=listAlumnos";
								//location.reload(true);
							
						});
				});
				function diaSemana(){
					var d = new Date(document.getElementById("fecha").value);
					//document.getElementById("pago").value = d.getUTCDate();
					if(d.getUTCDate()>=1 && d.getUTCDate()<6){
						document.getElementById("pago").value = "250";
					}else if(d.getUTCDate()>=5 && d.getUTCDate()<11){
						document.getElementById("pago").value = "300";
					}else if(d.getUTCDate()>=10 && d.getUTCDate()<16){
						document.getElementById("pago").value = "350";
					}
				}
      </script> 
