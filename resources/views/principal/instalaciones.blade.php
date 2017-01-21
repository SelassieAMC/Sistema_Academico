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
                            <li ><a data-hover="Principal" href="{{ url('principal') }}">Principal</a></li>
                            <li ><a data-hover="Noticias" href="{{ url('noticias') }}">Noticias</a></li>
                            <li ><a data-hover="Quienes Somos" href="{{ url('QuienesSomos') }}" >Quienes Somos</a></li>
                            <li class="active"><a data-hover="Instalaciones" href="{{ url('instalaciones')}}">Instalaciones</a></li>
                            <li><a data-hover="Galeria" href="{{ url('GaleriaShow') }}">Galeria</a></li>
                            <li><a data-hover="Contacto" href="{{ url('contacto') }}">Contacto</a></li>
                            <!--validacion de cerrar sesion-->
                            @if (Auth::guest())
                                <li><a data-hover="Mi Cuenta" href="{{ url('/login') }}">Mi Cuenta</a></li>
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
<div class="FondoPublicacionesI">
<div id="CenterContentI" class="CenterContentI">
          <h3 class="TituloI">Instalaciones</h3>
          <div class="Titulo2I" >Nuestro hogar</div><br />
          <p class="TextoPresentacionI">La institución busca ofrecer un ambiente en el cual los estudiantes puedan estar seguros que nada malo les puede ocurrir dentro
            de las mismas instalaciones, pero no solo se busca la protecccion si no que ademas de eso se busca un ambiente familiar en cual los estudiantes
            tengan lo necesario para desarrollarse y disfrutar de su estancia en la institucion.
           </p>
           <div class="PresentacionI"><img src="images/Patio.jpg" width='100%' height="300" /></div>

     <div id="ContentIzquierdaI" class="ContentIzquierdaI">
     </br><div class="LineaI"></div></br>
       <div class="Titulo2I" >Sede Principal</div><br />
       <div class="SedeA"><img src="images/SedeA.jpg"  width='100%' height='100%'/></div>
     </br><div class="LineaI"></div></br>
      <div class="Titulo2I" >Sede B</div><br />
      <div class="SedeB"><img src="images/SedeB.jpg"  width='100%' height='100%'/></div>
    </br><div class="LineaI"></div></br>
      <p class="Texto1I">La institución educativa cuenta con los respectivos lugares que se necesitan para poder brindar una educacion de calidad como lo son:</p>
      <div class="Titulo2I" >Biblioteca</div><br />
      <div class="Biblioteca"><img src="images/Biblioteca.jpg"  width='100%' height="300"/></div>
      <div class="Titulo2I" >Enfermeria</div><br />
      <div class="Enfermeria"><img src="images/Enfermeria.jpg"  width='100%' height="300"/></div>
     </div>

     <div id="ContentDerechaI" class="ContentDerechaI">
     </br><div class="LineaI"></div></br></br>
      <div class="Titulo3I" >Sede C</div><br />
      <div class="SedeC"><img src="images/SedeC.jpg" width='100%' height='100%' /></div>
    </br><div class="LineaI"></div></br></br>
      <div class="Titulo3I" >Sede D</div><br />
      <div class="SedeD"><img src="images/SedeD.jpg" width='100%' height='100%' /></div>
    </br><div class="LineaI"></div></br></br>
      <p class="Texto2I">La institución educativa cuenta con lugares hechos solo con un fin y es la enseñanza un claro ejemplo la Sala de sistemas:</p>
      <div class="Titulo3I" >Sala de informatica</div><br />
      <div class="Sala1I"><img src="images/Salas1.jpg"  width='100%' height="300"/></div>
      <div class="Sala2I"><img src="images/Salas2.jpg"  width='100%' height="300"/></div>
     </div>

</div>
</div>

<!--           fin    Seccion de publicaciones               -->


</div>






@stop
