<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title','Adidas Dashboard')</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('assets/assetsAdmin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('assets/assetsAdmin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <script src="sweetalert2.all.min.js"></script>
    <!-- assets/assetsAdmin/Vendor CSS-->
    <link href="{{url('assets/assetsAdmin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('assets/assetsAdmin/css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/assetsAdmin/css/style.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('partials/partialsAdmin/headerMobile');
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('partials/partialsAdmin/menuSidebar');
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('partials/partialsAdmin/headerDescktop');
            <!-- HEADER DESKTOP-->
            @yield('content')
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="{{url('assets/assetsAdmin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('assets/assetsAdmin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- assets/assetsAdmin/Vendor JS       -->
    <script src="{{url('assets/assetsAdmin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{url('assets/assetsAdmin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{url('assets/assetsAdmin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{url('assets/assetsAdmin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{url('assets/assetsAdmin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{url('assets/assetsAdmin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
