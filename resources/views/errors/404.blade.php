@extends('layout.user')
@section('content')

<!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('{{ asset('assets/img/background/asset-54.jpg') }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                404
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">404</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- blog single -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="gen-blog-post">
                        <div class="gen-post-media">
                            <img src="{{ asset('assets/img/404.jpg') }}" alt="blog-image" loading="lazy">
                        </div>
                        <div class="gen-blog-contain">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-xs-12 offset-lg-4 offset-md-2">
                                    <div class="widget widget_search">
                                        <h4>Search something new...</h4>
                                        <form role="search" method="get" class="search-form" action="{{ route('web.search') }}">
                                            <label>
                                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                                            </label>
                                            <button type="submit" class="search-submit"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog single -->


@endsection