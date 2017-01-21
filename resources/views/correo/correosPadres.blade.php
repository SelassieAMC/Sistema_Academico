@extends('layouts.admin')
@section('content')

        <div class="panel panel-default">
            <center>
            <div class="panel-heading"><h6></h6></div>
            </center>
            <div class="panel-body">    
                <div class="col-md-12 col-md-offset-0">            
                    <div class="panel panel-default">
                    <div class="panel-heading"><center><h2><strong>Correos Acudientes y Alumnos</strong></h2></center></div>
                        <div class="panel-body">         
                            {!! Form::open(['url' => ('listarCorreosGrado'), 'method' => "POST"]) !!}
                            	<center><label>Selecciona el curso que desea visualizar datos</label><br/>
                                  <select id="cursos" name="cursos" class="listados">  
			                      <option value="" selected="selected">- selecciona -</option>
			                        @foreach($listaCursos as $curso)
			                          <option name="curso" id="curso" value="{{ $curso->id }}">{{ $curso->name }}</option>
			                        @endforeach
			                     </select></center>

			                     <div id="listaCorreos"></div>
                            {{ Form::close() }}           
                        </div>
                    </div> 
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table id="acudienteTabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="50%">
                                <thead>
                                    <th><h4><font color = "501313">Documento</font></h4></th>
                                    <th><h4><font color = "501313">Nombre Estudiante</font></h4></th>
                                    <th><h4><font color = "501313">Correo Estudiante</font></h4></th>
                                    <th><h4><font color = "501313">Estado</font></h4></th>
                                    <th><h4><font color = "501313">Nombre Acudiente</font></h4></th>
                                    <th><h4><font color = "501313">Correo Acudiente</font></h4></th>
                                </thead>
                                <tbody id="cuerpo">
                                </tbody>
                            </table>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">
	$('.listados').change(function(){
		var curso=document.getElementById("cursos").value;
        if(curso!=""){
            var divresul="alert-success";
            crsfToken = document.getElementsByName("_token")[0].value;
            var myurl='listarCorreosGrado';

            $.ajax({
                url: myurl,  
                type: 'GET', 
                data: {id:curso},
                datatype: 'data',
                headers: {
                        "X-CSRF-TOKEN": crsfToken
                    },
                beforeSend: function(){
                  $("#"+divresul+"").html($("#cargador_empresa").html());                
                },
                //una vez finalizado correctamente
                success: function(data){
                     //alert(data);
                     
                     dibujarTabla(data);
                },
                //si ha ocurrido un error
                error: function(data){
                   alert('Ha ocurrido un error');
                }
            });

            function dibujarTabla(data) {
            //$("#acudienteTabla").remove();
            $("#cuerpo").children().remove()  
            for (var i = 0; i < data.length; i++) {
                    dibujarRegistro(data[i]);
                }
            }

            function dibujarRegistro(rowData) {
                var row = $("<tr />")
                $("#acudienteTabla").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it
                row.append($("<td>" + rowData.user_id + "</td>"));
                row.append($("<td>" + rowData.name + rowData.last_name + "</td>"));
                row.append($("<td>" + rowData.email + "</td>"));
                row.append($("<td>" + rowData.estado + "</td>"));
                row.append($("<td>" + rowData.acudiente + "</td>"));
                row.append($("<td>" + rowData.email_acu + "</td>"));
            }
        }
	}); 
		
	
</script>

@endsection