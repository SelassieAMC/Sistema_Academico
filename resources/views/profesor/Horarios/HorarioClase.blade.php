@extends('layouts.profesor')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">

    </div>
    <table class="table table-hover">
        <thead>
          <th class="success">Hora</th>
          <th class="success">Lunes</th>
          <th class="success">Martes</th>
          <th class="success">Miercoles</th>
          <th class="success">Jueves</th>
          <th class="success">Viernes</th>
          <th class="success">Grado</th>
        </thead>
        @foreach ($horarios as $horario)
        <tbody>
            <td class="warning">{{$horario->horario}}</td>
            <td class="info">{{$horario->lunes}}</td>
            <td class="danger">{{$horario->martes}}</td>
            <td class="info">{{$horario->miercoles}}</td>
            <td class="danger">{{$horario->jueves}}</td>
            <td class="info">{{$horario->viernes}}</td>
            <td class="warning">{{$horario->grado}}</td>
        </tbody>
        @endforeach
    </table>
</div>


@stop
