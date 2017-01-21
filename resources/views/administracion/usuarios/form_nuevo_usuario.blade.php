@extends('layouts.admin')
@section('content')
<div style="overflow-x:auto;">
<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Creacion de Usuarios</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>

<form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario" class="form-horizontal form_entrada" >                
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              

<div class="box-body col-xs-12">
<div class="form-group col-xs-6">
                      <label for="id">Numero de identificacion</label>
                      <input type="text" class="form-control" id="id" name="id" placeholder="Identificación" required>
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
                      <label for="name">Nombres</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" required>
</div>
<div class="form-group col-xs-6">
                      <label for="last_name">Apellidos</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" required>
</div>

<div class="form-group col-xs-6">
                      <label for="rol">Rol</label>
                  
                       <select id="rol" name="rol" class="form-control">

<option value="Estudiante">Estudiante</option>
<option value="Profesor">Profesor</option>
<option value="Director">Director</option>
<option value="Rector">Rector</option>
<option value="Administrador">Administrador</option>
                      </select>
</div>

<div class="form-group col-xs-6">
                      <label for="telefono">Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
</div>
<div class="form-group col-xs-12">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
</div>
<div class="form-group col-xs-12">
                      <label for="direccion">Direccion</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
</div>

<div class="form-group col-xs-12">
                      <label for="email">password*</label>
                      <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
</div>

</div>


<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


</form>

</div>
</div>

@stop