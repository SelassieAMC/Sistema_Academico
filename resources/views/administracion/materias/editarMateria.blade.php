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
						{!!Form::open(['route'=>['actualizar_materia',$materia,$idRel],'method'=>'PUT','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}  
  						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
  						<input type="hidden" name="id" value="<?= $materia->id; ?>">              
						

              <div class="form-group col-xs-6">
                <label for="director"><h4>Seleccione profesor o agregue relaciones no existentes:</h4></label> <br/><br/>
                <table>
                @foreach($profesores as $profesor)
                  <tr>
                    <td>
                    <div class="col-md-12">
                      <label class="checkbox"><input id="profesor" class="flat-red" type="checkbox" name="profesor[]" value="{{$profesor}}">&nbsp;&nbsp;&nbsp;{{$profesor}}></label>
                    </div>
                    </td>
                  </tr>
                @endforeach
                </table>
              </div>

              <div class="form-group col-xs-6">
                <label for="Curso">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $materia->nombre; ?>"  required>        
              </div>


    					<div class="form-group col-xs-6">
                <label for="Curso">Intensidad Horaria</label>
                <input type="text" class="form-control" id="intensidad" name="intensidad"  value="<?= $materia->intensidadhor; ?>"  required>
              </div>

              <div class="form-group col-xs-6">
                <label for="Curso">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $materia->descripcion; ?>"  >
              </div>

              <div class="form-group col-xs-6">
                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
              </div>
            {!!Form::close()!!}
  </div>
</div>
</div>
</div>

@stop