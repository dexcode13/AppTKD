<?php


  $dateB = new DateTime(date('Y-m-d')); 
  $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
  $sd= strtotime(date_format($dateA,"Y-m-d"));
  $ed = strtotime(date("Y-m-d"));
  $ntot = 0;
  $nsells = 0;
  $sumatot = array();
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  $operations[$i] = SolicitudData::getGroupByDateAsis(date("Y-m-d",$i),date("Y-m-d",$i));


//    $sumatot[date("Y-m-d",$i)]=$sum;
}


?>
    <section class="content-header">
      <h1>
        AppTKD
        <small>Version 1.0</small>
      </h1>
    </section>

<section class="content">

<!-- Button trigger modal -->



 <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Alumnos</span>
              <span class="info-box-number"><?php echo count(AlumnosData::getAllAlumnosActivos());?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Infantil</span>
              <span class="info-box-number"><?php echo count(AlumnosData::getByCat1());?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Juvenil</span>
              <span class="info-box-number"><?php echo count(AlumnosData::getByCat2());?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Adultos</span>
              <?php //$p= UserData::getByCargo();?>
              <span class="info-box-number"><?php echo count(AlumnosData::getByCat3());?></span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="box box-primary">
<div class="box-header">
<div class="box-title">Asistencias de los ultimos 30 dias</div>
</div>
<div class="box-body">
<div id="graph" class="animate" data-animate="fadeInUp" ></div>
</div>
</div>

<script>

<?php 
echo "var c=0;";
echo "var dates=Array();";
echo "var data=Array();";
echo "var total=Array();";
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  echo "dates[c]=\"".date("Y-m-d",$i)."\";";
  echo "data[c]=".$operations[$i][0]->s.";";
  echo "total[c]={x: dates[c],y: data[c]};";
  echo "c++;";
}
?>
// Use Morris.Area instead of Morris.Line
Morris.Area({
  element: 'graph',
  data: total,
  xkey: 'x',
  ykeys: ['y',],
  labels: ['Asistencias']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>


</section>