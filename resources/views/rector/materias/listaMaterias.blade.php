 @extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
    <div class="box-header with-border">
       <h3 class="box-title">Listado Materias Creadas</h3>
    </div><!-- /.box-header -->
	<table class="table">
        <thead>
        </thead>
            <th>Materia</th>
            <th>Intensidad Horaria</th>
            <th>Descripcion</th>
        @foreach ($materias as $materia)
        <tbody>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->intensidadhor. ' horas/semana' }}</td>
            <td>{{ $materia->descripcion }}</td>
        </tbody> 
        @endforeach
    </table>
</div>
</div>
</div>
</div>

@stop