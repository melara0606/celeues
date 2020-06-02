<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documento</title>
</head>
<body>
{{-- $user --}}
{{-- $password --}}
    <h1>este es un mensaje</h1>
</body>
</html>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Actionable emails e.g. reset password</title>
<link href="{{ asset('demo/plugins/transactional-email-templates/templates/styles.css') }}" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction">
                    <tr>
                        <td class="content-wrap">
                            <meta itemprop="name" content="Confirm Email"/>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img src="{{asset('profile-photos/tituloemail.png')}}" class="img-lg img-circle" alt="Profile Picture" >
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>CELEUES</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Tu usuario es: {{ $user }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Tu contraseña: {{ $password }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Para mayor seguridad es recomendable que tu contraseña la cambies una vez hayas iniciado sesion.
                                    </td>
                                </tr>
                                <tr>
                                  <td>
                                    Puedes iniciar sesion en el siguiente link de enlace:  <a href="{{ url('/login' )}} " class="btn-primary">logueate</a>
                                    </td>
                                </tr>
                                <tr>
                                  <td>
                                      
                                      <!--  <img width="30%" height="15%" src="img/email-templates/celeues.jpg">
--></td>
                                </tr>
                                
                            </table>
                            <br>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">Siguenos <a href="#">@Celeues</a> En Facebook.</td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>



