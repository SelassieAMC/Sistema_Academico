@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaRel" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por salon o curso">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="consultaAsignaciones"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>
    </div>
	<table class="table">
        <thead>
        </thead>
            <th>Curso</th>
            <th>Salon</th>
            <th>Ubicacion</th>
            <th>Acción</th>
        @foreach ($asignaciones as $asignacion)
        <tbody>
            <td>{{ $asignacion->name}}</td>
            <td>{{ $asignacion->salonid}}</td>
            <td>{{ $asignacion->ubicacion}}</td>
            <td>
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('deleteRel/' . $asignacion->id) }}"></a>
            </td>
        </tbody>
        @endforeach     
    </table>
</div>
    
@stop