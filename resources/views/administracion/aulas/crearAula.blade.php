@extends('layouts.admin')
@section('content')
<div style="overflow-x:auto;">
<div class="row">
<div class="col-md-6">
	<div class="box box-primary">         
    <div class="box-header">
        <h3 class="box-title">Aulas de clase</h3>
    </div><!-- /.box-header -->

	  <form method="POST" action="crearAula" accept-charset="UTF-8" enctype="multipart/form-data">
  		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  		<div class="box-body">  
  		  <div class="form-group col-xs-12">
    		  <label for="Numero">Numero</label>
    		  <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero de salon" required></br>
  		  </div>

  		  <div class="form-group col-xs-12">
    		  <label for="Ubicacion">Ubicacion</label>
    		  <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Torre y piso de salon" required></br>
  		  </div>

  		  <div class="form-group col-xs-12">
    		  <label for="Descripcion">Descripcion</label>
    		  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Asignacion principal del salon (sistemas, arte, grado, etc.)"></br>
  		  </div>

    	 <div class="form-group col-xs-12">
      		<label>Agregar Imagen </label>
        	<input name="imagen" id="imagen" type="file"   class="fa fa-paperclip" ></br>
    	 </div>

  		  <div class="form-group col-xs-12">
    		  <button type="submit" class="btn btn-primary">Guardar</button>
  		  </div>
  		</div>
  </form
  </div>
</div>
</div>
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-body">
			<div class="form-group col-xs-12" > 
				<center>
					<img src="images/colegio.jpg"  class="img-responsive" style="width:500px;height:400px;" id="foto_colegio" >
				</center>
			</div>
		</div>
	</div>
</div>
</div>


@stop