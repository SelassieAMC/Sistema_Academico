@extends('layouts.admin')
@section('content')

<div style="overflow-x:auto;" id="reload">
    <div class="input-group col-md-12">

<head>
<script type="text/javascript">
              function buscarDato(){
                 var dato=$("#dato_buscado").val();
                 if(dato == ""){
                   var url="buscar_dato/";
                 }
                 else {
                   var url="buscar_dato/"+dato+"";
                 }
              $("#contenido_principal").load(url+" #reload");
             }
</script>
</head>


  <div class="input-group col-md-12">
        <input type="text" name="buscarDato" class="form-control" placeholder="Filtrar por nombre" id="dato_buscado">
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary" onclick="buscarDato();">Buscar</button>
        </span>
            </div>





    </div>
    <table class="table">
        <thead>
        </thead>
            <th style="width:10px">ID</th>
            <th>Creador</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Fecha Publicacion</th>
            <th>Acción</th>
        @foreach ($Fotos as $Foto)
        <tbody>
            <td>{{ $Foto->id }}</td>
            <td>{{ $Foto->user_id}}</td>
            <td>{{ $Foto->nombre}}</td>
            <td>{{ $Foto->pathImagen}}</td>
            <td>{{ $Foto->created_at}}</td>
            <td>
            {!!link_to_route('EliminarFoto', 'Eliminar', $Foto->id)!!}
            </td>
        </tbody>
        @endforeach

    </table>
</div>
@stop
