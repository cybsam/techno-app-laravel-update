<!DOCTYPE html>
<html lang="zxx"> 
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title> @yield('title')</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="@yield('metaTitle')">
        <meta name="description" content="@yield('metaDescription')">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/FrontEnd/logoFav/fav.png')}}">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/bootstrap.min.css')}}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/fonts/font-awesome.min.css')}}">
        <!-- flaticon css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/fonts/flaticon.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/animate.css')}}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/owl.carousel.css')}}">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="{{ asset('css/FrontEnd/css/rsmenu-main.css')}}">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('custom-slider/css/nivo-slider.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('custom-slider/css/preview.css')}}">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/rs-spacing.css')}}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/style.css')}}">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/FrontEnd/css/responsive.css')}}">
        @yield('cssFront')
        <style>
            .rs-breadcrumbs {
                background-image: url("{{ asset('image/FrontEnd/breadcrumb/breadcrumb.jpg') }}");
                /* background-image: url('./public/image/fontend/img/breadcrumbs/inr_6.jpg'); */
                background-repeat: no-repeat !important;
                background-size: cover !important;
                background-position: center !important;
            }
        </style>
        
    </head>
    <body class="defult-home">

<body>
    @php
        $AboutUsInformation = DB::table('about_us_information')->where('id','1')->first();
    @endphp
    
    @php
        $projectCategory = DB::table('project_categories')->get();
    @endphp

    @php
        $productAndServiceDesign = DB::table('product_services')->where('is_active',1)->where('__prosermenuselect','design-and-consultancy-services')->get();
        $productAndServiceElectrial = DB::table('product_services')->where('is_active',1)->where('__prosermenuselect','hvac-and-bbt')->get();
        $productAndServiceFire = DB::table('product_services')->where('is_active',1)->where('__prosermenuselect','fire-solution')->get();
        $productAndServiceAutomation = DB::table('product_services')->where('is_active',1)->where('__prosermenuselect','automation-solution')->get();
        
    @endphp
            
    <div class="offwrap"></div>
     
    <!-- Main content Start -->
    <div class="main-content">

    @include('dash-user.layouts.inc.header')
    <!--==================== HEADER ====================-->
    @yield('content')

</div> 
<!-- Main content End -->
    <!--==================== FOOTER ====================-->
    @include('dash-user.layouts.inc.footer')

    <!--=============== SCROLL UP ===============-->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

    
        
        <!-- modernizr js -->
        <script src="{{ asset('js/FrontEnd/js/modernizr-2.8.3.min.js')}}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('js/FrontEnd/js/jquery.min.js')}}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('js/FrontEnd/js/bootstrap.min.js')}}"></script>
        <!-- op nav js -->
        <script src="{{ asset('js/FrontEnd/js/jquery.nav.js')}}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('js/FrontEnd/js/isotope.pkgd.min.js')}}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('js/FrontEnd/js/owl.carousel.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{ asset('js/FrontEnd/js/wow.min.js')}}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('js/FrontEnd/js/skill.bars.jquery.js')}}"></script>
        <!-- imagesloaded js -->
        <script src="{{ asset('js/FrontEnd/js/imagesloaded.pkgd.min.js')}}"></script>
         <!-- waypoints.min js -->
        <script src="{{ asset('js/FrontEnd/js/waypoints.min.js')}}"></script>
        <!-- counterup.min js -->
        <script src="{{ asset('js/FrontEnd/js/jquery.counterup.min.js')}}"></script> 
        <!-- magnific popup js -->
        <script src="{{ asset('js/FrontEnd/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Nivo slider js -->
        <script src="{{ asset('custom-slider/js/jquery.nivo.slider.js')}}"></script>
        <!-- contact form js -->
        <script src="{{ asset('js/FrontEnd/js/contact.form.js')}}"></script>
        <!-- main js -->
        <script src="{{ asset('js/FrontEnd/js/main.js')}}"></script>
        <script src="https://kit.fontawesome.com/17569ebc40.js" crossorigin="anonymous"></script>

    </body>

</html>