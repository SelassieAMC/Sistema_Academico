<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestor Academico | Panel Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

     {!! Html::style('bootstrap/css/bootstrap.min.css') !!}<!-- Bootstrap 3.3.5 -->
     {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}<!-- Font Awesome -->
     {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}<!-- Ionicons -->
     {!! Html::style('dist/css/AdminLTE.min.css') !!}<!-- Theme style -->
     {!! Html::style('dist/css/skins/_all-skins.min.css') !!}    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
     {!! Html::style('plugins/iCheck/flat/blue.css') !!}<!-- iCheck -->
     {!! Html::style('plugins/iCheck/all.css') !!}<!-- iCheck for checkboxes and radio inputs -->
     {!! Html::style('css/academicManage.css') !!}<!-- Personalizados-->
     {!! Html::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}<!-- bootstrap wysihtml5 - text editor -->
     {!! Html::style('plugins/daterangepicker/daterangepicker-bs3.css') !!}<!-- Daterange picker -->
     {!! Html::style('plugins/datepicker/datepicker3.css') !!}<!-- Date Picker -->
     {!! Html::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}<!-- jvectormap -->
     {!! Html::style('plugins/morris/morris.css') !!}<!-- Morris chart -->
     {!! Html::style('css/academicManage.css') !!}
     {!! Html::style('plugins/fullcalendar/fullcalendar.min.css') !!}
     {!! Html::style('css/StiloMensajesEliminacion.css') !!}
      <script src="ckeditor/ckeditor.js"></script>
      
  </head>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">Rector</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Direccion Colegio</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <?php if(Auth::user()->avatarurl==""){ Auth::user()->avatarurl="images/avatar.jpg"; }  ?>
                  <img src={{ Auth::user()->avatarurl }}  class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if(Auth::user()->avatarurl==""){ Auth::user()->avatarurl="images/avatar.jpg"; }  ?>
                    <img src={{ Auth::user()->avatarurl }}  class="img-circle" alt="User Image">
                    <p>
                     {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                      <small>Miembro desde {{ Auth::user()->created_at }}</small>
                    </p>
                  </li>

                  <li class="user-footer">
                    <div class="pull-left">
                      <a onclick="mostrarperfil({{Auth::user()->id }});" class="btn btn-default btn-flat">Perfil</a>
                    </div>

                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php if(Auth::user()->avatarurl==""){ Auth::user()->avatarurl="images/avatar.jpg"; }  ?>
              <img src={{ Auth::user()->avatarurl }}  class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            
              <li class="treeview">
                <a href="{{ url('') }}">
                  <i class="fa fa-university"></i> <span >Pagina Principal</span>
                </a>
              </li>

              <li class="treeview">
                    <a href="#">
                      <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(2,2);" ><i class="fa fa-list-alt"></i>Listar</a></li>
                    </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-fw fa-briefcase"></i> <span>Docentes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="verHorarios"><i class="fa fa-tag"></i>Horario de Clases</a></li>
                  </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-fw fa-graduation-cap"></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="verEstados"><i class="fa fa-users"></i>Datos y Estados</a></li>
                  </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-fw fa-envelope"></i> <span>Mail</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="form_correo_rector" ><i class="fa fa-send"></i>Redactar</a></li>
                </ul>
                <ul class="treeview-menu">
                  <li class="active"><a href="infoPadresR" ><i class="fa fa-send"></i>Acudientes</a></li>
                </ul>
                <ul class="treeview-menu">
                  <li class="active"><a href="{{ url('CorreosInstituR') }}" ><i class="fa fa-send"></i>Institucionales</a></li>
                </ul>
              </li>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-fw fa-book"></i> <span>Materias</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="listaMateriasRector" ><i class="fa fa-pencil"></i>Listar</a></li>
                        <li class="active"><a href="listaProfesoresAsignadosRector" ><i class="fa fa-eye"></i>Ver profesores asignados</a></li>
                    </ul>
                  </li>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-fw fa-pencil"></i> <span>Cursos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="listaCursosRector"><i class="fa fa-list-alt"></i>Listar</a></li>
                      <li class="active"><a href="consultHorariosRector" ><i class="fa fa-eye"></i>Ver Horarios y Materias</a></li>
                    </ul>
                  </li>


                  <li class="treeview">
                  <a href="#">
                    <i class="fa fa-fw fa-building-o"></i> <span>Aulas de Clase</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="listaAulasRector"><i class="fa fa-list-alt"></i>Listar</a></li>
                      <li class="active"><a href="consultaAsignacionesRector"><i class="fa fa-eye"></i>Ver Asignaciones</a></li>
                    </ul>
                  </li>

                  <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open-o"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                  <li class="active"><a href="{{ url('HistoriaR') }}"><i class="fa fa-puzzle-piece"></i>Historia</a></li>
                  <li class="active"><a href="{{ url('ValoresR') }}"><i class="fa fa-gavel"></i>Valores institucionales</a></li>
                  <li class="active"><a href="{{ url('HimnoR') }}"><i class="fa fa-street-view"></i>Himno</a></li>
                </ul>
              </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- contenido capas modales -->
        <section> 
          <div id="capa_modal" class="div_modal" ></div>
          <div id="capa_para_edicion" class="div_contenido" >
        </section>
        
        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
          <div class="container">
            @if (Session::has('message'))
              <div class="input-group col-md-10">
                <div id="alert-success" class="alert alert-success fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Perfecto!</strong>{{ Session::get('message') }}
                </div>
              </div>
            @endif
            @if (Session::has('messageAlert'))
              <div class="input-group col-md-10">
                <div class="alert alert-warning fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong>{{ Session::get('messageAlert') }}
                </div>
              </div>
            @endif
          </div>
          @yield('content')
        </section>
    
      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
            <br>
         
         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="images/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
<!-- fullCalendar 2.2.5 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>


    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>  $("#content-wrapper").css("min-height","2000px"); </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>    <!-- Morris.js charts -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>   <!-- Sparkline -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>    
    <script src="plugins/knob/jquery.knob.js"></script>   <!-- jQuery Knob Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>   
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>    <!-- datepicker -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>   <!-- Slimscroll -->
    <script src="dist/js/app.min.js"></script> <!-- AdminLTE App -->
    <script src="js/bootbox.min.js"></script> 
    <script src="plugins/iCheck/icheck.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script src="js/academicManage.js"></script><!-- javascript del sistema -->
    <script src="plugins/chartjs/Chart.min.js"></script><!-- ChartJS 1.0.1 -->


<!-- Page specific script -->
@yield('scripts')
<script>
                $(function () {
                  //iCheck for checkbox and radio inputs
                  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                  });
                  //Red color scheme for iCheck
                  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                  });
                  //Flat red color scheme for iCheck
                  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                  });
                });
</script>
  </body>
</html>
