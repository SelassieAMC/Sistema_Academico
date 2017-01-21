 @extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaMateria" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por profesor o materia">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="listaMaterias"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>
    </div>
	<table class="table">
        <thead>
        </thead>
            <th>Materia</th>
            <th>Intensidad Horaria</th>
            <th>Descripcion</th>
            <th>Acción</th>
        @foreach ($materias as $materia)
        <tbody>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->intensidadhor. ' horas/semana' }}</td>
            <td>{{ $materia->descripcion }}</td>
            <td>   
            <a class="btn btn-lg btn-warning glyphicon glyphicon-pencil btn-xs" href="{{ URL::to('materia' . $materia->id)}}"></a>
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('borrarMat' . $materia->id)}}"></a>
            </td>
        </tbody> 
        @endforeach
    </table>
</div>

@stop