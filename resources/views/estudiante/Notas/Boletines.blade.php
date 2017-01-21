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
            <h1 class="text-center"><strong>Boletin</strong></h1>
          </div>
           <div class="panel-body">
            <div class="table-responsive ">
              <table class="table table-hover " align="center">
                <thead >
                  <th ><h5><strong class="text-primary">Estudiante</strong></h5></th>
                  <th ><h5><strong class="text-primary">Grado</strong></h5></th>
                  
                </thead>
                <tbody >
                  <td >{{$nombre}}</td>
                  <td >{{$grado}}</td>
                  </td>
                </tbody>
              </table>
            
                <?php if($estado!="Pendiente"){ ?>
                </br></br>

                   

                   <button type="button"  class="btn btn-success center-block text-danger"><a href='{{$RutaAcceso}}' class="bolet" target="_blank">Abrir Boletin</a></button>
                   
                   </br></br>
                <?php }else{ ?>
                </br>
                    <h3>El estado en el que se encuantra actualmente no le permite ver su Boletin: <strong><?php echo($estado) ?> </strong> </h3>
                    </br>
                 </tbody>
                    <?php } ?>         
                
            </table>
          </div>
        </div>
      </div>

</div>


@stop