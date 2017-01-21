@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaCurso" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por Curso o Director">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="listaCursos"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>
    </div>

    <table class="table">
        <thead>
        </thead>
            <th style="width:10px">ID</th>
            <th>Curso</th>
            <th>Director de grado</th>
            <th>Acción</th>
        @foreach ($cursos as $curso)
        <tbody>
            <td>{{ $curso->id }}</td>
            <td>{{ $curso->grado}}</td>
            <td>{{ $curso->name.' '.$curso->last_name}}</td>
            <td>
            <a class="btn btn-lg btn-warning glyphicon glyphicon-pencil btn-xs" href="{{ URL::to('editar_curso' . $curso->id) }}"></a>
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('eliminar_curso' . $curso->id) }}"></a>
            </td>
        </tbody> 
        @endforeach     
    </table>
</div>   

@stop