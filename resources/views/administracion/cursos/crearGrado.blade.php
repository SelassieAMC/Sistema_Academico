@extends('layouts.admin')
@section('content')
@include('alertas.solicitudes')
<div style="overflow-x:auto;">
<div class="row">
<div class="col-md-6">
	<div class="box box-primary">         
    <div class="box-header">
        <h3 class="box-title">Cursos</h3>
    </div><!-- /.box-header -->

	  <form method="POST" action="crearCurso" accept-charset="UTF-8" enctype="multipart/form-data">
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  		<div class="box-body">  

  		  <div class="form-group col-xs-12">
    		  <label for="Curso">Curso</label>
    		  <input type="text" class="form-control" id="curso" name="curso" placeholder="Numero de Grado o nombre de curso" required>  		  
    	  </div>
<!--
  		  <div class="form-group col-xs-12">
  		  		<label for="salon">Salon asignado:</label> </br>
				<select class="form-control" name="salon">
    			@foreach($salones as $salon)
      				<option value="{{ $salon }}">{{$salon}}</option>
    			@endforeach
  			  </select>
		   </div>-->

  		  <div class="form-group col-xs-12">
    		  <label for="director">Director de Grado:</label> </br>
			  <select class="form-control" name="director">
    			@foreach($directores as $director)
      				<option value="{{ $director }}">{{$director}}</option>
    			@endforeach
  			  </select>
  		  </div>

  		  <div class="form-group col-xs-12">
    		  <button type="submit" class="btn btn-primary">Guardar</button>
  		  </div>
  		</div>
  </form
  </div>
</div>
</div>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-body">
			<div class="form-group col-xs-12" > 
				<center>
					<img src="images/colegio.jpg" class="img-responsive"  style="width:500px;height:400px;" id="foto_colegio" >
				</center>
			</div>
		</div>
	</div>
</div>
</div>

@stop