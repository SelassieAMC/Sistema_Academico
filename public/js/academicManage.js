function cargarformulario(arg){ 
//funcion que carga todos los formularios del sistema

		if(arg==1){ var url = "form_nuevo_usuario"; }
		$("#contenido_principal").html($("#cargador_empresa").html());
		   
		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
}



function cargarlistado(listado){    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "lista_users_noModifica"; }
$("#contenido_principal").html($("#cargador_empresa").html());

    $.get(url,function(resul){ 

        $("#contenido_principal").html(resul); 
   })

}

 $(document).on("submit",".form_entrada",function(e){
//funcion para atrapar los formularios y enviar los datos
       e.preventDefault();
        
        $('html, body').animate({scrollTop: '0px'}, 200);
        
        var formu=$(this);
        var quien=$(this).attr("id");
        
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu"; }
        if(quien=="f_editar_usuario"){ var varurl="actualizar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp"; }
        if(quien=="f_editar_pub"){ var varurl="actualizar_pub"; var divresul="notificacion_resul_fep"; }

        $("#"+divresul+"").html($("#cargador_empresa").html());
              $.ajax({
                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){

                        $("#"+divresul+"").html(resul);
                        if(quien=="f_nuevo_usuario"){
                         $('#'+quien+'').trigger("reset");
                        }
                    }
                });
})


$(document).on("click",".pagination li a",function(e){
//para que la pagina se cargen los elementos
 e.preventDefault();
 var url =$( this).attr("href");
 $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul); 
 })
})


  //leccion 7 
function mostrarficha(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  var url = "form_editar_usuario/"+id_usuario+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function mostrarperfil(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
   var url = "PerfilUsuario/"+id_usuario+"";
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function borrarusu(id_usuario){    //funcion para cargar los diferentes  en general
var url = "borrarusu"+id_usuario; 
$("#contenido_principal").html($("#cargador_empresa").html());
    $.get(url,function(resul){ 
        $("#contenido_principal").html(resul); 
   })
}

function asignaClases(id_profesor) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion");
  //$("#capa_para_edicion").css('min-height', '62%');
  
  $("#capa_para_edicion").show();
  var url = "asignaClases/"+id_profesor+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function showHorProf(id_profesor) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion");
  //$("#capa_para_edicion").css('min-height', '62%');
  
  $("#capa_para_edicion").show();
  var url = "showHorProf/"+id_profesor+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}


function showandedit(id_profesor) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion");
  //$("#capa_para_edicion").css('min-height', '62%');
  
  $("#capa_para_edicion").show();
  var url = "editClasesAsign/"+id_profesor+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function eliminarClases(id_profesor) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion");
  //$("#capa_para_edicion").css('min-height', '62%');
  
  $("#capa_para_edicion").show();
  var url = "deleteClases/"+id_profesor+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}


$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#capa_para_edicion").html("");

})  


  $(document).on("submit",".formarchivo",function(e){

     
        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");

        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci"}
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"}
        if(nombreform=="f_enviar_correo" ){ var miurl="enviar_correo";  var divresul="contenido_principal"}
        if(nombreform=="form-cargaDatoEstudiante" ){ var miurl="cargarDatos";  var divresul="notificacion_cargueDatos"}
        if(nombreform=="f_enviar_correo_rector" ){ var miurl="enviar_correo_rector";  var divresul="contenido_principal"}
        
        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax   
        $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );               
            },
            //si ha ocurrido un error
            error: function(data){
               alert("Ha ocurrido un error") ;
            }
        });
});


function buscarusuario(){

  var dato=$("#dato_buscado").val();
      if(dato == ""){
      var url="buscar_usuarios/_";
    }
    else {
      var url="buscar_usuarios/"+dato+"";
    }

  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);  
  })
}

function borrarusuRector(){

  var dato=$("#dato_buscado").val();
      if(dato == ""){
      var url="borrarusuRector/_";
    }
    else {
      var url="borrarusuRector/"+dato+"";
    }

  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);  
  })
}

//Funcion para cargar archivo adjunto a mail
$(document).on("change",".email_archivo",function(e){
   
    var miurl="cargar_archivo_correo";
   // var fileup=$("#file").val();
    var divresul="texto_notificacion";
    var data = new FormData();

    data.append('file', $('#file')[0].files[0] );
   
    console.log(data);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#_token').val()
        }
    });

     $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data +'</a><span class="mailbox-attachment-size"> </span></div>';
              $("#"+divresul+"").html(codigo);          
            },
            //si ha ocurrido un error
            error: function(data){
               $("#"+divresul+"").html(data);
                
            }
        });
})


$(document).on("click",".btn-crearHorario",function(e){
  var keyHor=i=0; //variables de llave de horario e incremental de arreglo
  var curso = document.getElementById("idCurso").value; //obteniendo id del curso seleccionado
  var arrLunes= []; 
  var arrMartes= []; 
  var arrMiercoles= [];  //declaracion de arreglos donde se guardaran los datos de horarios
  var arrJueves= []; 
  var arrViernes= []; 
  var divresul="alert-success";
//captura de horarios seleccionados del dia lunes
$('.MatLunesSelect').each(function(value){
  keyHor++;
  if($(this).val()){
    arrLunes[i]=$(this).val()+' '+keyHor+' '+curso;
    i++;
  }
})
//captura de horarios seleccionados del dia martes
 var keyHor=i=0;
$('.MatMartesSelect').each(function(value){
  keyHor++;
  if($(this).val()){
    arrMartes[i]=$(this).val()+' '+keyHor+' '+curso;
    i++;
  }
})
//captura de horarios seleccionados del dia miercoles
 var keyHor=i=0;
$('.MatMiercolesSelect').each(function(value){
  keyHor++;
  if($(this).val()){
    arrMiercoles[i]=$(this).val()+' '+keyHor+' '+curso;
    i++;
  }
})
//captura de horarios seleccionados del dia jueves
 var keyHor=i=0;
$('.MatJuevesSelect').each(function(value){
  keyHor++;
  if($(this).val()){
    arrJueves[i]=$(this).val()+' '+keyHor+' '+curso;
    i++;
  }
})
//Captura de horarios seleccionado del dia viernes
 var keyHor=i=0;
$('.MatViernesSelect').each(function(value){
  keyHor++;
  if($(this).val()){
    arrViernes[i]=$(this).val()+' '+keyHor+' '+curso;
    i++;
  }
})
//Creando objeto con los horarios seleccionados por dia
var horarios= { Lunes: arrLunes, Martes: arrMartes, Miercoles: arrMiercoles, Jueves:arrJueves, Viernes:arrViernes};

var schedule = JSON.stringify(horarios);
var form = $('#form-creaHorario');
var myurl = form.attr('action');
var datas = form.serialize();
    crsfToken = document.getElementsByName("_token")[0].value;

//console.log(myurl);
        $.ajax({
            url: myurl,  
            type: 'POST', 
            data: {hor:horarios},
            datatype: 'JSON',
            headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(text){
              bootbox.dialog({
                closeButton: false,
                message: "Se ha creado el horario de manera exitosa!",
                title: "Perfecto!!",
                buttons: {
                  success: {
                    label: "Volver",
                    className: "btn-success",
                    callback: function() {
                        console.log("great success");
                        window.location.href='horariosMatxCurso';
                    }
                  }
                }
              }).find('.modal-content').css({'font-size': '18px','position': 'absolute', 'top': '-50%', 'left':'30%'});   
            },
            //si ha ocurrido un error
            error: function(data){
               console.log("Error en la creacion");
            }
        });
});


$(document).on("click",".btn-registraGrado",function(e){
   var i=0;
   var arrCursos= []; 
   var arrEstados= []; 
   var nombresAcu=[];
   var mailsAcu=[];
   var divresul="alert-success";

  $('.cursoSelect').each(function(value){
    if($(this).val()){
      //console.log($(this).val());
      arrCursos[i]=$(this).val();
      i++;
    }
  });

  var i=0;
  $('.estadoSelect').each(function(value){
    if($(this).val()){
      //console.log($(this).val());
      arrEstados[i]=$(this).val();
      i++;
    }

  });

  var i=0;
  $('.nombreAcudiente').each(function(value){
    if($(this).val()){
      nombresAcu[i]=$(this).val();
      i++;
      console.log(i+' '+$(this).val());
    }

  });

  var i=0;
  $('.emailAcudiente').each(function(value){
    if($(this).val()){
      //console.log($(this).val());
      mailsAcu[i]=$(this).val();
      i++;
    }

  });

 

  var datosEstuCurso={datosCurso: arrCursos, estado: arrEstados, acudiente: nombresAcu, mail: mailsAcu};
  var form = $('#form-asignaCursos');
  var myurl = form.attr('action');
  var datas = form.serialize();
  crsfToken = document.getElementsByName("_token")[0].value;

  $.ajax({
            url: myurl,  
            type: 'POST', 
            data: {data:datosEstuCurso},
            datatype: 'JSON',
            headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(text){
              bootbox.dialog({
                closeButton: false,
                message: "Se han actualizado los datos del estudiante!",
                title: " ",
                buttons: {
                  success: {
                    label: "Volver",
                    className: "btn-success",
                    callback: function() {
                        console.log("great success");
                        window.location.href='asignaCursoEstu';
                    }
                  }
                }
              }).find('.modal-content').css({'font-size': '18px','position': 'absolute', 'top': '-50%', 'left':'30%'});   
            },
            //si ha ocurrido un error
            error: function(data){
               console.log("Error en la creacion");
            }
        });

});


