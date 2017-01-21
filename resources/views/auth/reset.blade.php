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
<!-- banner-boton-imagen-text -->
<div id="about" class="banner-bottom-image-text">
</br>
<!--               Seccion de login               -->

<div class="container" id="contenido">
    <div class="col-md-4 wthree_banner_bottom_left">
        <img src="images/1.jpg" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-8 wthree_banner_bottom_right"></br></br></br></br></br>
        <div class="panel panel-default">
            <center>
            <div class="panel-heading"><h6>Acceso estudiantes y profesores</h6></div>
            </center>
            <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Codigo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id" value="{{ old('id') }}" onkeypress="return valida(event)">

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('password/reset') }}">Olvidaste tu contraseña?</a>
                                </div>
                        </div>
                    </form>
                </div>
            <div class="clearfix"> </div>
        </div>
    </div>

<!--           fin    Seccion de login               -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
            
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>

@endsection
