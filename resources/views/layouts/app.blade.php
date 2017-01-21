<!DOCTYPE html>
<html>
<head>
<title>Bienvenido Colegio Rafael Maria Carrasquilla| Portal </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

{!! Html::style("css/bootstrap.css") !!}
<!-- Custom Theme files -->
{!! Html::style("css/style2.css") !!}
{!! Html::style("css/jquery-ui.css") !!}
{!! Html::style("css/smoothbox.css") !!}
{!! Html::style('css/StiloPublicaciones.css') !!}
{!! Html::style('css/StiloGaleria.css') !!}
{!! Html::style('css/StiloQuienesSomos.css') !!}
{!! Html::style('css/StiloInstalaciones.css') !!}
{!! Html::style('//fonts.googleapis.com/css?family=Gloria+Hallelujah') !!}
{!! Html::style('//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic') !!}

<script type="text/javascript" src="js/jquery.min2.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>


<body>
      @yield('content')

<div class="team" id="copyright">
        <div class="container">
        </br></br>
            <h6>___________________________________</h6></br>
            <h6>&copy;2016. Todos los derechos reservados</h6>
            <p class="nostrud">Desarrollado y editado por <a href="https://www.udistrital.edu.co/">Andres Clavijo & Brayan Valero</a></p>
        </div>
</div>

@yield('scripts')

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });

            });

        $(function() {
        var url= window.location.href;
            if (url.indexOf('setFocus=true') > 0) {
                $("#go").trigger("click");
                $('html, body').animate({
                    scrollTop: $("#contenido").offset().top
                }, 1000);
            }
        });
</script>
</body>
</html>
