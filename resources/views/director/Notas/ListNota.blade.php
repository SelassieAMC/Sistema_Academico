@extends('layouts.director')
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
      {!!Form::open(['method'=>'PUT','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}

        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="text-center"><strong>Notas</strong></h1>
          </div>
           <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead >
                  <th ><h5><strong class="text-primary">% 1</strong></h5></th>
                  <th ><h5><strong class="text-primary">% 2</strong></h5></th>
                  <th ><h5><strong class="text-primary">% 3</strong></h5></th>
                  <th ><h5><strong class="text-primary">% 4</strong></h5></th>
                  <th ><h5><strong class="text-primary">% 5</strong></h5></th>
                  <th ><h5><strong class="text-primary">ACTION</strong></h5></th>
                </thead>
                <tbody >
                  <td ><input  size="3px" type="text" name="Porce1" value="{{$Notas[0]->porcent1}}"></td>
                  <td ><input  size="3px" type="text" name="Porce2" value="{{$Notas[0]->porcent2}}"></td>
                  <td ><input  size="3px" type="text" name="Porce3" value="{{$Notas[0]->porcent3}}"></td>
                  <td ><input  size="3px" type="text" name="Porce4" value="{{$Notas[0]->porcent4}}"></td>
                  <td ><input  size="3px" type="text" name="Porce5" value="{{$Notas[0]->porcent5}}"></td>
                  <td ><input onclick=this.form.action='ActualizarPorceD' type='submit' class='btn btn-primary' value='Actualizar %'/></td>
                </tbody>
              </table>
            <table class="table table-hover">
                <thead >
                  <th ><h5><strong class="text-primary">Nombre</strong></h5></th>
                  <th ><h5><strong class="text-primary">Apellido</strong></h5></th>
                  <th><h5><strong class="text-primary">Nota 1</strong></h5></th>
                  <th><h5><strong class="text-primary">%</strong></h5></th>
                  <th><h5><strong class="text-primary">Nota 2</strong></h5></th>
                  <th><h5><strong class="text-primary">%</strong></h5></th>
                  <th><h5><strong class="text-primary">Nota 3</strong></h5></th>
                  <th><h5><strong class="text-primary">%</strong></h5></th>
                  <th><h5><strong class="text-primary">Nota 4</strong></h5></th>
                  <th><h5><strong class="text-primary">%</strong></h5></th>
                  <th><h5><strong class="text-primary">Nota 5</strong></h5></th>
                  <th><h5><strong class="text-primary">%</strong></h5></th>
                  <th><h5><strong class="text-primary">Bim 1</strong></h5></th>
                  <th><h5><strong class="text-primary">Bim 2</strong></h5></th>
                  <th><h5><strong class="text-primary">Bim 3</strong></h5></th>
                  <th><h5><strong class="text-primary">Bim 4</strong></h5></th>
                  <th><h5><strong class="text-primary">Def</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                  <th><h5><strong class="text-primary">ACTION</strong></h5></th>
                </thead>
                 <?php $num=0; ?>
                @foreach ($Notas as $Nota)
                <?php $num=$num+1; ?>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="idd[]" value="<?= $Nota->id; ?>">
                <input type="hidden" name="nom[]" value="<?= $Nota->nombre; ?>">
                <input type="hidden" name="ape[]" value="<?= $Nota->apellido; ?>">
                <input type="hidden" name="Bim1[]" value="<?= $Nota->bimestre1; ?>">
                <input type="hidden" name="Bim2[]" value="<?= $Nota->bimestre2; ?>">
                <input type="hidden" name="Bim3[]" value="<?= $Nota->bimestre3; ?>">
                <input type="hidden" name="Bim4[]" value="<?= $Nota->bimestre4; ?>">
                <input type="hidden" name="idpro[]" value="<?= $id; ?>">
                <input type="hidden" name="mate[]" value="<?= $mate; ?>">
                <input type="hidden" name="grade[]" value="<?= $grad; ?>">
                <input type="hidden" name="Porc1[]" value="<?= $Nota->porcent1; ?>">
                <input type="hidden" name="Porc2[]" value="<?= $Nota->porcent2; ?>">
                <input type="hidden" name="Porc3[]" value="<?= $Nota->porcent3; ?>">
                <input type="hidden" name="Porc4[]" value="<?= $Nota->porcent4; ?>">
                <input type="hidden" name="Porc5[]" value="<?= $Nota->porcent5; ?>">
                <tbody >
                    <td >{{$Nota->nombre}}</td>
                    <td id="apellidoo" name="apellidoo">{{$Nota->apellido}}</td>
                    <td ><input  size="3px" type="text" name="Not1[]" value="{{$Nota->nota1}}"></td>
                    <td >{{$Nota->porcent1}}</td>
                    <td ><input  size="3px" type="text" name="Not2[]" value="{{$Nota->nota2}}"/></td>
                    <td >{{$Nota->porcent2}}</td>
                    <td ><input  size="3px" type="text" name="Not3[]" value="{{$Nota->nota3}}"/></td>
                    <td >{{$Nota->porcent3}}</td>
                    <td ><input size="3px" type="text" name="Not4[]" value="{{$Nota->nota4}}"/></td>
                    <td >{{$Nota->porcent4}}</td>
                    <td ><input size="3px" type="text" name="Not5[]" value="{{$Nota->nota5}}"/></td>
                    <td >{{$Nota->porcent5}}</td>
                    <td >{{$Nota->bimestre1}}</td>
                    <td >{{$Nota->bimestre2}}</td>
                    <td >{{$Nota->bimestre3}}</td>
                    <td >{{$Nota->bimestre4}}</td>
                    <td >{{$Nota->definitiva}}</td>
                     <td ><input onclick=this.form.action='ActualizarNotaD?num=<?= $num; ?>' type='submit' name="" class='btn btn-primary' value='Actualizar'/></td>

                    <td ><input onclick=this.form.action="Bimestre1D?num=<?= $num; ?>" type="submit" class="btn btn-primary" value="Bim1"/></td>
                    <td ><input onclick=this.form.action="Bimestre2D?num=<?= $num; ?>" type="submit" class="btn btn-primary" value="Bim2"/></td>
                    <td ><input onclick=this.form.action="Bimestre3D?num=<?= $num; ?>" type="submit" class="btn btn-primary" value="Bim3"/></td>
                    <td ><input onclick=this.form.action="Bimestre4D?num=<?= $num; ?>" type="submit" class="btn btn-primary" value="Bim4"/></td>
                    <td ><input onclick=this.form.action="DefinitivaD?num=<?= $num; ?>" type="submit" class="btn btn-primary" value="Def"/></td>
                </tbody>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    {!!Form::close()!!}
</div>
  <!-- end col mod 6 -->
 <!-- end row -->



@stop
