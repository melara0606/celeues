
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Resetar Password</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('started/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('started/css/nifty.min.css') }}" rel="stylesheet">


    <!--Premium Icons [ OPTIONAL ]-->
    <link href=" {{ asset('started/premium/icon-sets/icons/line-icons/premium-line-icons.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('started/premium/icon-sets/icons/solid-icons/premium-solid-icons.min.css') }}" rel="stylesheet">


    <!--=================================================-->


    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{ asset('started/css/pace.min.css') }}" rel="stylesheet">
    <script src=" {{ asset('started/js/pace.min.js') }}"></script>


        <!-- Create your own class to load custum image [ SAMPLE ]-->
    <style>
        .demo-my-bg{
            background-image : url("img/balloon.jpg");
        }
    </style>


        
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    Detailed information and more samples can be found in the document.

    ================================================= -->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">
        
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class="bg-img" style="background-image: url(started/img/bg-img-3.jpg)"></div>
		
		
		<!--  FORM -->
		<!--===================================================-->
        <div class="cls-content">
		    <div class="cls-content-sm panel" style="padding-bottom: 0px;padding-top:0px; border: 1px solid #ccc;box-shadow: 1px 1px 5px 0px #bbbbbb !important; border-radius: 5px; min-height: 400px">
            <div class="panel-body">
            <div class="mar-ver pad-btm">
		                <h1 class="h3">Restablecimiento</h1>
		                <p>Restablecimiento de Contraseña</p>
		            </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label text-left">E-mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label text-left">Nueva Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-12 control-label text-left">Confirmar Contraseña</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 {{--col-md-offset-4--}}">
                                <button type="submit" class="btn btn-primary ">
                                    Resetear Contraseña
                                </button>
                            </div>
                            
                        </div>
                        <hr>
                    </form>
                </div>
		    </div>
		</div>
		<!--===================================================-->
		
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    </body>
</html>
