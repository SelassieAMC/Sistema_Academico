 @extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">
    <form action="buscaMateriaProfesor" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por profesor o materia">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="listaProfesoresAsignados"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>
    </div>
	<table class="table">
        <thead>
        </thead>
            <th>Profesor</th>
            <th>Materia</th>
            <th>Descripcion</th>
            <th>Intensidad Horaria</th>
            <th>Acción</th>
        @foreach ($materias as $materia)
        <tbody>
        	<td>{{ $materia->name . ' ' .$materia->last_name }}</td>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->descripcion }}</td>
            <td>{{ $materia->intensidadhor. ' horas/semana' }}</td>
            <td>   
            <a class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" href="{{ URL::to('borrarRel' . $materia->id )}}"></a>
            </td>
        </tbody> 
        @endforeach    
    </table>
</div>

@stop