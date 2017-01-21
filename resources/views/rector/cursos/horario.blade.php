@extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary"> 
				<div class="box-header with-border">
                   <h1 class="box-title">Horarios Grados</h1>
                </div><!-- /.box-header -->        
    			@foreach ($cursosConRelacion as $curso)
    			<table class="table">
        			<thead>
        			<center><h3>{{ $curso->name}}</h3></center>
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