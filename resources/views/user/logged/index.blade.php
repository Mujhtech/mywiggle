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
            </div>
            <!-- end of row-->
            <!-- end of main-content -->
        </div>

    @endSection
    @push('js')
        <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

        <!-- include('partials.error', ['position' => 'toast-bottom-left' ]) -->
        <!-- include('partials.flash', ['position' => 'toast-bottom-left', 'timeout' => 1000 ]) -->

    @endPush

