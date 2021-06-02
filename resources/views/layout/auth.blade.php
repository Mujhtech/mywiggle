
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Authentication - MyWiggle')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/user/images/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/ionicons/css/ionicons.min.css') }}" />

    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/magnific-popup.min.css') }}" />

    <!--  Style -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/style.css') }}" />
    <!--  Responsive -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/responsive.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/user/css/toast.min.css') }}" />
</head>

<body>

    <!--=========== Loader =============-->
    <!--<div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>-->
    <!--=========== Loader =============-->

    @yield('content')

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <script src="{{ asset('assets/frontend/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/asyncloader.min.js') }}"></script>
    <!-- JS bootstrap -->
    <script src="{{ asset('assets/frontend/user/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel -->
    <script src="{{ asset('assets/frontend/user/js/owl.carousel.min.js') }}"></script>
    <!-- counter-js -->
    <script src="{{ asset('assets/frontend/user/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/jquery.counterup.min.js') }}"></script>
    <!-- popper-js -->
    <script src="{{ asset('assets/frontend/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/swiper-bundle.min.js') }}"></script>
    <!-- Iscotop -->
    <script src="{{ asset('assets/frontend/user/js/isotope.pkgd.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/streamlab-core.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/script.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/toast.min.js') }}"></script>

    @if(\Session::has('error'))
        <script type="text/javascript">
            new Toast({
              message: '{!!  \Session::get('error')!!}',
              type: 'danger'
            });
        </script>                      
    @endif

    @if(\Session::has('success'))
        <script type="text/javascript">
            new Toast({
              message: '{!!  \Session::get('success')!!}',
              type: 'success'
            });
        </script>                      
    @endif

</body>

</html>