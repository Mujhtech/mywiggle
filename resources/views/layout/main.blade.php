<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>{{ $title }} - MyWiggle</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="https://ui-avatars.com/api/?name=MyWiggle&color=E50916&background=000000">

        <link href="{{ asset('assets/dashboard/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
        <!-- Toastr -->
        <link href="{{ asset('assets/frontend/user/css/toast.min.css') }}" rel="stylesheet">

        @stack('css')

    </head>

    <body class="text-left ">
        <!-- Preloader -->
        <!-- <div id="preloader">
            <div class="preload-content">
                <div id="loader-load"></div>
            </div>
        </div> -->

      
        <div class="app-admin-wrap layout-sidebar-large">
            <!-- Navigation -->
            @include('partials.main-header')
            <!-- Sidebar - student -->
            @include('partials.sidebar')

            <div class="main-content-wrap sidenav-open d-flex flex-column">
                <!-- Page Content -->
                @yield('content')
                @include('partials.dash-footer')
            </div>

        </div>

        <!-- ########## All JS ########## -->
        <script src="{{ asset('assets/frontend/user/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('assets/dashboard/js/plugins/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/script.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/sidebar.large.script.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/plugins/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/echart.options.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/plugins/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/dashboard.v4.script.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/widgets-statistics.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/plugins/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/apexSparklineChart.script.min.js') }}"></script>

        <!-- Toastr -->
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

        @stack('modals')

        @stack('js')

        <!-- livewireScripts -->
    </body>
</html>
