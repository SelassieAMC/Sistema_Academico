Hola,<br><br>

Solicitaste reset de tu password para acceso al sistema.<br>


Sigue la siguiente URL continuar el proceso: <br><br>
<a href="{{ $link = url('/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a><br><br>

Cordialmente, <br><br><br>

Sistema Academico Colegio Rafael Maria Carrasquilla<br>
Por favor no responda este correo, es un mensaje automatico del sistema academico.




