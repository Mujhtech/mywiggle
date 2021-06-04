<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'MyWiggle')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://ui-avatars.com/api/?name=MyWiggle&color=E50916&background=000000">

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
                    <div class="col-lg-12 col-md-12 col-xs-12 offset-lg-2 offset-md-3">
                        <a href="#">
                            <img src="https://via.placeholder.com/728x90?text=Visit+MyWiggle.com+Now+to+place+your+ads" alt="Ads">
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img class="img-fluid logo" src="https://ui-avatars.com/api/?name=MyWiggle&color=E50916&background=000000" alt="logo">
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div id="gen-menu-contain" class="gen-menu-contain">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item active">
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('web.page', 'about-us') }}">About Us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('web.page', 'terms-and-condition') }}">Terms & Condition</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Categories</a>
                                            <i class="fa fa-chevron-down gen-submenu-icon"></i>
                                            <ul class="sub-menu">
                                                @foreach($cat as $cc)
                                                <li class="menu-item">
                                                    <a href="{{ route('web.category', $cc->slug) }}">{{ $cc->name}}</a>
                                                </li>
                                                @endforeach
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
                                                <a href="#">
                                                    <i class="fa fa-indent"></i>
                                                    Library </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('auth.logout') }}"> <i class="fa fa-upload"></i>
                                                    Logout </a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="{{ route('auth.login') }}"> <i class="fa fa-upload"></i>
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
