@extends('layouts.admin')
@section('content')

<div class="box box-primary col-xs-12">

                <div class="box-header">
                  <h3 class="box-title">Fotos de Galeria</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fcpub"></div>

<form method="POST" action="cargarFoto" accept-charset="UTF-8" enctype="multipart/form-data">



  <input type="hidden" name="id_publicador" value="<?= $usuario->id; ?>">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

  <div class="form-group col-xs-12">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de imagen" required>
  </div>

  <div class="box-body col-xs-6">

    <div class="form-group col-xs-12">
      <label>Agregar Imagen </label>
        <input name="imagen" id="imagen" type="file"   class="fa fa-paperclip" >
    </div>
  </div>



  <div class="box-footer col-xs-12 ">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

</div>
@stop
