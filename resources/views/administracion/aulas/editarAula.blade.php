@extends('layouts.admin')
@section('content')
@include('alertas.solicitudes')
<div style="overflow-x:auto;">
	<div class="row">  
  		<div class="col-md-6">
        	<div class="box box-primary">
                <div class="box-header">
                	<h3 class="box-title">Editar Aulas de Clase</h3>
                </div><!-- /.box-header -->
 
						{!!Form::open(['route'=>['actualizar_salon',$salon],'method'=>'PUT','accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data'] )!!}  
  						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
  						<input type="hidden" name="id" value="<?= $salon->id; ?>">              
						
						<div class="box-body"> 
						<div class="form-group col-xs-12">
      						<label for="ubicacion">Ubicacion</label>
      						<input type="text" class="form-control" id="ubicacion" name="ubicacion"  value="<?= $salon->ubicacion; ?>"  >
						</div>

						<div class="form-group col-xs-12">
      						<label for="descripcion">Descripcion</label>
      						<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $salon->descripcion; ?>" >
						</div>

						<div class="box-footer col-xs-12">
 							<button type="submit" class="btn btn-primary">Actualizar Datos</button>
						</div>
						</div>
			</div><!-- end box primary -->
		</div> <!-- end col-md-6 -->

		<div class="col-md-6">
      		<div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cambiar Fotografia</h3>
                </div><!-- /.box-header -->               

      			<div class="box-body">
        			<div class="form-group col-xs-12" >
          				<center>
          					<?php $foto=$salon->foto; if($foto==""){ $foto="images/avatar.jpg"; }  ?>
          					<img src="<?=  $salon->foto;  ?>"  alt="Aula Image"  style="width:240px;height:240px;" id="fotografia_aula" >
          				</center><!-- Aula foto -->
       				</div>

      				<div class="form-group col-xs-12">
             			<label>Cambiar foto </label>
              			<input name="foto" id="foto" type="file"   class="fa fa-paperclip"  required/><br /><br />
      				</div>
      			</div>
      			</form>
      		</div>
      		{!!Form::close()!!}
  		</div>    <!-- end col mod 6 -->
</div><!-- end row -->
</div>
	
@stop