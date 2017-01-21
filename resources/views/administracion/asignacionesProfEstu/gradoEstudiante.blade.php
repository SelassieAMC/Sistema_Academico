@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">         
    			<div class="box-header">
        			<h3 class="box-title">Asignacion de cursos a Estudiantes</h3>
    			</div><!-- /.box-header -->
          <form action="buscaEstudiante" method="get">
            <div class="input-group col-md-12">
              <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por numero de documento o nombre">
              <span class="input-group-btn">
              <button type="active" class="btn btn-primary"><a href="asignaCursoEstu"></a>Limpiar filtro</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
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
                                    <select name="curso" class="cursoSelect"> 
                                       <option value="">- selecciona -</option>
                                      @foreach($cursos as $curso)
                                        @if($matriculado->grado_id==$curso->id)
                                          <option value="{{ $curso->id.' '.$estudiante->id }}" selected>{{ $curso->name }}</option>
                                        @endif
                                          <option value="{{ $curso->id.' '.$estudiante->id }}">{{ $curso->name }}</option>
                                        
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="estado" class="estadoSelect">
                                      @if($matriculado->estado=="Paz y salvo")
                                        <option value="{{ $estudiante->id}} Paz y salvo" selected>Paz y salvo</option>
                                        <option value="{{ $estudiante->id}} Permiso">Permiso</option>
                                        <option value="{{ $estudiante->id}} Pendiente" >Pendiente</option>
                                         
                                      @elseif($matriculado->estado=="Permiso")
                                        <option value="{{ $estudiante->id}} Permiso" selected>Permiso</option> 
                                        <option value="{{ $estudiante->id}} Pendiente" >Pendiente</option> 
                                        <option value="{{ $estudiante->id}} Paz y salvo">Paz y salvo</option>   

                                      @elseif($matriculado->estado=="Pendiente")
                                        <option value="{{ $estudiante->id}} Pendiente" selected >Pendiente</option>
                                        <option value="{{ $estudiante->id}} Paz y salvo">Paz y salvo</option>
                                        <option value="{{ $estudiante->id}} Permiso">Permiso</option>

                                      @else
                                        <option value="{{ $estudiante->id}} Paz y salvo">Paz y salvo</option>
                                        <option value="{{ $estudiante->id}} Permiso">Permiso</option>
                                        <option value="{{ $estudiante->id}} Pendiente" selected >Pendiente</option>
                                      @endif

                                    </select>
                                  </td>
                                  <td><input type="text" name= "nombreAcuediente" value="{{ $matriculado->acudiente }}" class="nombreAcudiente"></td>
                                  <td><input type="text" name="emailAcudiente" value="{{ $matriculado->email_acu }}" class="emailAcudiente"></td>
                                  <?php $encontrado=true ?>
                                @endif
                              @endforeach
                              @if( $encontrado==false )
                              <td>
                                    <select name="curso" class="cursoSelect"> 
                                       <option value="" selected="selected">- selecciona -</option>
                                      @foreach($cursos as $curso)
                                        <option value="{{ $curso->id.' '.$estudiante->id }}">{{ $curso->name }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select name="estado" class="estadoSelect"> 
                                        <option value="{{ $estudiante->id}} Paz y salvo">Paz y salvo</option>
                                        <option value="{{ $estudiante->id}} Permiso">Permiso</option>
                                        <option value="{{ $estudiante->id}} Pendiente" selected >Pendiente</option>
                                    </select>
                                  </td>
                                  <td><input type="text" name= "nombreAcuediente" value=" " class="nombreAcudiente"></td>
                                  <td><input type="text" name="emailAcudiente" value=" " class="emailAcudiente"></td>
                              @endif
                            </tr>
                  				</tbody>
                  			@endforeach
                  		</table>
              </div> 
              <div id="column-right" class="form-group col-xs-2"></br></br>
                  <button href="" class="btn-registraGrado btn btn-success">Actualizar Datos</button></center>
              </div>
        {!! Form::open(['route' => ['saveCurso'], 'method' => 'POST', 'id' =>'form-asignaCursos']) !!}   
        {!! Form::close() !!}            
        </div>
    		</div>
    	</div>
    </div>
</div>
@stop