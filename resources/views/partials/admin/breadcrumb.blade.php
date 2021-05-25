@if(config('laravel-mentor.enable_breadcrumb'))
<!-- begin row -->
<div class="row">
    <div class="col-md-12 m-b-30">
        <!-- begin page title -->
        <div class="d-block d-lg-flex flex-nowrap align-items-center">
            <div class="page-title mr-4 pr-4 border-right">
                <h1>@yield('breadcrum')</h1>
            </div>
            <div class="breadcrumb-bar align-items-center">
                <nav>
                    <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">
                            @yield('breadcrum')
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                <a href="{{ url(config('laravel-mentor.usermenu_profile_url', '#')) }}" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile">
                    <i class="fe fe-user btn btn-icon text-primary"></i>
                </a>
                <a href="{{ url(config('laravel-mentor.logout_url', '#')) }}" class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
                    <i class=" ti ti-settings btn btn-icon text-info"></i>
                </a>
            </div>
        </div>
        <!-- end page title -->
    </div>
</div>
@endif