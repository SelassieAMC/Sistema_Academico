@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">         
    			<div class="box-header">
        			<h3 class="box-title">Profesores con materias asignadas</h3>
    			</div><!-- /.box-header -->
    			<div class="form-group col-xs-10"></br>
              		<table class="table table-hover table-striped" style="padding: 0px 0; border: 1px solid green;">
              			<thead>
	              			<th>CC</th>
	              			<th>Nombre</th>
	              			<th>Apellidos</th>
                      <th>Accion</th>
              			</thead>
              			@foreach($profesores as $profesor)
              				<tbody>
              					<tr>
	              					<td>{{ $profesor->doc }}</td>
	              					 <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="asignaClases(<?= $profesor->doc; ?>);"  style="display:block"><i class="fa fa-male"></i>&nbsp;&nbsp;{{ $profesor->name }}</a></td>
	              					<td>{{ $profesor->last_name }}</td>
                          <td><button class="btn btn-primary btn-xs" onclick="asignaClases(<?= $profesor->doc; ?>);" >Asignar Clases</button>&nbsp;<button class="btn btn-warning btn-xs" onclick="showandedit(<?= $profesor->doc; ?>);" >Ver y Editar</td>
              					</tr>
              				</tbody>
              			@endforeach
              		</table>
              	</div>
    		</div>
    	</div>
    </div>
</div>
@stop