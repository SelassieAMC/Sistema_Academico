@extends('layouts.admin')
@section('content')
@include('alertas.solicitudes')
<div style="overflow-x:auto;">
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">        
    <div class="box-header">
        <h3 class="box-title">Materias</h3>
    </div><!-- /.box-header -->

	  <form method="POST" action="crearMateria" accept-charset="UTF-8" enctype="multipart/form-data">
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  		<div class="box-body">  

        <div class="form-group col-xs-6">
          <label for="director"><h4>Seleccione los profesores que dictan la materia:</h4></label> <br/><br/>
          <table>
          @foreach($profesores as $profesor)
            <tr>
              <td>
              <div class="col-md-12">
                <label class="checkbox"><input id="profesor" class="flat-red" type="checkbox" name="profesor[]" value="{{$profesor}}">&nbsp;&nbsp;&nbsp;{{$profesor}}</label>
              </div>
              </td>
            </tr>
          @endforeach
          </table>
        </div>

  		  <div class="form-group col-xs-6">
    		  <label for="Curso">Nombre</label>
    		  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la materia" required>  		  
    	  </div>

        <div class="form-group col-xs-6">
          <label for="Curso">Intensidad Horaria</label>
          <input type="text" class="form-control" id="intensidad" name="intensidad" placeholder="Numero de horas semanales" required> 
        </div>

        <div class="form-group col-xs-6">
          <label for="Curso">Descripcion</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de la materia">  
        </div>

        <div class="form-group col-xs-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

@stop