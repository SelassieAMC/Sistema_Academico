@extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">         
    			<div class="box-header">
        			<h3 class="box-title">Datos Estudiantes</h3>
    			</div><!-- /.box-header -->
        			<div class="form-group col-xs-10"></br>
                  		<table class="table table-hover table-striped" style="padding: 0px 0; border: 1px solid green;">
                  			<thead>
    	              			<th>DOC</th>
    	              			<th>Nombres y apellidos</th>
                          <th>Curso</th>
                          <th>Estado</th>
                          <th>Acudiente</th>
                          <th>Email</th>
                  			</thead>
                  			@foreach($estudiantes as $estudiante)
                  				<tbody>
                          <tr>
                              <td>{{ $estudiante->id }}</td>
                              <td>{{ $estudiante->name.' '.$estudiante->last_name }}</a></td>
                              <?php $encontrado=false ?>
                              @foreach($estuMatriculados as $matriculado)
                                @if($matriculado->user_id==$estudiante->id)
                                  <td> 
                                      @foreach($cursos as $curso)
                                        @if($matriculado->grado_id==$curso->id)
                                          {{ $curso->name }}
                                        @endif
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                      @if($matriculado->estado=="Paz y salvo")
                                        Paz y salvo
                                         
                                      @elseif($matriculado->estado=="Permiso")
                                        Permiso 

                                      @elseif($matriculado->estado=="Pendiente")
                                        Pendiente

                                      @else
                                        Pendiente
                                      @endif
                                  </td>
                                  <td>{{ $matriculado->acudiente }}</td>
                                  <td>{{ $matriculado->email_acu }}</td>
                                  <?php $encontrado=true ?>
                                @endif
                              @endforeach
                              @if( $encontrado==false )
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              @endif
                            </tr>
                  				</tbody>
                  			@endforeach
                  		</table>
              </div>            
        </div>
    		</div>
    	</div>
    </div>
</div>
@stop