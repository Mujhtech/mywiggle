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
                                {{ $page->title }}
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">{{ $page->title }}</li>
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
                <div class="col-lg-9 col-md-12">
                    <div class="gen-blog-post">
                        <div class="gen-post-media">
                            <img src="images/background/asset-19.jpeg" alt="blog-image" loading="lazy">
                        </div>
                        <div class="gen-blog-contain">
                            <div class="gen-post-meta">
                                <ul>
                                    <!-- <li class="gen-post-author"><i class="fa fa-user"></i>admin</li> -->
                                    <li class="gen-post-meta"><a href="#"><i class="fa fa-calendar"></i>{{ $page->created_at->format('M d, Y') }}</a>
                                    </li>
                                    <!-- <li class="gen-post-tag">
                                        <a href="#"><i class="fa fa-tag"></i>Uncategorized</a>
                                    </li> -->
                                </ul>
                            </div>
                            <p>{!! $page->content !!}</p>
                        </div>
                    </div>
                    <div class="comment-respond">
                        <h3 class="comment-reply-title">Write a Reply or Comment </h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <form>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4">
                                            <p class="comment-form-author">
                                                <input type="text" placeholder="*Enter Name">
                                            </p>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <p class="comment-form-email">
                                                <input type="text" placeholder="*Enter Email">
                                            </p>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <p class="comment-form-url">
                                                <input type="text" placeholder="*Enter Url">
                                            </p>
                                        </div>
                                        <div class="col-xl-12">
                                            <p class="comment-form-comment">
                                                <textarea rows="6" cols="60"
                                                    placeholder="Enter Your Comment"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <input type="submit" value="Post comment">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 mt-4 mt-lg-0">
                    <div class="widget widget_search">
                        <form role="search" method="get" class="search-form" action="{{ route('web.search') }}">
                            <label>
                                <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                            </label>
                            <button type="submit" class="search-submit"></button>
                        </form>
                    </div>
                    <div class="widget widget_recent_entries">
                        <h2 class="widget-title">Recent Posts</h2>
                        <ul>
                            <li>
                                <a href="#">Stream like a pro with (free) live encoding software</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog single -->


@endsection