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
                            <li><a data-hover="Galeria" href="{{ url('GaleriaShow?setFocus=true') }}">Galeria</a></li>
                            <li class="active"><a data-hover="Contacto" href="{{ url('contacto?setFocus=true') }}">Contacto</a></li>
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
<div class="banner-bottom-image-text" id="contenido">
</br>
<!--               Seccion de publicaciones               -->

<head>
    <script type="text/javascript">var centreGot = false;</script> {!!$map['js']!!}
</head>
</br>
<div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <p style='margin-left: 1em'><i><H3>Nos encontramos aqui!!</H3></i></p></br>
                	<center>
                	<form>
    					{!!$map['html']!!} <!--Mostrando Mapa de la ubicacion, traido por parametros del llamado a la forma-->
					</form>
                	</center>
				</div>
			</div>
		</div>

		<div class="col-md-5 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                 <p style='margin-left: 1em'><i><H3>Datos</H3></i></p></br></br>
                	<form>
                		<label type="Text" name="contact" style='margin-left: 1em'>
    					<font size = +1>
    					<i>Direccion: Cra 3ª Nº 48T - 02 Sur</i></p></br>
    					<i>Telefono: 7711930</i></p></br>
    					<i>Correo Electronico:	colrafa@gmail.com</i></p></br>
    					<i>Rectora: Sra Maria Myriam Novoa Agualimpia</i></p></br>
    					<i>Coordinadora Academica: Sra Nelly Patricia Criollo Castro</i></p></br></br></br>
    					</font>
					</form>
				</div>
			</div>
		</div>

</div>




<!--           fin    Seccion de publicaciones               -->


</div>








@stop
