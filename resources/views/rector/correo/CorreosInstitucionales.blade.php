@extends('layouts.rector')
@section('content')



<div class="panel panel-default">

  <div class="panel-heading">
    <h1 class="text-center"><strong>Correos Institucionales</strong></h1>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
          <th><h3><strong class="text-primary">Grado</strong></h3></th>
          <th><h3><strong class="text-primary">Nombre</strong></h3></th>
          <th><h3><strong class="text-primary">Apellido</strong></h3></th>
          <th><h3><strong class="text-primary">Correo</strong></h3></th>
          <th></th>
        </thead>

        @foreach ($directores as $director)
        <tbody>
            <td><h4 style=" font-size: 23px;">{{ $director->grado }}</h5></td>
            <td><h4 style=" font-size: 23px;">{{ $director->nombre}}</h5></td>
            <td><h4 style=" font-size: 23px;">{{ $director->apellido}}</h5></td>
            <td><h4 style=" font-size: 23px;">{{ $director->correo}}</h5></td>
            <td>
            <img src="{{$director->avatar}}"  class="img-circle" style="width:100px;height:100px;" align="right">
            </td>
        </tbody>
        @endforeach

    </table>
  </div>
</div>

</div>

@stop
