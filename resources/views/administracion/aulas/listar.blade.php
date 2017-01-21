@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaAula" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por ubicacion o descripcion">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="listar_pubs"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>
    </div>
	<table class="table">
        <thead>
        </thead>
            <th style="width:10px">ID</th>
            <th>Ubicacion</th>
            <th>Descripcion</th>
            <th>Fecha Creacion</th>
            <th>Foto</th>
            <th>Acción</th>
        @foreach ($salones as $salon)
        <tbody>
            <td>{{ $salon->id }}</td>
            <td>{{ $salon->ubicacion}}</td>
            <td>{{ $salon->descripcion}}</td>
            <td>{{ $salon->created_at}}</td>
            <td>{{ $salon->foto}}</td>
            <td>
            <a class="btn btn-lg btn-warning glyphicon glyphicon-pencil btn-xs" href="{{ URL::to('editar_salon' . $salon->id) }}"></a>
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('borrar_salon' . $salon->id) }}"></a>
            </td>
        </tbody>
        @endforeach     
    </table>
</div>
    
@stop