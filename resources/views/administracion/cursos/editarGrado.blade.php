@extends('layouts.admin')
@section('content')
@include('alertas.solicitudes')
<div style="overflow-x:auto;">
<div class="row">  
  		<div class="col-md-6">
        	<div class="box box-primary">
                <div class="box-header">
                	<h3 class="box-title">Editar Cursos</h3>
                </div><!-- /.box-header -->
 
						{!!Form::open(['route'=>['actualizar_curso',$curso],'method'=>'PUT','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}  
  						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
  						<input type="hidden" name="id" value="<?= $curso->id; ?>">              
						
						<div class="box-body"> 
						<div class="form-group col-xs-12">
      						<label for="nombre">Curso</label>
      						<input type="text" class="form-control" id="nombre" name="nombre"  value="<?= $curso->name; ?>"  >
						</div>
<!--
						<div class="form-group col-xs-12">
  		  					<label for="salon">Salon asignado</label> </br>
							<select class="form-control" name="salon">
    							@foreach($salones as $salon)
      								<option value="{{ $salon }}">{{$salon}}</option>
    							@endforeach
  			  				</select>
		   				</div>-->

						<div class="form-group col-xs-12">
  		  					<label for="salon">Director asignado</label> </br>
							<select class="form-control" name="director">
    							@foreach($directores as $director)
      								<option value="{{ $director }}">{{$director}}</option>
    							@endforeach
  			  				</select>
		   				</div>

						<div class="box-footer col-xs-12">
 							<button type="submit" class="btn btn-primary">Actualizar Datos</button>
						</div>
						</div>

						{!!Form::close()!!}
			</div><!-- end box primary -->
		</div> <!-- end col-md-6 -->
</div>
</div>

@stop