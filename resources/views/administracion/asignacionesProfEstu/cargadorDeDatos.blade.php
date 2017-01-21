@extends('layouts.admin')
@section('content')
<div style="overflow-x:auto;">
<div class="container">

  <div class="box box-primary">
     <div class="box-header">
          <h3 class="box-title">Selecciona el archivo con los datos de los estudiantess</h3>
     </div><!-- /.box-header -->
    <div id="notificacion_cargueDatos"></div>
  
  {!! Form::open(['route' => ['cargarDatos'], 'method' => 'POST', 'id' =>'form-cargaDatoEstudiante', 'class' =>'formarchivo']) !!} 
  	<div class="box-body">
 
    <div class="form-group"></br>
         <i class="fa fa-paperclip"></i>Selecciona archivo en excel
        <input name="archivo" id="file" type="file"   class="fa fa-paperclip"  required/><br />
    </div>

    <div class="box-footer">      
        <button type="submit" class="btn btn-primary">Cargar Datos</button>
    </div>

    </div>
   {!! Form::close() !!} 
</div>
</div>

@stop