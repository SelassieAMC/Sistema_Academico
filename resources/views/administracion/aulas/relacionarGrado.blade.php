@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">

	<div class="row">  
  		<div class="col-md-12">
        	<div class="box box-primary">
                <div class="box-header">
                	<h3 class="box-title">Asignar aulas a cursos</h3>
                </div><!-- /.box-header -->
                	<CENTER>
					{!!Form::open(['route'=>['relCursoAula'],'method'=>'POST','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}
  						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">               
						
  						<div class="form-group col-xs-3" style="margin-left:170px;"></br>
              				<label for="director"><h4>Cursos</h4></label> </br>
              				<table>
                			@foreach($cursos as $curso)
                  			<tr>
                    			<td>
                      			<div class="col-md-12">
                        			<pre><label class="checkbox"><input id="curso" type="checkbox" class="flat-red" name="cursos[]" value="{{$curso->name}}">&nbsp;&nbsp;&nbsp;{{$curso->name}}</label></pre>
                      			</div>
                    			</td>
                  			</tr>
                  			@endforeach
              				</table>
            			</div>

            			<div class="box-group col-xs-2"></br></br>
 							<button type="submit" class="btn btn-primary">Asignar salon</button>
						</div>

            			<div class="form-group col-xs-2"></br>
              				<label for="director"><h4>Salon</h4></label> </br>
              				<table>
                			@foreach($aulas as $aula)
                  			<tr>
                    			<td>
                      			<div class="col-md-12">
                        			<pre><label class="radio"><input id="aula" type="radio" class="flat-red" name="aula" value="{{$aula->ubicacion}}">&nbsp;&nbsp;&nbsp;{{$aula->ubicacion}}</label></pre>
                      			</div>
                    			</td>
                  			</tr>
                			@endforeach
                			</table>
                		</div>
					{!!Form::close()!!}
					</CENTER>
			</div><!-- end box primary -->
        </div>
    </div>
</div> 
@stop