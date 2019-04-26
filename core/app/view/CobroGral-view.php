<?php 
  /*$user = AlumnosData::getByAlumno($_GET["rgi"]);
  date_default_timezone_set('America/Merida');
  setlocale(LC_TIME, 'spanish');
  $mes = strftime("%B");
  $mes_mayus = strtoupper($mes);
  //$day = date('d');

  $day= date('d');
  if($day>=1 && $day<6)
  {
      $pago = 250;
  }
  else if ($day>5 && $day<11)
  {
      $pago = 300;
  }
  else if($day>=11 && $day<16)
  {
      $pago = 350;
  }
  else 
  {
    $pago = 250;
    $msj = "Pago Adelantado";
  }*/
?>
<div class="row">
	<div class="col-md-6">

  <!-- Input addon -->
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class='fa fa-money'></i> Cobros Generales</h3>
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" id="addproduct" action="./?action=pagarGral" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input type="text" readonly value="<?php echo date('Y-m-d h:i:s');?>" class="form-control" placeholder="">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="cliente" required class="form-control" placeholder="Cliente" autocomplete="off">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                <input type="text" name="concepto" required class="form-control" placeholder="Concepto de Cobro" autocomplete="off">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="numeric" name="importe" required class="form-control" autocomplete="off">
                <span class="input-group-addon">.00</span>
              </div> 
              <br>
              <div class="input-group">
              <div class="col-lg-2 col-lg-10">
              
                <button type="submit" class="btn btn-success">Efectuar Pago</button>
              </div>
            </div>
          </form>             
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
         <!--/.col (right) -->
        <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>$ <?php echo number_format(AlumnosData::getByTotalGrales()->total,2,'.',',');?></h3>
                  <p>Total Cobros Generales</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tags"></i>
                </div>
                
                <a href="#" class="small-box-footer"><i class="fa fa-calendar"></i> <?php echo date('Y-m-d');?> <i class="fa fa-calendar"></i></a>
              </div>
        </div>
	</div>