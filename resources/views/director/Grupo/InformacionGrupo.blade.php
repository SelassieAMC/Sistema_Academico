@extends('layouts.director')
@section('content')

    <div class="box box-primary">
                  @if (Session::has('message'))
                  <div id="notificacion_resul_fcp">
                   <div class="alert alert-success">{{ Session::get('message') }}</div>
                  </div>
                  @endif
                  @if (Session::has('Alertmessage'))
                  <div id="notificacion_resul_fcp">
                   <div class="alert alert-danger">{{ Session::get('Alertmessage') }}</div>
                  </div>
                  @endif
                <!-- form start -->
      <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="text-center"><strong>Informacion de grupo</strong></h1>
          </div>
           <div class="panel-body">
            <div class="table-responsive ">
              <table class="table table-hover " align="center">
                <thead >
                  <th ><h5><strong class="text-primary">Director</strong></h5></th>
                  <th ><h5><strong class="text-primary">Grado</strong></h5></th>
                  
                </thead>
                <tbody >
                  <td >{{$nombre}}</td>
                  <td >{{$grado}}</td>
                  </td>
                </tbody>
              </table>
            </br></br></br>
            <h2 style="text-align: center">Horario de: {{ $grado }}</h2>
            </br>
              <table class="table table-hover">
        <thead>
          <th class="success">Hora</th>
          <th class="success">Lunes</th>
          <th class="success">Martes</th>
          <th class="success">Miercoles</th>
          <th class="success">Jueves</th>
          <th class="success">Viernes</th>
        </thead>
        @foreach ($horarios as $horario)
        <tbody>
            <td class="warning">{{$horario->horario}}</td>
            <td class="info">{{$horario->lunes}}</td>
            <td class="danger">{{$horario->martes}}</td>
            <td class="info">{{$horario->miercoles}}</td>
            <td class="danger">{{$horario->jueves}}</td>
            <td class="info">{{$horario->viernes}}</td>
        </tbody>
        @endforeach
    </table>
    </br></br></br>
    <h2 style="text-align: center">Estudiantes de: {{ $grado }}</h2>
    </br>
        <table class="table table-hover">
        <thead>
          <th class="success">Nombre</th>
          <th class="success">Apellido</th>
          <th class="success">Correo</th>
          <th class="success">Acudiente</th>
          <th class="success">Grado</th>
        </thead>
        @foreach ($Estudiantes as $Estudiante)
        <tbody>
            <td class="active">{{$Estudiante->nombre}}</td>
            <td class="active">{{$Estudiante->apellido}}</td>
            <td class="active">{{$Estudiante->correo}}</td>
            <td class="active">{{$Estudiante->acudiente}}</td>
            <td class="active">{{$Estudiante->grado}}</td>
        </tbody>
        @endforeach
    </table>

                
            </br></br></br>    
          </div>
        </div>
      </div>

</div>


@stop
