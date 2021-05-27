@extends('layout.auth')

@section('content')

    <!-- Recover-Password -->
    <section class="position-relative pb-0">
        <div class="recover-password-page-background" style="background-image:url('{{ asset('assets/img/background/asset-75.jpg') }}');">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form id="pms_recover_password_form" class="pms-form" method="post">
                            <h4>Recover Password</h4>
                            <input type="hidden" id="pmstkn" name="pmstkn" value=""><input type="hidden"
                                name="_wp_http_referer" value="/recover-password/">
                            <p class="font-weight-bold">Please enter your username or email address.<br>You will receive
                                a link to create a new
                                password via email.</p>
                            <ul class="pms-form-fields-wrapper pl-0 mb-4">
                                <li class="pms-field">
                                    <label for="pms_username_email">Username or Email</label>
                                    <input id="pms_username_email" name="pms_username_email" type="text" value="">
                                </li>
                            </ul>
                            <input type="submit" name="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recover-Password -->
@endsection