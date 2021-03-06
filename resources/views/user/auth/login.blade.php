@extends('layout.auth')

@section('content')

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background" style="background-image: url('{{ asset('assets/img/background/asset-54.jpg') }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_login" action="{{ route('auth.login.post') }}" method="post">
                            @csrf
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">Username or Email Address</label>
                                <input type="text" name="id" class="input" value="{{old('id') ? old('id') : ''}}">
                                @if($errors->has('id'))
                                <small>{!!  $errors->get('id')[0] !!}</small>
                                @endif
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" class="input" value="">
                                @if($errors->has('password'))
                                <small>{!!  $errors->get('password')[0] !!}</small>
                                @endif
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                                <input type="hidden" name="redirect_to">
                            </p>
                            <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect"><a
                                href="{{ route('auth.register') }}">Register</a> | <a href="{{ route('auth.recover') }}">Lost your
                                password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

@endsection