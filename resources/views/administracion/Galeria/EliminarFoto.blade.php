@extends('layouts.admin')
@section('content')





{!!Form::open(['route'=>['EliminarDestroy',$id],'method'=>'delete','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}

       <div class="MensajeDeEliminacion">
         <div class="form-group col-xs-12">
           <h2>FOTO ELIMINADA</h2>
         </div>
         {!!Form::submit('Aceptar',['class' => 'btn btn-danger']) !!}
         {!!Form::close()!!}
      </div>

@stop
