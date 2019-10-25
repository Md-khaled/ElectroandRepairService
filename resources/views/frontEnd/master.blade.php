<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from preview.freethemescloud.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 19:56:09 GMT -->
<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subas || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/app/public/users_img/icon/favicon.png')}}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
     <link rel="stylesheet" type="text/css" href="'https://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Roboto:400,500,700">
    <link rel="stylesheet" href="{{asset('public/users/css/material-design-iconic-font.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('public/users/css/chat.css')}}">
    
    <link rel="stylesheet" href="{{asset('public/users/css/custom.css')}}">
    <!-- Modernizr JS -->
   <script src="{{asset('public/users/js/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
           @include('frontEnd.partials.header-top')
            <!-- header-middle-area -->
           @include('frontEnd.partials.header-middle')
        </header>
        <!-- END HEADER AREA -->

        <!-- START MOBILE MENU AREA -->
           @include('frontEnd.partials.mobile-menu')
        <!-- END MOBILE MENU AREA -->

        <!-- START SLIDER AREA -->
        @yield('slider')
        <!-- END SLIDER AREA -->

        <!-- Start page content -->
        @yield('content')
        <!-- End page content -->

        <!-- START FOOTER AREA -->
           @include('frontEnd.partials.footer')
       
        <!-- END FOOTER AREA -->

        <!-- START QUICKVIEW PRODUCT -->
           @include('frontEnd.partials.quick-view')
        
        <!-- END QUICKVIEW PRODUCT -->

        <!--style-customizer start -->
           <!--@include('frontEnd.partials.style-customizer') -->
       
        <!--style-customizer end -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

   <script src="{{asset('public/users/js/all.js')}}"></script>
    @yield('script')

</body>


<!-- Mirrored from preview.freethemescloud.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2019 19:56:26 GMT -->
</html>