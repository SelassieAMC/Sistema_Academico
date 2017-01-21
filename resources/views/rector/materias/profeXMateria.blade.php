 @extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
    <div class="box-header with-border">
       <h3 class="box-title">Relacion profesores y materias asignadas</h3>
    </div><!-- /.box-header -->
	<table class="table">
        <thead>
        </thead>
            <th>Profesor</th>
            <th>Materia</th>
            <th>Descripcion</th>
            <th>Intensidad Horaria</th>
        @foreach ($materias as $materia)
        <tbody>
        	<td>{{ $materia->name . ' ' .$materia->last_name }}</td>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->descripcion }}</td>
            <td>{{ $materia->intensidadhor. ' horas/semana' }}</td>
        </tbody> 
        @endforeach    
    </table>
</div>
</div>
</div>
</div>


@stop