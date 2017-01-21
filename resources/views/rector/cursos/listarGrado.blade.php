@extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
                <div class="box-header with-border">
                   <h3 class="box-title">Listado Grados</h3>
                </div><!-- /.box-header -->
                    <table class="table">
                        <thead>
                        </thead>
                            <th style="width:10px">ID</th>
                            <th>Curso</th>
                            <th>Director de grado</th>
                        @foreach ($cursos as $curso)
                        <tbody>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->grado}}</td>
                            <td>{{ $curso->name.' '.$curso->last_name}}</td>

                        </tbody> 
                        @endforeach     
                    </table>
            </div> 
        </div>
    </div>
</div>  

@stop