@extends('layout.main')
@push('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" /> -->
@endPush
@section('content')

<!-- ============ Body content start ============= -->
<div class="main-content">
    @include('partials.breadcrumb')
    <div class="separator-breadcrumb border-top"></div>
    <div class="row mb-4">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Money-2"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Point Earned</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $point }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Money-2"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Total Balance</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $point * get_setting('point-equal-balance') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Computer-Secure"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">My Videos</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $video }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Computer-Secure"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">My Watch List</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $wl }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center"><i class="i-Administrator"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">View through you</p>
                        <p class="text-primary text-24 line-height-1 mb-2">{{ $referrals }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($ads) > 0)
    <div class="col-md-12 mb-4">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title mb-3">Advertise</h4>
                <div class="carousel_wrap">
                    <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @for($i = 0; $i < count($ads); $i++)
                            <li class="@if($i == 0) active @endif" data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                            @endfor
                        </ol>
                        <div class="carousel-inner">
                            @php $sn = 0; @endphp
                            @foreach($ads as $ad)
                            @php $sn++ @endphp
                            <div class="carousel-item @if($sn == 1) active @endif">
                                <a href="{{ $ad->url }}" target="_blank"><img class="d-block w-50 text-center" src="{{ $ad->flier_url }}" alt="{{ $sn }}" /></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="{{ $ad->url }}" target="_blank"><h5 class="text-black">{{ $ad->url }}</h5></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- end of row-->
    <!-- end of main-content -->
</div>

@endSection
@push('js')
<!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

<!-- include('partials.error', ['position' => 'toast-bottom-left' ]) -->
<!-- include('partials.flash', ['position' => 'toast-bottom-left', 'timeout' => 1000 ]) -->

@endPush

