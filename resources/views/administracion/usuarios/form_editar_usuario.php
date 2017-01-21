<div style="overflow-x:auto;">
<div class="row">  

  <div class="col-md-6">

        <div class="box box-primary">
                
                <div class="box-header">
                  <h3 class="box-title">Editar información del Usuario</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_feu"></div>



<form  id="f_editar_usuario"  method="post"  action="actualizar_usuario" class="form-horizontal form_entrada" >                
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
  <input type="hidden" name="id" value="<?= $usuario->id; ?>">              


<div class="box-body col-xs-12">

<div class="form-group col-xs-6">
                      <label for="name">Nombres</label>
                      <input type="text" class="form-control" id="name" name="name"  value="<?= $usuario->name; ?>"  >
</div>
<div class="form-group col-xs-6">
                      <label for="last_name">Apellidos</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $usuario->last_name; ?>" >
</div>

<div class="form-group col-xs-6">
                      <label for="rol">Rol</label>
                       <select id="rol" name="rol" class="form-control">
<option value="Estudiante">Estudiante</option>
<option value="Profesor">Profesor</option>
<option value="Director">Director</option>
<option value="Administrador">Administrador</option>
                      </select>
                                 
</div>

<div class="form-group col-xs-6">
                      <label for="type">Tipo Documento</label>
                      
                     
                       <select id="type" name="type" class="form-control">
<option value="RC">RC</option>
<option value="TI">TI</option>
<option value="CC">CC</option>
<option value="CE">CE</option>
                      </select>
                                 
</div>

<div class="form-group col-xs-6">
                      <label for="telefono">Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->telefono; ?>"  >
</div>
<div class="form-group col-xs-12">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email"  value="<?= $usuario->email; ?>" >
</div>
<div class="form-group col-xs-12">
                      <label for="direccion">Direccion</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $usuario->direccion; ?>" >
</div>

</div>

<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
</div>

</form>
</div>

</div> <!-- end col mod 6 -->

  <div class="col-md-6">

      <div class="box box-primary">
                      <div class="box-header">
                        <h3 class="box-title">Cambiar Fotografia</h3>
                      </div><!-- /.box-header -->
     
      <div id="notificacion_resul_fci"></div>

      <form  id="f_subir_imagen" name="f_subir_imagen" method="post"  action="subir_imagen_usuario" class="formarchivo" enctype="multipart/form-data" >                
      
       <input type="hidden" name="id_usuario_foto" value="<?= $usuario->id; ?>"> 
       <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

      <div class="box-body">
        <div class="form-group col-xs-12" >
          <center>
          <?php if($usuario->avatarurl==""){ $usuario->avatarurl="images/avatar.jpg"; }  ?>
          <img src="<?=  $usuario->avatarurl;  ?>"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario" >
          </center>
                <!-- User image -->
       </div>

      <div class="form-group col-xs-12"  >
             <label>Agregar Imagen </label>
              <input name="archivo" id="archivo" type="file"   class="fa fa-paperclip"  required/><br /><br />
      </div>

     
      <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
      </div>
      </form>
      </div>

  </div>    <!-- end col mod 6 -->

    <div class="col-md-12">
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cambiar Password</h3>
                </div><!-- /.box-header -->

                <div id="notificacion_resul_fcp"></div>
                <!-- form start -->
                <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                     <input type="hidden" name="id_usuario_password" value="<?= $usuario->id; ?>"> 
                   <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password">
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                  </div>
                </form>
              </div>
  </div>    <!-- end col mod 6 -->
</div> <!-- end row -->
</form>