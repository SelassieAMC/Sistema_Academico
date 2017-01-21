<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laravel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Sistema</b>Educativo</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Registro en el sistema</p>
       
        <form action="register" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
          
          <div class="form-group has-feedback">
            <label>Numero de Identificacion</label>
            <input type="text" class="form-control" name="id" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <label>Apellidos</label>
            <input type="text" class="form-control" name="last_name" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group col-xs-6">
                      <label for="type">Tipo de documento</label>
                  
                       <select id="type" name="type" class="form-control">
                          <option value="RC">RC -- Registro Civil</option>
                          <option value="TI">TI -- Tarjeta de Identidad</option>
                          <option value="CC">CC -- Cedula de Ciudadania</option>
                          <option value="CE">CE -- Cedula de Extranjeria</option>
                        </select>
          </div>

          <div class="form-group col-xs-6">
              <label for="rol">Rol</label>    
              <select id="rol" name="rol" class="form-control">

                <option value="Estudiante">Estudiante</option>
                <option value="Profesor">Profesor</option>
                <option value="Director">Director</option>
                <option value="Administrador">Administrador</option>
                <option value="Rector">Rector</option>
              </select>
          </div>

          <div class="form-group has-feedback">
            <label>Telefono</label>
            <input type="text" class="form-control" name="telefono" >
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>

           <div class="form-group has-feedback">
             <label>Email</label>
            <input type="email" class="form-control" name="email" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" >
            <span class="glyphicon glyphicon-comment form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
                <label>password</label>
            <input type="password" class="form-control" name="password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row">
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </div><!-- /.col -->
          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
   

    <script>
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    
  </body>
</html>
