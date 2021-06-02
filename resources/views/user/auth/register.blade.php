@extends('layout.auth')

@section('content')

    <!-- register -->
    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('{{ asset('assets/img/background/asset-3.jpeg') }}');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_register-form" action="{{ route('auth.register.post') }}" class="pms-form" method="POST">
                            @csrf
                            <h4>Register</h4>
                            <ul class="pms-form-fields-wrapper pl-0">
                                @if(isset($referral_code) && !empty($referral_code))
                                <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">Referral Code </label>
                                    <input id="pms_user_login" name="referral_code" type="text" value="{{old('referral_code') ? old('referral_code') : ''}}">
                                </li>
                                @endif
                                <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">Username </label>
                                    <input id="pms_user_login" name="username" type="text" value="{{old('username') ? old('username') : ''}}">
                                    @if($errors->has('username'))
                                        <small>{!!  $errors->get('username')[0] !!}</small>
                                    @endif
                                </li>
                                <li class="pms-field pms-user-email-field ">
                                    <label for="pms_user_email">E-mail </label>
                                    <input id="pms_user_email" name="email" type="text" value="{{old('email') ? old('email') : ''}}">
                                    @if($errors->has('email'))
                                        <small>{!!  $errors->get('email')[0] !!}</small>
                                    @endif
                                </li>
                                <li class="pms-field pms-first-name-field ">
                                    <label for="pms_first_name">Full Name </label>
                                    <input id="pms_first_name" name="fullname" type="text" value="{{old('fullname') ? old('fullname') : ''}}">
                                    @if($errors->has('fullname'))
                                        <small>{!!  $errors->get('fullname')[0] !!}</small>
                                    @endif
                                </li>
                                <li class="pms-field pms-last-name-field ">
                                    <label for="pms_last_name">Phone Number </label>
                                    <input id="pms_last_name" name="phone_number" type="text" value="{{old('phone_number') ? old('phone_number') : ''}}">
                                    @if($errors->has('phone_number'))
                                        <small>{!!  $errors->get('phone_number')[0] !!}</small>
                                    @endif
                                </li>
                                <li class="pms-field pms-pass1-field">
                                    <label for="pms_pass1">Password </label>
                                    <input id="pms_pass1" name="pass1" type="password">
                                    @if($errors->has('pass1'))
                                        <small>{!!  $errors->get('pass1')[0] !!}</small>
                                    @endif
                                </li>
                                <li class="pms-field pms-pass2-field">
                                    <label for="pms_pass2">Repeat Password </label>
                                    <input id="pms_pass2" name="pass2" type="password">
                                    @if($errors->has('pass2'))
                                        <small>{!!  $errors->get('pass2')[0] !!}</small>
                                    @endif
                                </li>
                            </ul>
                            <input name="pms_register" type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register -->
    
@endsection