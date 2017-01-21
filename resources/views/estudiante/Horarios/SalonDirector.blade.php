@extends('layouts.estudiante')
@section('content')


<div class="panel panel-default">
@foreach ($datos as $dato)
  <div class="panel-heading">
    <h1 class="text-center" font-size="900px"> {{$dato->grado}}</h1>
  </div>

  <div class="panel-body">
    <img src="<?=  $dato->foto;  ?>"  class="img-thumbnail" style="width:300px;height:300px;" align="right">
    <h3 class=""><strong class="text-primary">Director de grupo: </strong>{{$dato->nombre}} {{$dato->apellido}}</h3>
    <h3 class=""><strong class="text-primary">Salon: </strong>{{$dato->salon}}</h3>
    <h3 class=""><strong class="text-primary">Ubicacion: </strong>{{$dato->ubicacion}}</h3>
    <h3 class=""><strong class="text-primary">Descripcion: </strong>{{$dato->descripcion}}</h3>


  </div>

</div>
@endforeach
@stop
