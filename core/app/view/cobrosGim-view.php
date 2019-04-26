<div class="row">
	<div class="col-md-12">
	<div class="callout callout-info">
	<h2><i class='fa fa-tags'></i> Cobros de Mensualidades Gimnasia</h2>
	</div>
		<?php
	  $request = AlumnosData::getPagosPendientesGim();
	 
		if(count($request)>0){
			?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table class="table table-bordered datatable table-hover" id="cuotasAlumno">
			<thead>
			<th>ID Cuota</th>
			<th>Matricula</th>
      <th>Alumno</th>
			<th>Cuota</th>
			<th>Ciclo</th>
			<th>Importe</th>
			<th>Fecha Pago</th>
			<th>Estado</th>
			<th>Acción</th>
			</thead>
			<?php
			foreach($request as $request1){
				?>
				<tr>
				<td id="id_cuota"><?php echo $request1->id_cuota;?></td>
				<td id="matricula_alumno"><?php echo $request1->rgi;?></td>
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
				<td><?php echo $request1->ciclo; ?></td>
				<td>$ <?php echo $request1->importe; ?></td>
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
			<?php //$alum = AlumnosData::getByCuota($_GET["cuota"]);?>
			<!-- Modal -->
<div class="modal modal-info fade" id="myModal">
<!--<div class="modal fade" id="myModal" role="dialog">-->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Pago de Cuota Mensual</h4>
				<!--<h2 aling="center" id="msj"></h2>-->
      </div>
      <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="./?action=pagarCuotaGim">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">ID Cuota:</label>
    <div class="col-md-5">
    <input type="text" name="espe" id="espe" class="form-control" value="" />
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">RGI:</label>
    <div class="col-md-5">
    <input type="text" name="matricula" id="matricula" class="form-control" value="" />
    </div>
  </div>
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Mes:</label>
    <div class="col-md-5">
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
    <div class="col-md-5">
      <input type="date" name="fecha" id="fecha" class="form-control" onchange="diaSemana();" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Importe:</label>
    <div class="col-md-5">
			<!--<span class="input-group-addon">$</span>
				<input type="text" name="pago" class="form-control" id="pago" required/>
			<span class="input-group-addon">.00</span>-->
			<input type="text" name="pago" class="form-control" id="pago" required/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit"  class="btn btn-success">Efectuar Pago</button>
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
                                name = $(this).parent().parent().children("td:eq(2)").text();
																mes = $(this).parent().parent().children("td:eq(3)").text();
																matricula_alumno = $(this).parent().parent().children("td:eq(1)").text();
																/*var d = new Date();  
																var month=new Array(12);
																month[0]="Enero";
																month[1]="Febrero";
																month[2]="Marzo";
																month[3]="Abril";
																month[4]="Mayo";
																month[5]="Junio";
																month[6]="Julio";
																month[7]="Agosto";
																month[8]="Septiembre";
																month[9]="Octubre";
																month[10]="Noviembre";
																month[11]="Diciembre";
																var mess = month[d.getMonth()];
																var m = "!!! CUOTA ADELANTADA !!!";*/
																//document.write("The current month is " + mes);
																/*if(mess!=mes){
																	document.getElementById("msj").innerHTML = m;
																}*/
                                //Cargamos en el formulario los valores del registro
                                $("#espe").val(id_cuota);
                                $("#nombre").val(name);
																$("#month").val(mes);	
																$("#matricula").val(matricula_alumno);
																
																/*let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
											 												"Septiembre", "Octubre", "Noviembre", "Diciembre"];

																var x = document.getElementById("month");
																let date = new Date(x.value);
																var mes_name = date.getMonth();
																alert(meses[mes_name] + " de " + date.getFullYear()); */
																
                              });
				
				$(document).ready(function(){	    
						
						// Hide the Modal
						$("#pagar").click(function(){
								$("#myModal").modal("hide");
					
								location.href ="http://localhost:8080/AppTKD_/?view=cobrosGim";
								//location.reload(true);
							
						});
				});
				function diaSemana(){
					var d = new Date(document.getElementById("fecha").value);
					//document.getElementById("pago").value = d.getUTCDate();
					if(d.getUTCDate()>=1 && d.getUTCDate()<6){
						document.getElementById("pago").value = "300";
					}else if(d.getUTCDate()>=5 && d.getUTCDate()<11){
						document.getElementById("pago").value = "350";
					}else if(d.getUTCDate()>=10 && d.getUTCDate()<31){
						document.getElementById("pago").value = "400";
					}
					
				}
      </script> 
