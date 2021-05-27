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
                        <form id="pms_register-form" class="pms-form" method="POST">
                            <h4>Register</h4>
                            <input type="hidden" id="pmstkn" name="pmstkn" value="59b502f483"><input type="hidden"
                                name="_wp_http_referer" value="/register/">
                            <ul class="pms-form-fields-wrapper pl-0">
                                <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">Username *</label>
                                    <input id="pms_user_login" name="user_login" type="text" value="">
                                </li>
                                <li class="pms-field pms-user-email-field ">
                                    <label for="pms_user_email">E-mail *</label>
                                    <input id="pms_user_email" name="user_email" type="text" value="">
                                </li>
                                <li class="pms-field pms-first-name-field ">
                                    <label for="pms_first_name">First Name</label>
                                    <input id="pms_first_name" name="first_name" type="text" value="">
                                </li>
                                <li class="pms-field pms-last-name-field ">
                                    <label for="pms_last_name">Last Name</label>
                                    <input id="pms_last_name" name="last_name" type="text" value="">
                                </li>
                                <li class="pms-field pms-pass1-field">
                                    <label for="pms_pass1">Password *</label>
                                    <input id="pms_pass1" name="pass1" type="password">
                                </li>
                                <li class="pms-field pms-pass2-field">
                                    <label for="pms_pass2">Repeat Password *</label>
                                    <input id="pms_pass2" name="pass2" type="password">
                                </li>
                            </ul>
                            <span id="pms-submit-button-loading-placeholder-text" class="d-none">Processing. Please
                                wait...</span>
                            <input name="pms_register" type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register -->
    
@endsection