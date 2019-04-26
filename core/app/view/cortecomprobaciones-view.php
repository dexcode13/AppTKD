<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Informe de Corte de Comprobaciones
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="core/app/view/reporte-corte.php" target="_blank">
        <!--<form role="form" class="form-horizontal" action="index.php?view=cortecomprobaciones">-->
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Fecha</label>
              <div class="col-sm-2">
              <input type="text" name="inicio" required class="form-control" id="inicio" placeholder="AAAA-MM-DD">
              </div>

              <label class="col-sm-1">Hasta</label>
              <div class="col-sm-2">
              <input type="text" name="fin" required class="form-control" id="fin" placeholder="AAAA-MM-DD">
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 120px;">
                  <i class="fa fa-print"></i> Imprimir
                </button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
  <?php
  $inicio = isset($_POST["inicio"]);
  $fin    = isset($_POST["fin"]);

  echo $inicio;
  echo $fin;
  ?>
</section><!-- /.content -->
<script>
$(document).ready(function() {
    $('#inicio').pickadate({
        format: 'yyyy/mm/dd',
				//min: new Date(),
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
				//disable: [ 1, 7]
    });
		
    $('#fin').pickadate({
        format: 'yyyy/mm/dd',
				//min: new Date(),
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
				//disable: [1, 7]
    });
});
</script>
