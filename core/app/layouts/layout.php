<!--
*Desarrollado por: Ing. Iván Hernández
*Fecha: 26/04/2017
*Función: Este archivo contiene el layout principal del sistema, y el contenido desde la base de datos
con sus clases respectivas
-->
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title>AppTKD | Academia Hermanos Marin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 4.1.0
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">-->
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!--<link href="css/style_edit.css" rel="stylesheet" type="text/css" />-->
    
    <script type="text/javascript" src="js/sweetalert2.js"></script>
    <script type="text/javascript" src="js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css" type="text/css">
    <link rel="stylesheet" href="css/sweetalert2.min.css" type="text/css">

    <link href="dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">

    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link href='plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='plugins/fullcalendar/moment.min.js'></script>
<script src='plugins/fullcalendar/fullcalendar.min.js'></script>
<!--  pickadate -->
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.css">
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.date.css">
<link rel="stylesheet" type="text/css" href="plugins/pickadate/themes/classic.time.css">
<!--  exportacion de archivos -->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->
<link rel="stylesheet" type="text/css" href="plugins/datatables/buttons.dataTables.min.css">
    

   

<script src='plugins/pickadate/picker.js'></script>
<script src='plugins/pickadate/picker.date.js'></script>
<script src='plugins/pickadate/picker.time.js'></script>

<!-- <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css"/>
<script src='plugins/select2/select2.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
  $("select").select2();
});
</script>
-->
  </head>

  <body class="<?php if(isset($_SESSION["user_id"])):?>  skin-red sidebar-mini <?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>TKD</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>App</b>TKD</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

<!-- Navbar Right Menu --><!--
<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                   
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sender Name
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Message Excerpt</p>
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
             
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="ion ion-ios-people info"></i> Notification title
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                   
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>-->
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="">
                  <?php 
                  if(isset($_SESSION["user_id"]))
                  {
                     echo UserData::getById($_SESSION["user_id"])->name.' '.UserData::getById($_SESSION["user_id"])->lastname; 
                  }
                  ?></span>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./?view=configuration" class="btn btn-default btn-flat">Cambiar Clave</a>
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                  
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
<!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <?php if(isset($_SESSION["user_id"])):?>

              <?php $u = UserData::getById($_SESSION["user_id"]); ?>
            <li><a href="./index.php?view=home"><i class='fa fa-line-chart'></i> <span>Inicio</span></a></li>
 
        <!--<li class="active treeview">
          <a href="#">
            <i class="fa fa-ticket"></i> <span>Solicitudes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>-->
          <ul class="treeview-menu">
          <?php foreach(DepartamentoData::getAll() as $s):?>
            <li><a href="./?view=tickets&status=<?php echo $s->id_departamento; ?>"><i class="fa fa-circle-o"></i> <?php echo $s->name; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-users'></i> <span>Alumnos TKD</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href="./?view=listAlumnos"><i class='fa fa-bar-chart'></i>Lista de Alumnos</a></li>-->
                <li><a href="./?view=alumnos&op=all"><i class='fa fa-file-text'></i>Expediente Alumno</a></li>
                <li><a href="./?view=newAlumno"><i class='fa fa-user-plus'></i>Nuevo Alumno</a></li>
                <li><a href="./?view=alumnosInactivos"><i class='fa fa-user-times'></i>Alumnos Inactivos</a></li>
                <!--<li><a href="./?view=cobrosMensualidades&op=all">Cobro de Mensualidad</a></li>-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-users'></i> <span>Alumnos Gimnasia</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="./?view=alumnosGim"><i class='fa fa-file-text'></i>Expediente Alumno</a></li>
                <li><a href="./?view=newAlumnoG"><i class='fa fa-user-plus'></i>Nuevo Alumno</a></li>
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-calendar'></i> <span>Asistencias TKD</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href="./?view=asistencias"><i class='fa fa-qrcode'></i>Control de Asistencias</a></li>
                <li><a href="./?view=rptasistencias"><i class='fa fa-qrcode'></i>Reporte de Asistencias</a></li>
                <li><a href="./?view=asistencias"><i class='fa fa-qrcode'></i>Todas las Asistencias</a></li>-->
                <li><a href="./?view=ReporteAsistenciaTKD"><i class='fa fa-qrcode'></i> <span>Reporte Asistencias</span></a></li>
                <li><a href="./?view=ReporteGroupByTKD"><i class='fa fa-bar-chart'></i> <span>Reporte Asistencias Clasificado</span></a></li>
                <li><a href="./?view=justificarFaltasTKD"><i class='fa fa-edit'></i>Justificar Faltas</a></li>
                <li><a href="./?view=configHorarioTKD"><i class='fa fa-cog'></i>Configuracion de Asistencias</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-calendar'></i> <span>Asistencias GIM</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href="./?view=asistencias"><i class='fa fa-qrcode'></i>Control de Asistencias</a></li>
                <li><a href="./?view=rptasistencias"><i class='fa fa-qrcode'></i>Reporte de Asistencias</a></li>
                <li><a href="./?view=asistencias"><i class='fa fa-qrcode'></i>Todas las Asistencias</a></li>-->
                <li><a href="./?view=ReporteAsistenciaGIM"><i class='fa fa-qrcode'></i> <span>Reporte Asistencias</span></a></li>
                <li><a href="./?view=ReporteGroupByGIM"><i class='fa fa-bar-chart'></i> <span>Reporte Asistencias Clasificado</span></a></li>
                <li><a href="./?view=justificarFaltasGIM"><i class='fa fa-edit'></i>Justificar Faltas</a></li>
                <li><a href="./?view=configHorarioGIM"><i class='fa fa-cog'></i>Configuracion de Asistencias</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-money'></i> <span>Tesoreria</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href="./?view=listAlumnos"><i class='fa fa-shopping-cart'></i>Cobros de Mensualidades</a></li>-->
                <li><a href="./?view=cobrosMensuales"><i class='fa fa-ticket'></i>Cobros de Cuotas TKD</a></li>
                <li><a href="./?view=cobrosGim"><i class='fa fa-ticket'></i>Cobros de Cuotas Gimnasia</a></li>
                <!--<li><a href="./?view=corteDia"><i class='fa fa-calendar'></i>Corte del Dia</a></li>-->
                <li><a href="./?view=CobroGral"><i class='fa fa-money'></i>Cobros Generales</a></li>
                <li><a href="./?view=CobrosAnticipados"><i class='fa fa-money'></i>Cobros Anticipados</a></li>
                <li><a href="./?view=CobrosAnualidadTKD"><i class='fa fa-money'></i>Cobros Anualidades TKD</a></li>
                <li><a href="./?view=CobrosAnualidadGIM"><i class='fa fa-money'></i>Cobros Anualidades GIM</a></li>
                
                <li><a href="./?view=RptCuotasxCicloTKD"><i class='fa fa-pie-chart'></i>Reporte Gral Cuotas Anual TKD</a></li>
                <li><a href="./?view=RptCuotasxCicloGIM"><i class='fa fa-pie-chart'></i>Reporte Gral Cuotas Anual Gim</a></li>
                <!--<li><a href="./?view=RptPagosGrales"><i class='fa fa-pie-chart'></i>Reporte Gral Cuotas Anual TKD</a></li>
                <li><a href="./?view=RptPagosGralesGim"><i class='fa fa-pie-chart'></i>Reporte Gral Cuotas Anual Gim</a></li>-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-bar-chart'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="./?view=RptAnualidadTKD"><i class='fa fa-bar-chart'></i>Reporte de Anualidades TKD</a></li>
              <li><a href="./?view=RptAnualidadGIM"><i class='fa fa-bar-chart'></i>Reporte de Anualidades GIM</a></li>                
                <li><a href="./?view=RptPagosxFecha"><i class='fa fa-bar-chart'></i>Reporte de Pagos Cuotas</a></li>
                <li><a href="./?view=RptGeneralesxFecha"><i class='fa fa-bar-chart'></i>Reporte de Cobros Generales</a></li>
                <li><a href="./?view=ReimpresionesCuotas"><i class='fa fa-file-text'></i>Reimpresiones Ticket TKD</a></li>
                <li><a href="./?view=ReimpresionesCuotasGim"><i class='fa fa-file-text'></i>Reimpresiones Ticket Gim</a></li>
                <li><a href="./?view=ReimpresionesGrales"><i class='fa fa-file-text'></i>Reimpresiones Ticket Generales</a></li>
                <li><a href="./?view=CortePagos"><i class='fa fa-file-text'></i>Imprimir Corte del dia</a></li>
                <li><a href="./?view=CortePagosGim"><i class='fa fa-file-text'></i>Imprimir Corte Gimnasia</a></li>
                <li><a href="./?view=RptPendientes"><i class='fa fa-bar-chart'></i> <span>Reporte Cuotas Pendientes</span></a></li>
                <li><a href="./?view=RptPagadas"><i class='fa fa-bar-chart'></i> <span>Reporte Cuotas Pagadas</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-tags'></i> <span>Plan de Pagos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=plan"><i class='fa fa-tasks'></i>Generar Plan de Cuotas</a></li>
                <!--<li><a href="./?view=planGim"><i class='fa fa-tasks'></i>Generar Plan Gimnasia</a></li>-->
              </ul>
            </li>
            <li><a href="./?view=RptCumples"><i class='fa fa-birthday-cake'></i> <span>Reporte de Cumpleaños</span></a></li>
            <li><a href="./?view=solicExamen"><i class='fa fa-file-text'></i> <span>Exámenes</span></a></li>
            <li><a href="./?view=fotos"><i class='fa fa-photo'></i> <span>Control de Fotos</span></a></li>
            <li><a href="./?view=backup"><i class='fa fa-cloud-download'></i> <span>Backups</span></a></li>
            <!--<li><a href="./?view=ReporteAsistencia"><i class='fa fa-desktop'></i> <span>Reporte Asistencia(Beta)</span></a></li>
            <li><a href="./?view=ReporteGroupBy"><i class='fa fa-desktop'></i> <span>Reporte Asistencia(GroupBy)</span></a></li>-->
            <!--<li><a href="./?view=asistencias"><i class='fa fa-edit'></i> <span>Asistencias</span></a></li>-->
            <!--<li><a href="./?view=comprobaciones&op=all"><i class='fa fa-money'></i> <span>Comprobaciones</span></a></li>-->
            <?php if($u->id_perfil==7):?>
            <!--<li><a href="./?view=cortecomprobaciones"><i class='fa fa-money'></i> <span>Reporte de Comprobaciones</span></a></li>-->
            <?php endif;?>
            <?php if($u->id_tipo==1):?>
            <!--<li><a href="./?view=solicExamen"><i class='fa fa-flask'></i> <span>Exámenes</span></a></li>-->
            <!--<li><a href="./?view=perfiles"><i class='fa fa-th-large'></i> <span>Perfiles</span></a></li>-->
            <!--<li><a href="./?view=persons&op=all"><i class='fa fa-smile-o'></i> <span>Clientes</span></a></li>-->
            <!--<li><a href="./?view=cortecomprobaciones"><i class='fa fa-money'></i> <span>Reporte de Comprobaciones</span></a></li>-->
            <!--<li><a href="./?view=recibosPagos"><i class='fa fa-money'></i> <span>Recibos de Pagos</span></a></li>-->
            <!--<li class="treeview">
              <a href="#"><i class='fa fa-money'></i> <span>Tesorería</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=recibosPagos">Recibos de Pagos</a></li>
                <li><a href="./?view=cobrosInscripciones&op=all">Cobro de Inscripciones</a></li>
                <li><a href="./?view=cobrosMensualidades&op=all">Cobro de Mensualidad</a></li>
              </ul>
            </li>-->
            <!--<li class="treeview">
              <a href="#"><i class='fa fa-user'></i> <span>Administracion de Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=asig_perfiles">Asignar Perfiles</a></li>
                <li><a href="./?view=asig_permisos">Asignar Permisos</a></li>
              </ul>
            </li>
              <li class="treeview">
              <a href="#"><i class='fa fa-file-text'></i> <span>Catalogos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./?view=cuentas">Cuentas Bancarias</a></li>
                <li><a href="./?view=bancos">Bancos</a></li>
                <li><a href="./?view=perfiles">Perfiles</a></li>
                <li><a href="./?view=departamentos">Departamentos</a></li>
              </ul>
            </li>-->
          <?php endif;?>
            <?php elseif(isset($_SESSION["pacient_id"])):?>
            <li><a href="./?view=pacienthome"><i class='fa fa-line-chart'></i> <span>Inicio</span></a></li>
            <li><a href="./?view=pacientnewreservation"><i class='fa fa-asterisk'></i> <span>Nueva Cita</span></a></li>
            <li><a href="./?view=pacientreservations"><i class='fa fa-calendar'></i> <span>Citas</span></a></li>
            <?php elseif(isset($_SESSION["medic_id"])):?>
            <li><a href="./?view=medichome"><i class='fa fa-dashboard'></i> <span>Inicio</span></a></li>
            <li><a href="./?view=medicnewreservation"><i class='fa fa-asterisk'></i> <span>Nueva Cita</span></a></li>
            <li><a href="./?view=medicreservations"><i class='fa fa-calendar'></i> <span>Citas</span></a></li>
            <li><a href="./?view=medicreports"><i class='fa fa-area-chart'></i> <span>Reportes</span></a></li>
            <?php endif; ?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"])  || isset($_SESSION["pacient_id"]) || isset($_SESSION["medic_id"]) ):?>
      <div class="content-wrapper">
      <div class="content">
        <?php View::load("index");?>
        </div>
      </div><!-- /.content-wrapper -->
        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> v1.0
        </div>
        <strong>Derechos Reservados &copy; <a href="http://www.consultoresdiaf.com" target="_blank">Ing. Iván Gpe Hernández Domínguez 2019</a></strong>
      </footer>
      <?php else:?>
        <?php if(isset($_GET["view"]) && $_GET["view"]=="user_id"):?>
<div class="login-box">
      <div class="login-logo">
        <h4>ACCESO AL PACIENTE</h4>
        <a href="./?view=pacientlogin"><b>SUPPORIX</b>MAX</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processloginpacient" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
              <a href="./" class="btn btn-default btn-block">Regresar</a>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
        <?php elseif(isset($_GET["view"]) && $_GET["view"]=="mediclogin"):?>
<div class="login-box">
      <div class="login-logo">
        <h4>ACCESO AL MEDICO</h4>
        <a href="./?view=pacientlogin"><b>SUPPORIX</b>MAX</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processloginmedic" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
              <a href="./" class="btn btn-default btn-block">Regresar</a>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
        <?php else:?>
<div class="login-box">
      <div class="login-logo">
      <img src="img/vikingos.png" class="img-circle" alt="Academias Hermano Marin" width="150" height="150"> <br>
        <a href="./"><b>App</b>TKD</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Contraseña"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
              <!--
              <a href="./?view=pacientlogin" class="btn btn-default btn-block">Login Paciente</a>
              <a href="./?view=mediclogin" class="btn btn-default btn-block">Login Medico</a>
              -->
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
    <?php endif;?>

     <?php endif;?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pickadate").pickadate({format: 'yyyy-mm-dd',min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>'});
        $(".pickatime").pickatime({format: 'HH:i',interval: 10 });
      })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables/buttons.flash.min.js"></script>
    <script src="plugins/datatables/jszip.min.js"></script>
    <script src="plugins/datatables/pdfmake.min.js"></script>
    <script src="plugins/datatables/vfs_fonts.js"></script>
    <script src="plugins/datatables/buttons.html5.min.js"></script>
    <script src="plugins/datatables/buttons.print.min.js"></script>
    <!--<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <!--Script para buscador de alumno-->
    <script type="text/javascript" src="js/typeahead.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    dom: 'Bfrtip',
        buttons: [
            //'copy', 'csv', 'excel', 'pdf', 'print'
            'excel'
            /*{
              extend: 'pdfHtml5',
              orientation: 'landscape',
              pageSize: 'LETTER'
            }*/
        ]
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>

