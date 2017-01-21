@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaPub" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por titulo o descripcion">
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
            <th>Creador</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>PDF</th>
            <th>Descripcion</th>
            <th>Seccion</th>
            <th>Fecha Publicacion</th> 
            <th>Acción</th>
        @foreach ($publicaciones as $publicacion)
        <tbody>
            <td>{{ $publicacion->user_id}}</td>
            <td>{{ $publicacion->titulo}}</td>
            <td>{{ $publicacion->pathImagen}}</td>
            <td>{{ $publicacion->pathPDF}}</td>
            <td>{{ $publicacion->descripcion}}</td>
            <td>{{ $publicacion->seccion}}</td>
            <td>{{ $publicacion->created_at}}</td>
            <td>
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('eliminar_pub' . $publicacion->id) }}"></a>
            <a class="btn btn-lg btn-warning glyphicon glyphicon-pencil btn-xs" href="{{ URL::to('editar_pub' . $publicacion->id) }}"></a>
            </td>
        </tbody>
        @endforeach     
    </table>
</div>
@stop