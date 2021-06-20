@include('partials.admin.header')
@include('partials.admin.nav')
<!-- begin app-container -->
<div class="app-container">
    @include('partials.admin.sidebar')
    <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            @include('partials.admin.breadcrumb')
            <!-- Notification --> 
            <div class="row">
                <div class="col-md-12">
                    @include('partials.admin.notification')
                </div>
            </div>
            <br>
            @yield('content')
            
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
</div>
<!-- end app-container -->
<!-- begin footer -->
@include('partials.admin.footer')