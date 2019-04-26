<?php
// Database credentials
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'produccion_eric';

// Create connection and select db
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get data from database
$result = $db->query("select  case cuota when 1 then 'Enero'
						when 2 then 'Febrero'
						when 3 then 'Marzo'
						when 4 then 'Abril'
						when 5 then 'Mayo'
						when 6 then 'Junio'
						when 7 then 'Julio'
						when 8 then 'Agosto'
						when 9 then 'Septiembre'
						when 10 then 'Octubre'
						when 11 then 'Noviembre'
						else 'Diciembre' end mes
						, count(*) as total
						from plan_cuotas as p inner join alumnos as a on p.id_alumno=a.id_alumno
						where p.status in (0,2) and clase=0 and ciclo=2018 and a.status=1
						GROUP by cuota");
?>
<script type="text/javascript" src="plugins/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Mes', 'Alumnos'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['mes']."', ".$row['total']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Alumnos Atrasados de TKD 2018',
        width: 900,
        height: 500,
        is3D: true,
        //pieHole: 0.5,
        pieSliceText: 'value',
        
        /*slices: {
            0: {offset: 0.5},
            6: {offset: 0.4},
            8: {offset: 0.3}
        },*/

    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-bar-chart'></i> Reporte de Cuotas Pendientes</h1>
			<form method="post" action="index.php?action=CuotasPendientesTKD">
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
							
							<select class="form-control" name="sd">
								<option value="">--SELECCIONE UN MES--</option>
								<option value="1">ENERO</option>
								<option value="2">FEBRERO</option>
								<option value="3">MARZO</option>
								<option value="4">ABRIL</option>
								<option value="5">MAYO</option>
								<option value="6">JUNIO</option>
								<option value="7">JULIO</option>
								<option value="8">AGOSTO</option>
								<option value="9">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div> 
							<!--<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">-->
						</div>
						<div class="col-md-3">
							<input type="submit" class="btn btn-success btn-block" value="Procesar TKD">
						</div>
					</div>
			</form>
			<form method="post" action="index.php?action=CuotasPendientesGim">
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
							
							<select class="form-control" name="sd">
								<option value="">--SELECCIONE UN MES--</option>
								<option value="1">ENERO</option>
								<option value="2">FEBRERO</option>
								<option value="3">MARZO</option>
								<option value="4">ABRIL</option>
								<option value="5">MAYO</option>
								<option value="6">JUNIO</option>
								<option value="7">JULIO</option>
								<option value="8">AGOSTO</option>
								<option value="9">SEPTIEMBRE</option>
								<option value="10">OCTUBRE</option>
								<option value="11">NOVIEMBRE</option>
								<option value="12">DICIEMBRE</option>
							</select>
						</div> 
							<!--<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">-->
						</div>
						<div class="col-md-3">
						<input type="submit" class="btn btn-success btn-block" value="Procesar Gimnasia">
						</div>
					</div>
			</form>
			
				
					<div id="piechart"></div>
				
	</div>
</div>
</div>
</div>