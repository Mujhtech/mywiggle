@extends('layout.user')
@section('content')

    <!-- owl-carousel Banner Start -->
    <section class="pt-0 pb-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="gen-banner-movies banner-style-3">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                            data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                            data-loop="true" data-margin="0">

                            @foreach ($slider_video as $sv)

                                <div class="item" style="background: url('{{ $sv->featured_image_url }}')">
                                    <div class="gen-movie-contain-style-3 h-100">
                                        <div class="container h-100">
                                            <div class="row justify-content-center h-100">
                                                <div class="col-xl-6">
                                                    <a href="{{ asset($sv->tread_video_path->video_url) }}"
                                                        class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7"
                                                            enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                            <polygon class="triangle" id="XMLID_18_" fill="none"
                                                                stroke-width="7" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-miterlimit="10" points="
                                                73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                            <circle class="circle" id="XMLID_17_" fill="none"
                                                                stroke-width="7" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-miterlimit="10" cx="106.8"
                                                                cy="106.8" r="103.3"></circle>
                                                        </svg>
                                                        <span>Watch Now</span>
                                                    </a>
                                                    <div class="gen-movie-info">
                                                        <h3>{{ $sv->title }}</h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul class="gen-meta-after-title">
                                                            <li>{{ $sv->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $sv->category->slug) }}"><span>{{ $sv->category->name }}</span></a>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-eye">
                                                                </i>
                                                                <span>{{ $sv->views }} Views</span>
                                                            </li>
                                                        </ul>
                                                        <p>{{ $sv->short_content }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Banner End -->

    <!-- owl-carousel Videos Section-1 Start -->
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Sponsored Videos</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('web.all', 'sponsored') }}" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                            data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">

                            @foreach ($sponsored as $sp)

                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">
                                                    <img src="{{ $sp->featured_image_url }}"
                                                        alt="owl-carousel-video-image">
                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">
                                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div>
                                                        </div>
                                                        <ul class="menu bottomRight">
                                                            <li class="share top">
                                                                <i class="fa fa-share-alt"></i>
                                                                <ul class="submenu">
                                                                    <li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $sp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $sp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $sp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle"
                                                                href="{{ route('web.addwl', $sp->slug) }}"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="register.html">Sign
                                                                            in
                                                                            to add this
                                                                            movie to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <a href="{{ route('web.single', $sp->slug) }}"
                                                            class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a
                                                                href="{{ route('web.single', $sp->slug) }}">{{ $sp->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $sp->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $sp->category->slug) }}"><span>{{ $sp->category->name }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->

    <!-- owl-carousel Videos Section-1 Start -->
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Trending Videos</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('web.all', 'trending') }}" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                            data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">

                            @foreach ($trending as $td)

                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">
                                                    <img src="{{ $td->featured_image_url }}"
                                                        alt="owl-carousel-video-image">
                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">
                                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div>
                                                        </div>
                                                        <ul class="menu bottomRight">
                                                            <li class="share top">
                                                                <i class="fa fa-share-alt"></i>
                                                                <ul class="submenu">
                                                                    <li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $td->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $td->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $td->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle"
                                                                href="{{ route('web.addwl', $td->slug) }}"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="register.html">Sign
                                                                            in
                                                                            to add this
                                                                            movie to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <a href="{{ route('web.single', $td->slug) }}"
                                                            class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a
                                                                href="{{ route('web.single', $td->slug) }}">{{ $td->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $td->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $td->category->slug) }}"><span>{{ $td->category->name }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-1 End -->

    <!-- owl-carousel Videos Section-2 Start -->
    <section class="gen-section-padding-2 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Popular Videos</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('web.all', 'popular') }}" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                            data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">

                            @foreach ($popular as $pp)

                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">
                                                    <img src="{{ $pp->featured_image_url }}"
                                                        alt="owl-carousel-video-image">
                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">
                                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div>
                                                        </div>
                                                        <ul class="menu bottomRight">
                                                            <li class="share top">
                                                                <i class="fa fa-share-alt"></i>
                                                                <ul class="submenu">
                                                                    <li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $pp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $pp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $pp->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle"
                                                                href="{{ route('web.addwl', $pp->slug) }}"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="register.html">Sign
                                                                            in
                                                                            to add this
                                                                            movie to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <a href="{{ route('web.single', $pp->slug) }}"
                                                            class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a
                                                                href="{{ route('web.single', $pp->slug) }}">{{ $pp->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $pp->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $pp->category->slug) }}"><span>{{ $pp->category->name }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-2 End -->
    <!-- owl-carousel images Start -->
    <section class="pt-0 pb-0 gen-section-padding-2 home-singal-silder">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gen-banner-movies">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="1"
                            data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">
                            @foreach ($ads as $ad)
                                <div class="item" style="background: url('{{ $ad->featured_image_url }}')">
                                    <div class="gen-movie-contain h-100">
                                        <div class="container h-100">
                                            <div class="row align-items-center h-100">
                                                <div class="col-xl-6">
                                                    <div class="gen-movie-info">
                                                        <h3>{{ $ad->title }}</h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $ad->created_at->diffForHumans() }}</< /li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $ad->category->slug) }}"><span>{{ $ad->category->name }}</span></a>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-eye">
                                                                </i>
                                                                <span>{{ $ad->views }} Views</span>
                                                            </li>
                                                        </ul>
                                                        <p>{{ $ad->short_content }}</p>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <div class="gen-btn-container button-1">
                                                            <a href="{{ route('web.single', $ad->slug) }}"
                                                                class="gen-button">
                                                                <i aria-hidden="true" class="ion ion-play"></i> <span
                                                                    class="text">play now</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel images End -->

    <!-- owl-carousel Videos Section-3 Start -->
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Short Films</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('web.all', 'short') }}" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                            data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">

                            @foreach ($short_skit as $ss)

                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">
                                                    <img src="{{ $ss->featured_image_url }}"
                                                        alt="owl-carousel-video-image">
                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">
                                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div>
                                                        </div>
                                                        <ul class="menu bottomRight">
                                                            <li class="share top">
                                                                <i class="fa fa-share-alt"></i>
                                                                <ul class="submenu">
                                                                    <li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle"
                                                                href="{{ route('web.addwl', $ss->slug) }}"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="register.html">Sign
                                                                            in
                                                                            to add this
                                                                            movie to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <a href="{{ route('web.single', $ss->slug) }}"
                                                            class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a
                                                                href="{{ route('web.single', $ss->slug) }}">{{ $ss->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $ss->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $ss->category->slug) }}"><span>{{ $ss->category->name }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-3 End -->

    <!-- owl-carousel Videos Section-3 Start -->
    <section class="gen-section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <h4 class="gen-heading-title">Social Media Video</h4>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                            <a href="{{ route('web.all', 'short') }}" class="gen-button gen-button-flat">
                                <span class="text">More Videos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gen-style-2">
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                            data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                            data-loop="false" data-margin="30">

                            @foreach ($social_media as $ss)

                                <div class="item">
                                    <div
                                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                            <div class="gen-movie-contain">
                                                <div class="gen-movie-img">
                                                    <img src="{{ $ss->featured_image_url }}"
                                                        alt="owl-carousel-video-image">
                                                    <div class="gen-movie-add">
                                                        <div class="wpulike wpulike-heart">
                                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                <button type="button"
                                                                    class="wp_ulike_btn wp_ulike_put_image"></button>
                                                            </div>
                                                        </div>
                                                        <ul class="menu bottomRight">
                                                            <li class="share top">
                                                                <i class="fa fa-share-alt"></i>
                                                                <ul class="submenu">
                                                                    <li><a href="{{ route('web.share', ['platform' => 'facebook', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'whatsapp', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-whatsapp"></i></a>
                                                                    </li>
                                                                    <li><a href="{{ route('web.share', ['platform' => 'twitter', 'slug' => $ss->slug]) }}"
                                                                            class="facebook"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <div class="movie-actions--link_add-to-playlist dropdown">
                                                            <a class="dropdown-toggle"
                                                                href="{{ route('web.addwl', $ss->slug) }}"
                                                                data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="register.html">Sign
                                                                            in
                                                                            to add this
                                                                            movie to a
                                                                            playlist.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <a href="{{ route('web.single', $ss->slug) }}"
                                                            class="gen-button">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="gen-info-contain">
                                                    <div class="gen-movie-info">
                                                        <h3><a
                                                                href="{{ route('web.single', $ss->slug) }}">{{ $ss->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="gen-movie-meta-holder">
                                                        <ul>
                                                            <li>{{ $ss->created_at->diffForHumans() }}</li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('web.category', $ss->category->slug) }}"><span>{{ $ss->category->name }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #post-## -->
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- owl-carousel Videos Section-3 End -->
@endsection
