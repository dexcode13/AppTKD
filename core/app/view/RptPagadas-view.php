<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-bar-chart'></i> Reporte de Cuotas Pagadas</h1>
			<form method="post" action="index.php?action=CuotasPagadasTKD">
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
			<form method="post" action="index.php?action=CuotasPagadasGim">
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
	</div>
</div>
</div>
</div>