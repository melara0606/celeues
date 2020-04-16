<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>General Elements | Nifty - Admin Template</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css' /> -->
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
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <!--
    <link href="{{ asset('demo/plugins/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('demo/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}" rel="stylesheet">
   --> <!--Ion Icons [ OPTIONAL ]-->
    {{-- <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet">--}}
    <link href="{{ asset('demo/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('demo/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('demo/plugins/x-editable/css/bootstrap-editable.css') }}">
  <!-- Venia con codigo de melara  
  <link rel="stylesheet" href="{{ asset("css/index.css") }}"/>
-->
    @yield('links')
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-sm">
        {{-- Header --}}
        @include("layouts.shared.header")
        <div class="boxed">
            <div id="content-container" >
                @yield('content')
            </div>
        </div>
        {{-- Aside bars --}}
        @include('layouts.shared.asidebar')
        @include('layouts.shared.footer')
    </div>

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
    <!--
    <script src="{{ asset('demo/js/demo/tables-datatables.js') }}"></script>
-->
         <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('demo/plugins/select2/js/select2.min.js') }}"></script> 
    <script src="{{ asset('demo/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> 
    <script src="{{ asset('demo/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>
    <!-------Jona no lo tiene ------->
 
    @yield('script')
</body>
</html>
