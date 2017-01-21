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
                            <li class="active"><a data-hover="Quienes Somos" href="{{ url('QuienesSomos?setFocus=true') }}" >Quienes Somos</a></li>
                            <li><a data-hover="Instalaciones" href="{{ url('instalaciones?setFocus=true')}}">Instalaciones</a></li>
                            <li><a data-hover="Galeria" href="{{ url('GaleriaShow?setFocus=true') }}">Galeria</a></li>
                            <li><a data-hover="Contacto" href="{{ url('contacto?setFocus=true') }}">Contacto</a></li>
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
<div id="contenido" class="banner-bottom-image-text">
</br>
<!--               Seccion de publicaciones               -->
<div class="FondoPublicaciones">
<div id="CenterContent" class="CenterContent">
          <h3 class="Titulo">¿Quienes Somos?</h3>
     <div id="ContentIzquierda" class="ContentIzquierda">
      <div class="QuienesSomos1"><img src="images/QuienesSomos1.jpg" width='100%' height='auto' /></div>
      <div class="Titulo2" >Que buscamos</div><br />
      <p class="Texto1">La institución busca ofrecer una educación de calidad para un ser integral, holístico; por ello,
        encamina sus acciones a potencializar todas y cada una de las dimensiones del ser, a través de un proceso permanente e interactivo.
        Bajo la premisa de que cada uno de los estudiantes es un ser indivisible, algo más que la suma de sus partes, se construye un nuevo perfil
         de estudiante que contemple el conjunto de características que éste debe ir adquiriendo durante todo su proceso formativo e ir  evidenciando en su diario vivir.
       </p>
      </br><div class="Linea"></div></br>
      <div class="Mision"><img src="images/Mision.jpg"  width='100%' height='auto'/></div>
      <p class="MisionTxt">El Colegio Rafael María Carrasquilla es una institución educativa con una trayectoria de 24 años trabajando eficientemente en la formación integral de niños, niñas y jóvenes de nuestra ciudad:
      </br> </br> * Mediante la aplicación de programas, proyectos y metodologías innovadoras tendientes a desarrollar capacidades y destrezas en las diferentes disciplinas del conocimiento.
    </br></br>  * Mediante la aplicación de programas, proyectos y metodologías innovadoras tendientes a desarrollar capacidades y destrezas en las diferentes disciplinas del conocimiento.
      </br></br>  * Promoviendo activamente el fortalecimiento de sólidos valores éticos y morales para la vida y el ejercicio pleno de la democracia.
      </br></br>  * Comprometiéndose con la formación permanente de su gente y la búsqueda de talentos de cuya habilidad y experiencia puedan servirse los demás.</p>
     </div>

     <div id="ContentDerecha" class="ContentDerecha">
      <div class="Titulo3" >Introduccion</div><br />
      <p class="Texto2">Directivos, docentes, estudiantes y padres de familia hemos construido un espacio en el que
         circulan las ganas de vivir, de estudiar, de compartir y forjar valores. En este lugar se han propiciado climas
          de servicio, comunicación, tolerancia, y concertación; espacios donde se hace posible la ternura, la afectividad
           y el amor. Aquí niños, niñas  y jóvenes se animan a participar en la consecución y construcción del conocimiento,
            se forman y proyectan como líderes, se les generan hábitos permanentes de superación y se sienten llamados a convertirse en
          agentes transformadores de su propio entorno.
      </p>
      <div class="QuienesSomos2"><img src="images/QuienesSomos2.jpg" width='100%' height='auto' /></div>
      </br><div class="Linea"></div></br></br>
      <div class="Vision"><img src="images/Vision.jpg" width='100%' height='auto' /></div>
      <p class="VisionTxt">El Colegio Rafael María Carrasquilla en el año 2018, se consolidará, a nivel local, como una institución líder en la formación integral de niños, niñas y jóvenes, siendo reconocida por:
     </br> </br>  * La implementación de una propuesta educativa de calidad acorde con los requerimientos del MEN y los postulados de monseñor Rafael María Carrasquilla.
     </br></br> * La búsqueda constante de la excelencia a través de todas sus gestiones manteniendo una actitud proactiva frente a las necesidades de la Comunidad Educativa
     </br></br> * Los óptimos resultados académicos de sus educandos en las diferentes pruebas de desempeño a nivel local, regional y nacional.</p>
     </div>

</div>
</div>

<!--           fin    Seccion de publicaciones               -->


</div>






@stop
