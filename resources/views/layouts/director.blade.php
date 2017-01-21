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
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">Director</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Director</span>
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
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
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
            <li class="active treeview">
              <a href="{{ url('') }}">
                <i class="fa fa-university"></i> <span>Pagina Principal</span></i>
              </a></li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('HorarioClasD') }}{{ Auth::user()->id }}" ><i class="fa fa-calendar"></i>Horario de clases</a></li>
                <li class="active"><a href="{{ url('SalonDictD') }}{{ Auth::user()->id }}" ><i class="fa fa-map-marker"></i>Salones donde dicta clase</a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Notas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('CursoD') }}{{ Auth::user()->id }}" ><i class="fa fa-check-square-o"></i>Cursos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Grupo</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('InfoGroup') }}{{ Auth::user()->id }}" ><i class="fa fa-graduation-cap"></i>Informacion de grupo</a></li>
              </ul>
            </li>
            <li class="treeview">
             <a href="#">
               <i class="fa fa-inbox"></i> <span>Docentes</span> <i class="fa fa-angle-left pull-right"></i>
             </a>
             <ul class="treeview-menu">
               <li class="active"><a href="{{ url('CorreosInstitD')}}" ><i class="fa fa-at"></i>Correos Institucionales</a></li>
             </ul>
           </li>
           <li class="treeview">
            <a href="#">
              <i class="fa fa-folder-open-o"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ url('HistoriaD') }}"><i class="fa fa-puzzle-piece"></i>Historia</a></li>
              <li class="active"><a href="{{ url('ValoresD') }}"><i class="fa fa-gavel"></i>Valores institucionales</a></li>
              <li class="active"><a href="{{ url('HimnoD') }}"><i class="fa fa-street-view"></i>Himno</a></li>
            </ul>
          </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->


        <!-- contenido capas modales -->
        <section>
          <div id="capa_modal" class="div_modal" ></div>
          <div id="capa_para_edicion" class="div_contenido" >
        </section>

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
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
   
    <script>  $("#content-wrapper").css("min-height","2000px"); </script>

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
  </body>
</html>
