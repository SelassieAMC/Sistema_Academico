@extends('layouts.estudiante')
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
            <h1 class="text-center"><strong>Notas</strong></h1>
          </div>
           <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead >
                  <th ><h5><strong class="text-primary">Estudiante</strong></h5></th>
                  <th ><h5><strong class="text-primary">Grado</strong></h5></th>
                  <th ><h5><strong class="text-primary">Año</strong></h5></th>
                </thead>
                <tbody >
                  <td >{{$Notas[0]->nombre}}</td>
                  <td >{{$Notas[0]->grado}}</td>
                  <td >{{$Notas[0]->año}}</td>
                  </td>
                </tbody>
              </table>
            <table class="table table-hover">
                <thead >
                  <th class="success"><h5><strong class="text-primary">Materia</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Profesor</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Nota 1</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">%</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Nota 2</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">%</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Nota 3</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">%</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Nota 4</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">%</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Nota 5</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">%</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Bim 1</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Bim 2</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Bim 3</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Bim 4</strong></h5></th>
                  <th class="success"><h5><strong class="text-primary">Def</strong></h5></th>
                </thead>
                <?php if($estado!="Pendiente"){ ?>
                @foreach ($Notas as $Nota)
                <tbody >
                
                    <td class="warning">{{$Nota->materia}}</td>
                    <td class="info">{{$Nota->profesor}}</td>
                    <td class="danger">{{$Nota->nota1}}</td>
                    <td class="warning">{{$Nota->porcent1}}</td>
                    <td class="info">{{$Nota->nota2}}</td>
                    <td class="danger">{{$Nota->porcent2}}</td>
                    <td class="warning">{{$Nota->nota3}}</td>
                    <td class="info">{{$Nota->porcent3}}</td>
                    <td class="danger">{{$Nota->nota4}}</td>
                    <td class="active">{{$Nota->porcent4}}</td>
                    <td class="warning">{{$Nota->nota5}}</td>
                    <td class="info">{{$Nota->porcent5}}</td>
                    <td class="danger">{{$Nota->bimestre1}}</td>
                    <td class="warning">{{$Nota->bimestre2}}</td>
                    <td class="info">{{$Nota->bimestre3}}</td>
                    <td class="danger">{{$Nota->bimestre4}}</td>
                    <td class="warning">{{$Nota->definitiva}}</td>
                    @endforeach          
                </tbody>
                <?php }else{ ?>
                @foreach ($Notas as $Nota)
                 <tbody >
                    <td class="warning">{{$Nota->materia}}</td>
                    <td class="info">{{$Nota->profesor}}</td>
                    <td class="danger"></td>
                    <td class="warning"></td>
                    <td class="info"></td>
                    <td class="danger"></td>
                    <td class="warning"></td>
                    <td class="info"></td>
                    <td class="danger"></td>
                    <td class="active"></td>
                    <td class="warning"></td>
                    <td class="info"></td>
                    <td class="danger"></td>
                    <td class="warning"></td>
                    <td class="info"></td>
                    <td class="danger"></td>
                    <td class="warning"></td>
                   @endforeach
                    </br>
                    <h3>El estado en el que se encuantra actualmente no le permite ver sus notas: <strong><?php echo($estado) ?> </strong> </h3>
                    </br>
                 </tbody>
                    <?php } ?>         
                
            </table>
          </div>
        </div>
      </div>

</div>


@stop