@extends('layouts.profesor')
@section('content')

<div style="overflow-x:auto;">
    <div class="input-group col-md-12">

    </div>
    <table class="table table-hover">
        <thead style="font-size:25px;">
          <th class="success" >Materia</th>
          <th class="success" >Grado</th>
          <th class="success" ></th>

        </thead>
        @foreach ($Materias as $Mate)
        <tbody style="font-size:20px;font-weight:500;">
            <td class="warning col-md-4">{{$Mate->materia}}</td>
            <td class="info col-md-4">{{$Mate->grado}}</td>
            <?php
            $id=Auth::user()->id;
            echo "<td class='warning col-md-1'><a  href='Tabla_nota?id=$id&mate=$Mate->materia&grad=$Mate->grado' class='btn btn-primary btn-lg btn-block' >Ver y editar</a></td>
           </tbody>";
             ?>

             

        @endforeach
    </table>



</div>


@stop
