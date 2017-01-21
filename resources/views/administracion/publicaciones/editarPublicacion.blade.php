@extends('layouts.admin')
@section('content')
@include('alertas.solicitudes')
<div style="overflow-x:auto;">
<div class="row">  
  <div class="col-md-12">
        <div class="box box-primary">
                
                <div class="box-header">
                  <h3 class="box-title">Editar Publicacion</h3>
                </div><!-- /.box-header -->
 
{!!Form::open(['route'=>['actualizar_pub',$publicacion],'method'=>'PUT','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}  

  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
  <input type="hidden" name="id" value="<?= $publicacion->id; ?>">              

<div class="form-group col-xs-12">
      <label for="titulo">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo"  value="<?= $publicacion->titulo; ?>"  >
</div>

<div class="form-group col-xs-6">
      <label for="pathImagen">Imagen</label>
      <input type="file" class="fa fa-paperclip" id="pathImagen" name="pathImagen" value="<?= $publicacion->pathImagen; ?>" >
</div>

<div class="form-group col-xs-6">
      <label for="pdf">PDF</label>
      <input type="file" class="fa fa-paperclip" id="pathPDF" name="pathPDF" value="<?= $publicacion->pathPDF; ?>" >                            
</div>

<div class="form-group col-xs-12">
      <label for="seccion">Seccion</label>              
      <select id="seccion" name="seccion" class="form-control">
        <option value="Principal">Principal</option>
        <option value="Noticias">Noticias</option>
      </select>
</div>

<div class="form-group col-xs-12">
      <label for="type">Descripcion</label>
      <textarea type="text" class="form-control" id="descripcion" name="descripcion" style="height: 150px"><?= $publicacion->descripcion; ?></textarea>
      <script type="text/javascript">
        CKEDITOR.replace( 'descripcion');
      </script>                         
</div>

<div class="box-footer col-xs-6 ">
  <button type="submit" class="btn btn-primary">Actualizar Datos</button>

{!!Form::close()!!}


</div>


</form>
</div>

</div> <!-- end row -->
</div>
@endsection