
    <!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="gen-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="widget">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="{{ get_app_logo() }}" class="gen-footer-logo" alt="gen-footer-logo">
                                        <p>{{ get_setting('app-description') }}
                                        </p>
                                        <ul class="social-link">
                                            <li><a href="{{ get_setting('facebook-link') }}" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ get_setting('instagram-link') }}" class="facebook"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="{{ get_setting('whatsapp-link') }}" class="facebook"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="{{ get_setting('twitter-link') }}" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Explore</h4>
                                <div class="menu-explore-container">
                                    <ul class="menu">
                                        <li class="menu-item">
                                            <a href="{{ url('/') }}" aria-current="page">Home</a>
                                        </li>
                                        @foreach($cat as $cc)
                                        <li class="menu-item"><a href="{{ route('web.category', $cc->slug) }}">{{ $cc->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4  col-md-6">
                            <div class="widget">
                                <h4 class="footer-title">Downlaod App</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Download our mobile app both on Apple Store and Play Store.
                                        </p>
                                        <a href="{{ get_setting('android-link') }}">
                                            <img src="{{ asset('assets/img/asset-35.png') }}" class="gen-playstore-logo" alt="playstore">
                                        </a>
                                        <a href="{{ get_setting('ios-link') }}">
                                            <img src="{{ asset('assets/img/asset-36.png') }}" class="gen-appstore-logo" alt="appstore">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a href="{{ url('/') }}"> Copyright {{ date('Y') }} MyWiggle All Rights
                                    Reserved.</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->
    <script type="text/javascript">
        var APP_URL = "{{ url('/') }}";
    </script>
    <!-- js-min -->
    <script src="{{ asset('assets/frontend/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/asyncloader.min.js') }}"></script>
    <!-- JS bootstrap -->
    <script src="{{ asset('assets/frontend/user/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel -->
    <script src="{{ asset('assets/frontend/user/js/owl.carousel.min.js') }}"></script>
    <!-- counter-js -->
    <script src="{{ asset('assets/frontend/user/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/jquery.counterup.min.js') }}"></script>
    <!-- popper-js -->
    <script src="{{ asset('assets/frontend/user/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/user/js/swiper-bundle.min.js') }}"></script>
    <!-- Iscotop -->
    <script src="{{ asset('assets/frontend/user/js/isotope.pkgd.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/streamlab-core.js') }}"></script>

    <script src="{{ asset('assets/frontend/user/js/script.js') }}"></script>


</body>

</html>