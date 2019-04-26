<?php 
/*$cuotas =  AlumnosData::getCuotas();
$fecha = date('Y-m-d');
$fechaMesPasado = strtotime ('+1 month', strtotime($fecha));
$fechaMesPasadoDate = date('m', $fechaMesPasado);
function nombremes($mes){
  setlocale(LC_TIME, 'spanish');  
  $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
  return $nombre;
 }*/
?>
<div class="row">
	<div class="col-md-12">
  <div class="callout callout-info">
	<h2><i class='fa fa-print'></i> Impresión de Corte del día de GIMNASIA</h2>
	</div>
      <div class="alert alert-warning">
        <strong>¡Advertencia!</strong> Solo podrá imprimir los pagos realizados <strong>DEL PRESENTE DIA</strong>
      </div>
     
		<form class="form-horizontal" method="post" id="addproduct" action="./?action=ImpresionCorteGim" role="form">
  <div class="form-group">
    <div class="col-lg-2 col-lg-10">
      <button type="submit" class="btn btn-success btn-lg">Imprimir Corte del día</button>
    </div>
  </div>
</form>
<?php 
$request = AlumnosData::getCortePrintGim();
?>
<div class="box box-primary">
<div class="table-responsive">
<div class="box-body">
			<table id="administrador" class="table table-bordered datatable table-hover">
			<thead>
			<th>Nombre</th>
      <th>Concepto</th>
			<th>Cobro</th>
			<th>Importe</th>
      <th>Docente</th>
      <th>Academia</th>
      <th>Cuota</th>
			</thead>
			<?php
			foreach($request as $request1){
        if ($request1->cuota==1) {
          $cuota = "Enero";
        } else if ($request1->cuota==2) {
          $cuota = "Febrero";
        }else if ($request1->cuota==3) {
          $cuota = "Marzo";
        } else if ($request1->cuota==4) {
          $cuota = "Abril";
        } else if ($request1->cuota==5) {
          $cuota = "Mayo";
        } else if ($request1->cuota==6) {
          $cuota = "Junio";
        }else if ($request1->cuota==7) {
          $cuota = "Julio";
        }else if ($request1->cuota==8) {
          $cuota = "Agosto";
        }else if ($request1->cuota==9) {
          $cuota = "Septiembre";
        } else if ($request1->cuota==10) {
          $cuota = "Octubre";
        }else if ($request1->cuota==11) {
          $cuota = "Noviembre";
        } else if ($request1->cuota==12){
          $cuota = "Diciembre";
        }else{
          $cuota = "N/A";
        }
				?>
				<tr>
        <td><?php echo $request1->n1." ".$request1->apellido;?></td>
        <td><?php echo $request1->concepto; ?></td>
        <td><?php echo $request1->cobro; ?></td>
				<td>$ <?php echo $request1->importe; ?></td>
        <td>$ <?php if ($request1->importe>300) {
          echo number_format($request1->importe-125,2,'.',',');
        } else {
          echo number_format($request1->importe-($request1->importe * 41.6666666667)/100,2,'.',',');
        }
        ?></td>
        <td>$ <?php if ($request1->importe>300) {
          echo "125.00";
        } else {
          echo number_format(($request1->importe * 41.6666666667)/100,2,'.',',');
        }
        
        ?></td>
				<td><?php echo $cuota; ?></td>				
				</tr>
				<?php
		}
			?>
			</table>
      </div>
      </div>
      </div>
	</div>
</div>
