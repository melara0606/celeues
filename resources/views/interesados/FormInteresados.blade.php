<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
    <title>General Elements | Nifty - Admin Template</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
   {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/css/bootstrap.min.css') }}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    {{--<link href="css/nifty.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/css/nifty.min.css') }}" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
   {{-- <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
  {{--  <link href="plugins/pace/pace.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/plugins/pace/pace.min.css') }}" rel="stylesheet">

{{--    <script src="plugins/pace/pace.min.js"></script>--}}
    <script href="{{ asset('demo/plugins/pace/pace.min.js') }}"></script>


    <!--Demo [ DEMONSTRATION ]-->
{{--    <link href="css/demo/nifty-demo.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/css/demo/nifty-demo.min.css') }}" rel="stylesheet">


 <!--Bootstrap Datepicker [ OPTIONAL ]-->
{{--    <link href="plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

 <!--DataTables [ OPTIONAL ]-->
 {{-- <link href="plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet"> --}}

 <link href="{{ asset('demo/plugins/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
 <link href="{{ asset('demo/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">



        
    <!--Ion Icons [ OPTIONAL ]-->
   {{-- <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">--}}
 <link href="{{ asset('demo/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

            
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" {{--class="effect aside-float aside-bright mainnav-lg"--}}>
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Nifty</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                   
                    <ul class="nav navbar-top-links">





                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            
            <div id="content-container" {{--style="background-color: lightgreen"--}} >

              <div id="page-head">
               
               <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    {{--<div id="page-title">
                        <h1 class="page-header text-overflow"></h1>
                        
                    </div>--}}
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb"  >

                    <li><a href="#">&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp<i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Form</a></li>
                    <li class="active">Interesados</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
       
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" >
                   
                    <div class="row ">
                        
    <div id="msjshow" name="msjshow" style="display: none"  class="alert alert-success col-md-5 " >
 <strong>Well done!</strong> You successfully read this important alert message.
   </div>

                        <div class="card-body "></div>
                        <div class="col-lg-1"></div>
                        {{----}}<div class="col-lg-3">
                                 <div class="panel" style=" {{-- background:#eeeeee--}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;" >
                                <div class="panel-heading bg-gray-dark">
                                   <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">NOTICIA</strong></p></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row pad-btm form-inline">
                                            <div class=" col-md-12">
                                                <label  class="control-label text-main text-bold col-md-5">TITULO:</label>
                                                <label class="control-label  text-bold col-md-7">{{$noticia->titulo}} </label>
                                            </div>
                                            <br>
                                            <br>
                                            <div class=" col-md-12">
                                                <label for="" class="control-label text-main text-bold col-md-5">DESCRIPCION:</label>

                                                 <label class="control-label text-sm  text-bold col-md-7">{{$noticia->descripcion}} </label>
                                                  
                                            </div>
                                            <br>
                                            <br>
                                            <div class=" col-md-12">
                                                <label for="" class="control-label text-main text-bold col-md-5">MODULO:</label>

                                                 <label class="control-label  text-bold col-md-7">{{$noticia->numModulo}} </label>
                                                  
                                            </div>
                                            <br>
                                            <br>
                                            <div class=" col-md-12">
                                                <label for="" class="control-label text-main text-bold col-md-5">MODALIDAD:</label>

                                                 <label class="control-label  text-bold col-md-7">{{$noticia->modalidad}} </label>
                                                  
                                            </div>      
                                            <br>
                                            <br>
                                            <div class=" col-md-12">
                                                <label for="" class="control-label text-main text-bold col-md-5">INTERESADOS:</label>

                                                 <label class="control-label  text-bold col-md-7">{{$noticia->numInteresados}} </label>
                                                  
                                            </div>      
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 ">
                            <div class="panel" style=" {{-- background:#eeeeee--}};border: 1px solid #ccc; box-shadow: 1px 1px #bbb !important;{{--min-height: 500px--}}" >
                                <div class="panel-heading bg-gray-dark">
                                   <h3 class="panel-title "><p align="left" class="text-m text-bold media-heading mar-no text-main"> <strong style="font-size: 14px; ">DATOS DE INTERESADO</strong></p></h3>
                                </div>
                     <div class="bord-all">
                       
                    
                                <!-- BASIC FORM ELEMENTS -->
                                <!--===================================================-->
                                <form id="form" class="panel-body form-horizontal form-padding" action="noticiaForm/create" method="post">
                                    
                                    <!--Static-->
                                    {{-- csrf_field() --}}
                                    <div class="form-group" style="display: none">
                                        <label class="col-md-3 control-label text-main text-bold">Static</label>
                                        <div class="col-md-7"><p class="form-control-static">Username</p></div>
                                    </div>
                                    <br>

                                    <!--Text Input-->
                                    <div class="form-group @if($errors->has('titulo')) has-error @endif" style="display: none;">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">idnoticias</label>
                                        <div class="col-md-7">
                                            <input type="text" id="idnoticias" value="{{ $idNoticia }}" name="idnoticias" class="form-control" placeholder="idnoticias"  >
                                            {{--<small class="help-block">This is a help text</small>
                                        --}}
                                        </div>
                                    </div>

                    
                                    <!--Text Input-->
                                    <div class="form-group @if($errors->has('titulo')) has-error @endif">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Nombre*</label>
                                        <div class="col-md-7">
                                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombre"  >
                                            {{--<small class="help-block">This is a help text</small>
                                        --}}
                                        </div>
                                    </div>

                                    <!--Text Input-->
                                    <div class="form-group @if($errors->has('titulo')) has-error @endif">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Apellido*</label>
                                        <div class="col-md-7">
                                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingrese apellido"  >
                                            {{--<small class="help-block">This is a help text</small>
                                        --}}
                                        </div>
                                    </div>

                                    <!--Text Input-->
                                    <div class="form-group @if($errors->has('titulo')) has-error @endif">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Fecha Nacimiento*</label>
                                        <div class="col-md-5">
                                            <input type="date" id="fechaNac" name="fechaNac" class="form-control" placeholder="Ingrese su fecha de nacimiento"  >
                                            {{--<small class="help-block">This is a help text</small>
                                        --}}
                                        </div>
                                    </div>
                                    

                                     <!--Text Input-->
                                    <div class="form-group @if($errors->has('titulo')) has-error @endif">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-text-input">Telefono</label>
                                        <div class="col-md-5">
                                            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="####-####"  >
                                            {{--<small class="help-block">This is a help text</small>
                                        --}}
                                        </div>
                                    </div>
    
                                    <!--Email Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Email*</label>
                                        <div class="col-md-7">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                                             </div>
                                    </div>
                                    
                                  
                                    {{--<div class="form-group">
                                     <label class="col-md-3 control-label text-main text-bold" for="demo-email-input">Modalidad</label>
                                 <div class="col-md-7">
                                    <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" />
                                                        <span class="input-group-addon">to</span>
                                                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" />
                                                    </div>
                                                    
                                     </div>
                                </div>

                            </div>--}}
                                    <div class="form-group">
                                     <div class="col-md-10 ui-panels form-group">
                                        <div class=" text-right">
                                            <button class="btn btn-primary" type="button" id="btnGuardar">Nuevo</button>
                                        </div>
                                     </div>
                                 </div>
                                


                             {{--       <!--Password-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-password-input">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" id="demo-password-input" class="form-control" placeholder="Password">
                                            <small class="help-block">Please enter password</small>
                                        </div>
                                    </div>
                    
                                    <!--Readonly Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-readonly-input">Readonly input</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-readonly-input" class="form-control" placeholder="Readonly input here..." readonly>
                                        </div>
                                    </div>
                                                                        
                                    <div class="form-group pad-ver">
                                        <label class="col-md-3 control-label">Radio Buttons</label>
                                        <div class="col-md-9">
                    
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input id="demo-form-radio" class="magic-radio" type="radio" name="form-radio-button" checked>
                                                <label for="demo-form-radio">Option 1 (pre-checked)</label>
                                            </div>
                                            <div class="radio">
                                                <input id="demo-form-radio-2" class="magic-radio" type="radio" name="form-radio-button">
                                                <label for="demo-form-radio-2">Option 2</label>
                                            </div>
                                            <div class="radio">
                                                <input id="demo-form-radio-3" class="magic-radio" type="radio" name="form-radio-button">
                                                <label for="demo-form-radio-3">Option 2</label>
                                            </div>
                    
                                        </div>
                                    </div>
                                    <div class="form-group pad-ver">
                                        <label class="col-md-3 control-label">Inline Radio buttons</label>
                                        <div class="col-md-9">
                                            <div class="radio">
                    
                                                <!-- Inline radio buttons -->
                                                <input id="demo-inline-form-radio" class="magic-radio" type="radio" name="inline-form-radio" checked>
                                                <label for="demo-inline-form-radio">Option 1 (pre-checked)</label>
                    
                                                <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="inline-form-radio">
                                                <label for="demo-inline-form-radio-2">Option 2</label>
                    
                                                <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="inline-form-radio">
                                                <label for="demo-inline-form-radio-3">Option 3</label>
                    
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pad-ver">
                                        <label class="col-md-3 control-label">Checkboxes</label>
                                        <div class="col-md-9">
                    
                                            <!-- Checkboxes -->
                                            <div class="checkbox">
                                                <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked>
                                                <label for="demo-form-checkbox">Option 1 (pre-checked)</label>
                                            </div>
                    
                                            <div class="checkbox">
                                                <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox">
                                                <label for="demo-form-checkbox-2">Option 2</label>
                                            </div>
                    
                                            <div class="checkbox">
                                                <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox">
                                                <label for="demo-form-checkbox-3">Option 3</label>
                                            </div>
                    
                    
                                        </div>
                                    </div>
                                    <div class="form-group pad-ver">
                                        <label class="col-md-3 control-label">Inline Checkboxes</label>
                                        <div class="col-md-9">
                                            <div class="checkbox">
                    
                                                <!-- Inline Checkboxes -->
                                                <input id="demo-form-inline-checkbox" class="magic-checkbox" type="checkbox" checked>
                                                <label for="demo-form-inline-checkbox">Option 1 (pre-checked)</label>
                    
                                                <input id="demo-form-inline-checkbox-2" class="magic-checkbox" type="checkbox">
                                                <label for="demo-form-inline-checkbox-2">Option 2</label>
                    
                                                <input id="demo-form-inline-checkbox-3" class="magic-checkbox" type="checkbox">
                                                <label for="demo-form-inline-checkbox-3">Option 3</label>
                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">File input</label>
                                        <div class="col-md-9">
                                            <span class="pull-left btn btn-primary btn-file">
                                            Browse... <input type="file">
                                            </span>
                                        </div>
                                    </div>
                                    --}}
                                </form>
                                <!--===================================================-->
                                <!-- END BASIC FORM ELEMENTS -->
    </div>              
                    
                            </div>
                        </div>

                </div>
                <!--===================================================-->
                <!--End page content-->

   <br><br><br>       

            
            </div>
            
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            
        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2017 Your Company</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    {{-- <script src="js/jquery.min.js"></script> --}}
    <script src="{{ asset('demo/js/jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
 {{--   <script src="js/bootstrap.min.js"></script> --}}
<script src="{{ asset('demo/js/bootstrap.min.js') }}"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
{{--    <script src="js/nifty.min.js"></script>--}}
<script src="{{ asset('demo/js/nifty.min.js') }}"></script>




    <!--=================================================-->
    
    <!--Demo script [ DEMONSTRATION ]-->
 {{--   <script src="js/demo/nifty-demo.min.js"></script> --}}
<script src="{{ asset('demo/js/demo/nifty-demo.min.js') }}"></script>

 <!--Bootstrap Datepicker [ OPTIONAL ]-->
 {{--    <script src="plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> --}}
<script src="{{ asset('demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


   <!--DataTables [ OPTIONAL ]-->
{{--    <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>--}}
<script src="{{ asset('demo/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('demo/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('demo/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

    <!--DataTables Sample [ SAMPLE ]-->
    {{--<script src="js/demo/tables-datatables.js"></script>--}}
<script src="{{ asset('demo/js/demo/tables-datatables.js') }}"></script>

<script src="{{ asset('js/interesados.js') }}"></script>

    
    

</body>
</html>
