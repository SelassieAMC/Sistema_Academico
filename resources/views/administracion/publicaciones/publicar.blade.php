@extends('layouts.admin')
@section('content')
<div style="overflow-x:auto;">
       <div class="row">
            <div class="col-md-12">
<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Publicaciones</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fcpub"></div>

<form method="POST" action="cargarPublicacion" accept-charset="UTF-8" enctype="multipart/form-data">

 <!--<form  id="f_nueva_publicacion"  method="post"  action="cargarPublicacion" class="form-horizontal form_archivo" >   -->

  <input type="hidden" name="id_publicador" value="<?= $usuario->id; ?>">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  

  <div class="form-group col-xs-12">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo de Publicacion" required>
  </div>

  <div class="box-body col-xs-6">
    <div class="form-group col-xs-12">
      <label for="seccion">Seccion</label>              
      <select id="seccion" name="seccion" class="form-control">

        <option value="Principal">Principal</option>
        <option value="Noticias">Noticias</option>

      </select>
    </div>
    <div class="form-group col-xs-12">
      <label>Agregar Imagen </label>
        <input name="imagen" id="imagen" type="file"   class="fa fa-paperclip" >
    </div>

    <div class="form-group col-xs-12">
      <label>Agregar PDF </label>
      <input name="pdf" id="pdf" type="file"   class="fa fa-paperclip" >
    </div>
  </div>

  <div class="form-group col-xs-12">
      <textarea id="descripcion" name="descripcion" class="form-control" style="height: 150px" placeholder="Descripcion de la publicacion">
      </textarea>
      <script type="text/javascript">
        CKEDITOR.replace( 'descripcion');
      </script>   
  </div>

  <div class="box-footer col-xs-12 ">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
  </form

</div>
</div>
</div>
</div>
@stop