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
                            <li ><a data-hover="Principal" id="btnmenu" href="{{ url('principal?setFocus=true') }}">Principal</a></li>
                            <li ><a data-hover="Noticias" id="btnmenu" href="{{ url('noticias?setFocus=true') }}">Noticias</a></li>
                            <li><a data-hover="Quienes Somos" id="btnmenu" href="{{ url('QuienesSomos?setFocus=true') }}" >Quienes Somos</a></li>
                            <li><a data-hover="Instalaciones" id="btnmenu" href="{{ url('instalaciones?setFocus=true')}}">Instalaciones</a></li>
                            <li><a data-hover="Galeria" id="btnmenu" href="{{ url('GaleriaShow?setFocus=true') }}">Galeria</a></li>
                            <li><a data-hover="Contacto" id="btnmenu" href="{{ url('contacto?setFocus=true') }}">Contacto</a></li>
                            
                            <!--validacion de cerrar sesion-->
                            @if (Auth::guest())
                                <li class="active"><a data-hover="Mi Cuenta" id="btnmenu" href="{{ url('login?setFocus=true') }}">Mi Cuenta</a></li>
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
                <h3>La educación trae consigo la oportunidad , y a su vez la inspiración</h3>
                <p>Formando en talentos y valores para la excelencia.</p>
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
</br>
<div class="container" id="contenido">
    <div class="col-md-4 wthree_banner_bottom_left">
        <img src="images/1.jpg" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-8 wthree_banner_bottom_right"></br></br></br></br></br>
        <div class="panel panel-default">
            <center>
            <div class="panel-heading"><h6>Resetear contraseña</h6></div>
            </center>
            <div class="panel-body"> 
                {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}
                    {{ Form::hidden('token', $token) }}   
                    {{ Form::label('email', 'Correo Electronico:') }}
                    {{ Form::email('email', $email, ['class' => 'form-control']) }}
                    {{ Form::label('password', 'Nuevo Password:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ Form::label('password_confirmation', 'Confirmar Nuevo Password:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}<br/>
                    {{ Form::submit('Actualiza Password', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="js/jquery.min2.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
@endsection


