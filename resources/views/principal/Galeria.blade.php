@extends('layouts.app')
@section('content')



<!--Video, navegacion, menu y publicaciones principales-->
<div data-vide-bg="video/srix">
    <div class="center-container">
        <div class="navigation">
            <div class="container">


                <!--Menu-->

                <div class="navigation-right">
                    <span class="menu"><img src="images/menu.png" alt=" " /></span>
                    <nav class="link-effect-3" id="link-effect-3">
                        <ul class="nav1 nav nav-wil">
                          <li ><a data-hover="Principal" href="{{ url('principal?setFocus=true') }}">Principal</a></li>
                          <li ><a data-hover="Noticias" href="{{ url('noticias?setFocus=true') }}">Noticias</a></li>
                          <li><a data-hover="Quienes Somos" href="{{ url('QuienesSomos?setFocus=true') }}" >Quienes Somos</a></li>
                          <li><a data-hover="Instalaciones" href="{{ url('instalaciones?setFocus=true')}}">Instalaciones</a></li>
                          <li class="active"><a data-hover="Galeria" href="{{ url('GaleriaShow?setFocus=true') }}">Galeria</a></li>
                          <li ><a data-hover="Contacto" href="{{ url('contacto?setFocus=true') }}">Contacto</a></li>
                            <!--validacion de cerrar sesion-->
                            @if (Auth::guest())
                                <li><a data-hover="Mi Cuenta" href="{{ url('login?setFocus=true') }}">Mi Cuenta</a></li>
                            @else
                                <li class="dropdown">
                                    <a data-hover="{{ Auth::user()->name }} {{ Auth::user()->last_name }}" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                                    </a>
                                  <ul class="dropdown-menu">
                                      <div class="col-xs-4 text-center">
                                            <a href="home">Panel</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                              <a href="logout">Salir</a>
                                        </div>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </nav>
                        <!-- script-para-menu -->
                            <script>
                               $( "span.menu" ).click(function() {
                                 $( "ul.nav1" ).slideToggle( 300, function() {
                                 // Animation complete.
                                  });
                                 });
                            </script>
                        <!-- /script-para-menu -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="w3ls_banner_info">
            <div class="container">
                <div class="w3l_banner_logo">
                    <img src="images/Escudo_red.png" alt=" " class="img-responsive" />
                </div>
                <h3>Formando en talentos y valores para la excelencia</h3>
                <p>La educación trae consigo la oportunidad , y a su vez la inspiración.</p>
                <div class="more">
                    <a href="#" class="hvr-underline-from-center" data-toggle="modal" data-target="#myModal">Filosofia</a>
                </div>
                <!--modal-video-->
                <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <!--Boton Filosofia-->
                            <div class="modal-header">
                                Filosofia
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <section>
                            <!--Filosofia-->
                                <div class="modal-body">
                                    <img src="images/17.jpg" alt=" " class="img-responsive" />
                                    <p>"El Colegio Rafael María Carrasquilla está comprometido con la formación íntegral de los niños, niñas y jovenen que están a su cargo desarrollando a nivel conceptual , las habilidades comunicativas y el razonamiento lógico; a nivel procedimental, el anlisis y la criticidad y como valores fundamentales el amar, respetar y valorar la vida; del mismo modo, se les forma en el respeto por los valores fundamentales de la dignidad humana, los derechos humanos, la aceptación, la tolerancia hacia las diferencias y la construcción a través de todas sus actitudes del valor de la responsabilidad”.
                                        <i>"Formando en talentos y valores para la excelencia".</i></p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-boton-imagen-text -->
<div id="about" class="banner-bottom-image-text">
</br>
<!--               Seccion de publicaciones               -->
<head>
    <script type="text/javascript">
        function cambia(val){
          var nodos = document.getElementById(val);
          var atributo = nodos.attributes.getNamedItem("src").nodeValue;
          var ElementoRecibido = document.getElementById("Mostrada");
          ElementoRecibido.setAttribute("src",atributo);
        }
    </script>
</head>
<div class="panel-body" id="contenido">
<div class="Galeria">
      <h2 class="TituloGal">Galeria Carrasquilla</h2>
   <div class="table-responsive" style="overflow-x:scroll;width:80%;position:relative;left:10%;background-color:blue;border-style:solid;border: 5px, 5px, 5px, 5px;border-color: black;">
     <?php $cont=0; ?>

         <table class="table">

          @foreach ($Fotos as $Foto)
            <td class="hoverrr">
            <img width="140px" height="140px"  id='<?php echo $cont;?>' src="{{ url($Foto->pathImagen) }}"  alt="" onmouseover="cambia('<?php echo $cont;?>')" />
           </td>
           <?php $cont++;?>
          @endforeach

        </table>
   </div>
   </br></br></br>
   <div class="ImagenMostrada">
      <img src="{{ url($Foto->pathImagen) }}" alt="" width='100%' id="Mostrada"/>
   </div>
   </br></br></br>
</div>
</div>
<!--           fin    Seccion de publicaciones               -->


</div>






@stop
