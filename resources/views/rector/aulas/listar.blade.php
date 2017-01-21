@extends('layouts.rector')
@section('content')

<div style="overflow-x:auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
                <div class="box-header with-border">
                   <h1 class="box-title">Lista salones</h1>
                </div><!-- /.box-header -->  
	<table class="table">
        <thead>
        </thead>
            <th style="width:10px">Codigo</th>
            <th>Ubicacion</th>
            <th>Descripcion</th>
            <th>Fecha Creacion</th>
            <th>Foto</th>
        @foreach ($salones as $salon)
        <tbody>
            <td>{{ $salon->id }}</td>
            <td>{{ $salon->ubicacion}}</td>
            <td>{{ $salon->descripcion}}</td>
            <td>{{ $salon->created_at}}</td>
            <td>{{ $salon->foto}}</td>
        </tbody>
        @endforeach     
    </table>
</div>
</div>
</div>
</div>
    
@stop