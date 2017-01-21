@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">         
    			<form action="buscaHorCurso" method="get">
            		<div class="input-group col-md-12">
              			<input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por Curso o Materia">
              			<span class="input-group-btn">
              			<button type="active" class="btn btn-primary"><a href="consultHorarios"></a>Limpiar filtro</button>
              			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              			</span>
            		</div>
    			</form>
    			@foreach ($cursosConRelacion as $curso)
    			<table class="table">
        			<thead>
        			<center><h3>{{ $curso->name}}</h3>
        			<a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('eliminarHorario' . $curso->curso_id) }}"></a></center>
        			</thead>
	        		<th>Horario</th>
			        <th>Lunes</th>
			        <th>Martes</th>
			        <th>Miercoles</th>
			        <th>Jueves</th>
			        <th>Viernes</th>
        			@foreach($horarios as $horario)
        				@if($curso->name==$horario->name)	
				        	<tbody>
						            <td>{{ $horario->horario }}</td>
						            @if($horario->lunes)
						            	<td>{{ $horario->lunes}}</td>
						           	@else
						           		<td></td>
						           	@endif

						           	@if($horario->martes)
						            	<td>{{ $horario->martes}}</td>
						           	@else
						           		<td></td>
						           	@endif

						           	@if($horario->miercoles)
						            	<td>{{ $horario->miercoles}}</td>
						           	@else
						           		<td></td>
						           	@endif

						           	@if($horario->jueves)
						            	<td>{{ $horario->jueves}}</td>
						           	@else
						           		<td></td>
						           	@endif

						           	@if($horario->viernes)
						            	<td>{{ $horario->viernes}}</td>
						           	@else
						           		<td></td>
						           	@endif
					       	</tbody>
				       	@endif
				    @endforeach 
		        </table>
		        @endforeach     
    		</div><!-- /.end box-primary -->
		</div><!-- /.end col-md-12 -->
	</div><!-- /.end row -->
</div>

@stop