@extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
   <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
                <div class="box-header with-border">
                   <h1 class="box-title">Salones Asignados</h1>
                </div><!-- /.box-header -->
    </div>
	<table class="table">
        <thead>
        </thead>
            <th>Curso</th>
            <th>Salon</th>
            <th>Ubicacion</th>
        @foreach ($asignaciones as $asignacion)
        <tbody>
            <td>{{ $asignacion->name}}</td>
            <td>{{ $asignacion->salonid}}</td>
            <td>{{ $asignacion->ubicacion}}</td>
        </tbody>
        @endforeach     
    </table>
</div>
</div>
</div>
</div>

    
@stop