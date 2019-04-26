<?php


  $dateB = new DateTime(date('Y-m-d')); 
  $dateA = $dateB->sub(DateInterval::createFromDateString('15 days'));
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
      <h1><!--<small>Version 1.0</small>-->
        <center>Academia de Taekwondo "Hermanos Marín"</center></h1>
      
    </section>

<section class="content">

<!-- Button trigger modal -->
<div class="row">
          <div class="clearfix"></div>
          <div class="col-md-4">
            <div class="box box-solid box-warning">
              <div class="box-header">
                <h3 class="box-title">Home</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
              
                <div class="widget-user-image">
                <center>
              <img class="img-circle" width="128" heigth="128" src="img/tkd.png" alt="User Avatar">
            </center>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Alumnos TKD <span class="pull-right badge bg-blue"><?php echo count(AlumnosData::getAllAlumnosActivos());?></span></a></li>
                <li><a href="#">Alumnos GIM <span class="pull-right badge bg-aqua"><?php echo count(AlumnosData::getAllAlumnosActivosGIM());?></span></a></li>
                <li><a href="#">Cuotas Pendientes TKD <span class="pull-right badge bg-red"><?php echo count(AlumnosData::getByPendientesXmesTKD());?></span></a></li>
                <li><a href="#">Cuotas Pendientes GIM <span class="pull-right badge bg-red"><?php echo count(AlumnosData::getByPendientesXmesGIM());?></span></a></li>
              </ul>
            </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
          <div class="col-md-4">
            <div class="box box-solid box-success">
              <div class="box-header">
              <center><h3 class="box-title">Mejor Asistencia del Mes TKD</h3><center>
              </div><!-- /.box-header -->
              <div class="box-body">
              <center>
              <h4>
              <span class="label label-warning label-as-badge">
              <?php echo AlumnosData::getByAsistenciaMejorTKD()->nombre; ?></span></h4>
                <div class="widget-user-image">
                
              <img class="img-circle" width="128" heigth="128" src="_assets/img/alumnos/<?php echo AlumnosData::getByAsistenciaMejorTKD()->rgi; ?>.png" alt="User Avatar">
            
            </div>
            </center>
                <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresTKD()->A; ?></h5>
                    <span class="description-text">Asistencias</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresTKD()->R; ?></h5>
                    <span class="description-text">Retardos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresTKD()->F; ?></h5>
                    <span class="description-text">Faltas</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
          <div class="col-md-4">
            <div class="box box-solid box-info">
              <div class="box-header">
                <center><h3 class="box-title">Mejor Asistencia del Mes GIM</h3><center>
              </div><!-- /.box-header -->
              <div class="box-body">
              <center>
              <h4>
              <span class="label label-warning label-as-badge">
              <?php echo AlumnosData::getByAsistenciaMejorGIM()->nombre; ?></span></h4>
                <div class="widget-user-image">
                
              <img class="img-circle" width="128" heigth="128" src="_assets/img/alumnos/<?php echo AlumnosData::getByAsistenciaMejorGIM()->rgi; ?>.png" alt="User Avatar">
            
            </div>
            </center>
                <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresGIM()->A; ?></h5>
                    <span class="description-text">Asistencias</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresGIM()->R; ?></h5>
                    <span class="description-text">Retardos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo AlumnosData::getByValoresGIM()->F; ?></h5>
                    <span class="description-text">Faltas</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div><!-- /.row -->
 

<div class="box box-primary">
<div class="box-header">
<div class="box-title">Asistencias de los ultimos 15 dias</div>
</div>
<div class="box-body">
  <div id="graph" class="animate" data-animate="fadeInUp" ></div>
</div>
</div>
<?php
      $request = SolicitudData::getCuotasVencidas();
?>
<!-- TABLE: LATEST ORDERS -->
<div class="box box-info">
<div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Mensualidades Atrasadas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="administrador" class="table table-bordered datatable table-hover">
                  <thead>
                  <tr>
                    <th>RGI</th>
                    <th>Alumno</th>
                    <th>Clase</th>
                    <th>Status</th>
                    <th>Nro de Cuotas</th>
                  </tr>
                  </thead>
                  <?php
                  foreach($request as $request1){
                    ?>
                  
                  <tr>
                    <td><?php echo $request1->rgi;?></td>
                    <td><?php echo $request1->name;?></td>
                    <td><?php if($request1->clase==0){
                      echo "TKD";
                    }else {
                      echo "GIM";
                    }?></td>
                    <td><span class="label label-danger">Vencido</span></td>
                    <td><center>
                    <?php echo $request1->cuotas;?></center>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                 
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
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