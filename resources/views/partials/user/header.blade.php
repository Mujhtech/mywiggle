<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ get_setting('app-name') }} - {{ get_setting('meta-description') }}" />
    <meta name="description" content="{{ get_setting('meta-description') }}" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'MyWiggle')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ get_app_logo() }}">

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
    {!! get_setting('header-code') !!}
</head>
<body>

        <!--=========== Loader =============-->
    <!--<div id="gen-loading">
        <div id="gen-loading-center">
            <img src="images/logo-1.png" alt="loading">
        </div>
    </div>-->
    <!--=========== Loader =============-->
    
    <!--========== Header ==============-->
    <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
        <div class="gen-bottom-header">
            <div class="container">
                <div class="row">
                    @if(get_setting('enable-ads'))
                    @if(\App\Models\Ad::where('is_front', 1)->where('status', 1)->exists())
                    <?php $ad = \App\Models\Ad::where('is_front', 1)->where('status', 1)->inRandomOrder()->first(); ?>
                    <div class="col-lg-12 col-md-12 col-xs-12 offset-lg-2 offset-md-3">
                        <a href="{{ $ad->url }}">
                            <img src="{{ $ad->flier_url }}" style="width:200px" alt="Ads">
                        </a>
                    </div>
                    @else
                    <div class="col-lg-12 col-md-12 col-xs-12 offset-lg-2 offset-md-3">
                        <a href="#">
                            <img src="https://via.placeholder.com/728x90?text=Visit+MyWiggle.com+Now+to+place+your+ads" alt="Ads">
                        </a>
                    </div>
                    @endif
                    @endif
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img class="img-fluid logo" src="{{ get_app_logo() }}" alt="logo">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="gen-menu-contain" class="gen-menu-contain">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item active">
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        @foreach($pages as $page)
                                        <li class="menu-item">
                                            <a href="{{ route('web.page', $page->slug) }}">{{ $page->title }}</a>
                                        </li>
                                        @endforeach
                                        <li class="menu-item">
                                            <a href="#">My Earnings</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="{{ url('/social-media-marketer') }}">Social Media Marketer</a>
                                                    <a href="{{ url('/content-creator') }}">Content Creator</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gen-header-info-box">
                                <div class="gen-menu-search-block">
                                    <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                                    <div class="gen-search-form">
                                        <form role="search" method="get" class="search-form" action="{{ route('web.search') }}">
                                            <label>
                                                <span class="screen-reader-text"></span>
                                                <input type="search" class="search-field" placeholder="Search …"
                                                    value="" name="s">
                                            </label>
                                            <button type="submit" class="search-submit"><span
                                                    class="screen-reader-text"></span></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="gen-account-holder">
                                    <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                                    <div class="gen-account-menu">
                                        <ul class="gen-account-menu">
                                            <!-- Library Menu -->
                                            @if(Auth::check())
                                            <li>
                                                <a href="{{ route('user.dashboard') }}">
                                                    <i class="fa fa-user-circle"></i>
                                                    Dashboard </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.video') }}">
                                                    <i class="fa fa-indent"></i>
                                                    My Videos </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('auth.logout') }}"> <i class="fa fa-upload"></i>
                                                    Logout </a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ route('auth.login') }}"> <i class="fa fa-user-circle"></i>
                                                    Login </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="gen-btn-container">
                                    @if(Auth::check())
                                    <a href="{{ route('auth.logout') }}" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Logout</span>
                                        </div>
                                    </a>
                                    @else
                                    <a href="{{ route('auth.register') }}" class="gen-button">
                                        <div class="gen-button-block">
                                            <span class="gen-button-line-left"></span>
                                            <span class="gen-button-text">Register</span>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--========== Header ==============-->
